<?php
if(isset($_GET['route'])) { $step = $_GET['route']; } else { $step = 1; }

$new_step = $step +1 ;
$limit     = 250;
$offset     = $step * 250;

$products = getProducts($offset, $limit);
if ($products) {
  foreach ($products as $key => $product) {
    // Kodlarınız...
  }




  echo"<script>location.href='./".$new_step."'</script>";
  exit;
} else { print 'İşlem yapılacak veri bulunamadı...'; }

function getProducts($pdo, $offset = 0, $limit = 0) {
  $stmt = $pdo->prepare("SELECT * FROM products LIMIT :limit OFFSET :offset");
  $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
  $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
  $stmt->execute();
  $response = $stmt->fetchAll();

  if($response) { return $response; } else { return false; }
}