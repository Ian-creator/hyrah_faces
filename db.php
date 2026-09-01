<?php
// Simple SQLite PDO connection
if(!function_exists('get_db')){
function get_db(){
    $dir = __DIR__ . '/data';
    if(!is_dir($dir)) mkdir($dir, 0755, true);
    $path = $dir . '/hfm.sqlite';
    $pdo = new PDO('sqlite:'.$path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("PRAGMA foreign_keys = ON;
      CREATE TABLE IF NOT EXISTS clients (id INTEGER PRIMARY KEY AUTOINCREMENT,name TEXT NOT NULL,phone TEXT,email TEXT,notes TEXT,avatar_path TEXT,created_at TEXT NOT NULL,cancelled_at TEXT);
      CREATE TABLE IF NOT EXISTS bookings (id INTEGER PRIMARY KEY AUTOINCREMENT,client_id INTEGER NOT NULL,service TEXT NOT NULL,booked_date TEXT NOT NULL,duration INTEGER DEFAULT 60,amount REAL DEFAULT 0,deposit REAL DEFAULT 0,paid_full INTEGER DEFAULT 0,status TEXT DEFAULT 'scheduled',notes TEXT,created_at TEXT NOT NULL,FOREIGN KEY(client_id) REFERENCES clients(id) ON DELETE CASCADE);
      CREATE TABLE IF NOT EXISTS payments (id INTEGER PRIMARY KEY AUTOINCREMENT,booking_id INTEGER,client_id INTEGER NOT NULL,amount REAL NOT NULL,method TEXT DEFAULT 'Card',status TEXT DEFAULT 'Paid',invoice_reference TEXT,note TEXT,paid_at TEXT NOT NULL,created_at TEXT NOT NULL,FOREIGN KEY(booking_id) REFERENCES bookings(id) ON DELETE SET NULL,FOREIGN KEY(client_id) REFERENCES clients(id) ON DELETE CASCADE);
      CREATE TABLE IF NOT EXISTS products (id INTEGER PRIMARY KEY AUTOINCREMENT,name TEXT NOT NULL,brand TEXT,category TEXT,quantity INTEGER DEFAULT 0,max_quantity INTEGER DEFAULT 0,expiry_date TEXT,created_at TEXT NOT NULL);
      CREATE TABLE IF NOT EXISTS portfolio (id INTEGER PRIMARY KEY AUTOINCREMENT,client_id INTEGER,category TEXT NOT NULL,caption TEXT,file_path TEXT,created_at TEXT NOT NULL,FOREIGN KEY(client_id) REFERENCES clients(id) ON DELETE SET NULL);
      CREATE TABLE IF NOT EXISTS purchases (id INTEGER PRIMARY KEY AUTOINCREMENT,description TEXT NOT NULL,amount REAL NOT NULL,created_at TEXT NOT NULL);
      CREATE TABLE IF NOT EXISTS settings (key TEXT PRIMARY KEY,value TEXT NOT NULL,updated_at TEXT NOT NULL);");
    $bookingColumns = $pdo->query("PRAGMA table_info(bookings)")->fetchAll(PDO::FETCH_COLUMN, 1);
    if (!in_array('unit_price', $bookingColumns, true)) $pdo->exec('ALTER TABLE bookings ADD COLUMN unit_price REAL DEFAULT 0');
    return $pdo;
}
}

if(!function_exists('invoice_reference_for')){
function invoice_reference_for($paymentId){
    return 'INV-' . str_pad((string)(int)$paymentId, 4, '0', STR_PAD_LEFT);
}
}

if(!function_exists('now')){
function now(){
    return (new DateTime())->format('Y-m-d H:i:s');
}
}
