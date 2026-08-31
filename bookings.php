<?php
require 'db.php';
$db = get_db();
if(isset($_POST['add_booking'])){
    $stmt = $db->prepare('INSERT INTO bookings (client_id,service,booked_date,amount,deposit,created_at) VALUES (?,?,?,?,?,?)');
    $stmt->execute([$_POST['client_id'],$_POST['service'],$_POST['booked_date'],$_POST['amount'],$_POST['deposit'], now()]);
    header('Location: bookings.php'); exit;
}
$clients = $db->query('SELECT id,name FROM clients WHERE cancelled_at IS NULL')->fetchAll(PDO::FETCH_ASSOC);
$bookings = $db->query('SELECT b.*, c.name FROM bookings b JOIN clients c ON c.id=b.client_id ORDER BY booked_date DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Hyrah Faces — Bookings</title>
<link rel="stylesheet" href="assets/styles.css"></head><body>
<div class="wrap"><div class="header"><div class="brand">Hyrah Faces — Bookings</div><div><a href="index.php">Dashboard</a></div></div>
<div class="grid">
  <div>
    <div class="card">
      <h3>New Booking</h3>
      <form method="post" class="row">
        <select name="client_id" required>
          <?php foreach($clients as $c) echo "<option value=\"{$c['id']}\">".htmlspecialchars($c['name'])."</option>"; ?>
        </select>
        <input name="service" placeholder="Service" required>
        <input name="booked_date" type="datetime-local" required>
        <input name="amount" placeholder="Amount">
        <input name="deposit" placeholder="Deposit">
        <button name="add_booking" class="btn">Create</button>
      </form>
    </div>
  </div>

  <div>
    <div class="card">
      <h3>All Bookings</h3>
      <?php foreach($bookings as $b): ?>
        <div class="list-item"><div><strong><?php echo htmlspecialchars($b['name']); ?></strong><div class="small"><?php echo htmlspecialchars($b['service'].' — '.$b['booked_date']); ?></div></div><div>$<?php echo number_format($b['amount'],2); ?></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</div></div></body></html>
