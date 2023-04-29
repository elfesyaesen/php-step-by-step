<?php
if(isset($_GET['route'])) { $step = $_GET['route']; } else { $step = 1; }

$new_step = $step +1 ;
$take     = 250;
$skip     = $step * 250;

$products = getProducts($skip, $take);
if ($products) {
  foreach ($products as $key => $product) {
    // Kodlarınız...
  }




  echo"<script>location.href='./".$new_step."'</script>";
  exit;
} else { print 'İşlem yapılacak veri bulunamadı...'; }

function getProducts($pdo, $skip = 0, $take = 0) {
  $stmt = $pdo->prepare("SELECT * FROM products WHERE LIMIT :limit OFFSET :offset");
  $stmt->bindValue(':limit', (int) $skip, PDO::PARAM_INT);
  $stmt->bindValue(':offset', (int) $take, PDO::PARAM_INT);
  $stmt->execute();
  $response = $stmt->fetchAll();
  
  if($response) { return $response; } else { return false; }
}