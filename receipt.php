<?php
require 'db.php';
$db = get_db();
$id = intval($_GET['id'] ?? 0);
$type = $_GET['type'] ?? 'payment';

if($type==='payment'){
    $stmt = $db->prepare('SELECT p.*, c.name, c.phone FROM payments p LEFT JOIN clients c ON c.id=p.client_id WHERE p.id=?');
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $row = null;
}

if(!$row){
    echo 'Receipt not found'; exit;
}

$html = "<h2>Hyrah Faces - Receipt</h2>";
$html .= "<p><strong>Customer:</strong> ".htmlspecialchars($row['name'])."</p>";
$html .= "<p><strong>Phone:</strong> ".htmlspecialchars($row['phone'])."</p>";
$html .= "<p><strong>Amount:</strong> ".number_format($row['amount'],2)."</p>";
$html .= "<p><strong>Method:</strong> ".htmlspecialchars($row['method'])."</p>";
$html .= "<p><strong>Date:</strong> ".htmlspecialchars($row['created_at'])."</p>";

// If Dompdf available, generate PDF
if(file_exists(__DIR__.'/vendor/autoload.php')){
    require __DIR__.'/vendor/autoload.php';
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml('<html><head><meta charset="utf-8"><style>body{font-family:Arial;padding:20px}</style></head><body>'.$html.'</body></html>');
    $dompdf->setPaper('A4','portrait');
    $dompdf->render();
    $dompdf->stream('receipt_'.$id.'.pdf');
    exit;
}

?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Receipt</title>
</head>
<body>
  <?php echo $html; ?>
  <p>
    <button onclick="window.print()">Print / Save as PDF</button>
    <a href="index.php">Back</a>
  </p>
</body>
</html>
