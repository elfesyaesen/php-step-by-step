<pre>
<?php
if(isset($_GET['route'])) { $step = $_GET['route']; } else { $step = 1; }

$new_step = $step +1 ;
$limit     = 250;
$offset     = $step * 250;

$pdo = new pdo("mysql:host=localhost;dbname=pak_opencart;charset=utf8", 'root', '');
$products = getProducts($pdo, $offset, $limit);
if ($products) {
  foreach ($products as $key => $product) {
    print_r($product);
  }




  echo"<script>location.href='./index.php?route=".$new_step."'</script>";
  exit;
} else { print 'İşlem yapılacak veri bulunamadı...'; }



function getProducts($pdo, $offset = 0, $limit = 0) {
  $stmt = $pdo->prepare("SELECT * FROM oc_product LIMIT :limit OFFSET :offset");
  $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
  $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
  $stmt->execute();
  $response = $stmt->fetchAll(PDO::FETCH_OBJ);

  if($response) { return $response; } else { return false; }
} ?>
</pre>