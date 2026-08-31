<?php
require 'db.php';
$db = get_db();
$rev = $db->query('SELECT IFNULL(SUM(amount),0) as total FROM payments')->fetch(PDO::FETCH_ASSOC)['total'];
$exp = $db->query('SELECT IFNULL(SUM(amount),0) as total FROM purchases')->fetch(PDO::FETCH_ASSOC)['total'];
$clients = $db->query('SELECT COUNT(*) as c FROM clients')->fetch(PDO::FETCH_ASSOC)['c'];
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Reports</title>
<link rel="stylesheet" href="assets/styles.css"></head><body>
<div class="wrap"><div class="header"><div class="brand">Hyrah Faces — Reports</div><div><a href="index.php">Back</a></div></div>
<div class="card"><h3>Summary</h3>
<div class="small">Clients: <strong><?php echo $clients; ?></strong></div>
<div class="small">Total revenue: <strong>$<?php echo number_format($rev,2); ?></strong></div>
<div class="small">Total expenditure: <strong>$<?php echo number_format($exp,2); ?></strong></div>
</div>
</div></body></html>
