<?php
if(isset($_GET['route'])) { $step = $_GET['route']; } else { $step = 1; }

$new_step = $step +1 ;
$take     = 250;
$skip     = $step * 250;

$products = $app->getProducts($skip, $take);
if ($products) {
  foreach ($products as $key => $product) {
    // Kodlarınız...
  }




  echo"<script>location.href='./".$new_step."'</script>";
  exit;
} else { print 'İşlem yapılacak veri bulunamadı...'; }