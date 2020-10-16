<?php

    $dsn = "mysql:dbname=teste_prog;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try{
        $pdo = new PDO($dsn,$dbuser,$dbpass);
        echo "teste";
    }catch(PDOExcetion $e){
        echo "erro";
    }

    include('classe/lib/MyPDO.php');
    include('testeclasse.php');
    include('classe/lib/config.php');

    $var1 = new Teste();
    $var2 = $var1->classTeste();

    echo '<br/>';
    echo '<hr/>';

    $var3 = new Config();
    


?>