<?php 

    include ('teste1/teste1.php');
    include ('classe/bo/artigosBO.php');

    $artigos = new artigosBO();
    $lista = $artigos->GetAll();
    

    echo 'teste';

?>