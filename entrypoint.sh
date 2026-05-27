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

echo "--- Starting Apache in foreground ---"
exec apache2ctl -D FOREGROUND 2>&1
