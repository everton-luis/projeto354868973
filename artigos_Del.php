<?php 
session_start();

include('classe/lib/config.php');
include('classe/bo/artigosBO1.php');

$id = $_GET['id'];
$var1 = new artigoBO1();

if(isset($_GET['id'])){
    $del = $var1->Del($id);
    $_SESSION['del'] = "Artigo deletado com sucesso!";
    echo "<script>location.href='artigos.php';</script>";
}

?>