import { NextResponse } from "next/server";

export function ok<T>(data: T, init?: ResponseInit) {
  return NextResponse.json(data, { status: 200, ...init });
}

export function badRequest(message: string) {
  return NextResponse.json({ status: "error", message }, { status: 400 });
}

export function serverError(message = "Internal server error") {
  return NextResponse.json({ status: "error", message }, { status: 500 });
}
