#!/bin/bash
set -e

echo "=== Apache Startup Diagnostics ==="

echo "--- Checking Apache configuration syntax ---"
if ! apache2ctl configtest 2>&1; then
    echo "ERROR: Apache configuration test failed. Aborting."
    exit 1
fi
echo "Configuration syntax OK."

echo "--- Enabled modules ---"
apache2ctl -M 2>&1 || true

echo "--- Active MPM ---"
apache2ctl -V 2>&1 | grep -i mpm || true

echo "--- /etc/apache2/mods-enabled ---"
ls /etc/apache2/mods-enabled/ 2>&1 || true

echo "--- Checking if port 80 is already bound ---"
if command -v ss &>/dev/null; then
    ss -tlnp 2>&1 | grep ':80 ' && echo "WARNING: Port 80 is already in use before Apache starts." || echo "Port 80 is free."
elif command -v netstat &>/dev/null; then
    netstat -tlnp 2>&1 | grep ':80 ' && echo "WARNING: Port 80 is already in use before Apache starts." || echo "Port 80 is free."
else
    echo "Neither ss nor netstat available; skipping pre-start port check."
fi

echo "--- Starting Apache in background for port binding verification ---"
apache2ctl -D FOREGROUND 2>&1 &
APACHE_PID=$!

echo "--- Waiting 3 seconds for Apache to bind to port 80 ---"
sleep 3

echo "--- Verifying Apache is listening on port 80 ---"
if command -v ss &>/dev/null; then
    LISTENING=$(ss -tlnp 2>&1 | grep ':80 ')
elif command -v netstat &>/dev/null; then
    LISTENING=$(netstat -tlnp 2>&1 | grep ':80 ')
else
    LISTENING=""
    echo "Neither ss nor netstat available; skipping post-start port check."
fi

if [ -n "$LISTENING" ]; then
    echo "SUCCESS: Apache is listening on port 80:"
    echo "$LISTENING"
else
    echo "WARNING: Apache does NOT appear to be listening on port 80."
fi

echo "--- All currently listening ports ---"
if command -v ss &>/dev/null; then
    ss -tlnp 2>&1 || true
elif command -v netstat &>/dev/null; then
    netstat -tlnp 2>&1 || true
else
    echo "No port listing tool available."
fi

echo "--- Handing off to Apache foreground process (PID $APACHE_PID) ---"
wait $APACHE_PID
