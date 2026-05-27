import mysql, { Pool, PoolOptions } from "mysql2/promise";

let pool: Pool | null = null;

function getConfig(): PoolOptions {
  return {
    host: process.env.DB_HOST ?? "localhost",
    port: Number(process.env.DB_PORT ?? 3306),
    user: process.env.DB_USER ?? "root",
    password: process.env.DB_PASSWORD ?? "",
    database: process.env.DB_NAME ?? "skordigital",
    connectionLimit: 10,
  };
}

export function getPool(): Pool {
  if (!pool) {
    pool = mysql.createPool(getConfig());
  }

  return pool;
}

export async function query<T>(sql: string, params: unknown[] = []) {
  const [rows] = await getPool().query(sql, params);
  return rows as T[];
}
