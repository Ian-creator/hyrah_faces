<?php
require 'db.php';
$db = get_db();
if(isset($_POST['record'])){
    $stmt = $db->prepare('INSERT INTO purchases (description,amount,created_at) VALUES (?,?,?)');
    $stmt->execute([$_POST['description'],$_POST['amount'], now()]);
    header('Location: purchases.php'); exit;
}
$purchases = $db->query('SELECT * FROM purchases ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Purchases</title>
<link rel="stylesheet" href="assets/styles.css"></head><body>
<div class="wrap"><div class="header"><div class="brand">Hyrah Faces — Purchases</div><div><a href="index.php">Back</a></div></div>
<div class="card"><h3>Record Purchase</h3>
<form method="post" class="row"><input name="description" placeholder="Description" required><input name="amount" placeholder="Amount" required><button name="record" class="btn">Save</button></form>
<h4 style="margin-top:14px">Recent</h4><?php foreach($purchases as $p): ?><div class="list-item"><div><?php echo htmlspecialchars($p['description']); ?><div class="small"><?php echo htmlspecialchars($p['created_at']); ?></div></div><div>$<?php echo number_format($p['amount'],2); ?></div></div><?php endforeach; ?></div></div></body></html>
