# Hyrah Faces — Makeup Booking & POS

Quick setup (XAMPP + PHP):

1. Place this folder in your `htdocs` (already here).
2. Ensure PHP has `pdo_sqlite` enabled (or adapt `db.php` to use MySQL).
3. From project root run (optional, for PDF receipts):

```bash
composer install
```

4. Initialize DB (first time): open `db_init.php` in browser once: `http://localhost/hfm/db_init.php`
5. Open dashboard: `http://localhost/hfm/`

Notes:
- If `vendor/` exists, receipt PDF will use Dompdf. Otherwise the receipt page can be printed to PDF from the browser.
- Tablet responsive styles included.
