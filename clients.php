<?php
require 'db.php';
$db = get_db();
if(isset($_GET['cancel'])){
		$id = intval($_GET['cancel']);
		$stmt = $db->prepare('UPDATE clients SET cancelled_at=? WHERE id=?');
		$stmt->execute([now(), $id]);
		header('Location: clients.php'); exit;
}
$clients = $db->query('SELECT * FROM clients ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Clients - Hyrah Faces</title>
<link rel="stylesheet" href="assets/styles.css"></head><body>
<div class="wrap"><div class="header"><div class="brand">Hyrah Faces — Clients</div><div><a href="index.php">Back</a></div></div>
<div class="card"><h3>All Clients</h3>
<?php foreach($clients as $c): ?>
	<div class="list-item">
		<div>
			<strong><?php echo htmlspecialchars($c['name']); ?></strong>
			<div class="small"><?php echo htmlspecialchars($c['phone'].' '.$c['email']); ?></div>
		</div>
		<div>
			<?php if($c['cancelled_at']): ?>
				<span class="small">Cancelled</span>
			<?php else: ?>
				<button class="small cancel-btn" data-id="<?php echo $c['id']; ?>" data-name="<?php echo htmlspecialchars($c['name'], ENT_QUOTES); ?>">Cancel</button>
			<?php endif; ?>
		</div>
	</div>
<?php endforeach; ?>
</div></div>
<script src="assets/app.js"></script>
</body></html>
