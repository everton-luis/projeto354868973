<?php 

    include('classe/lib/config.php');
    include('classe/bo/artigosBO1.php');

    $var1 = new artigoBO1();

    

    $lista = $var1->GetAll();

    foreach($lista as $item){
        echo $item['id'].'<br/>';
        echo $item['titulo'].'<br/>';
    }

    echo '<br/>';
    echo '<hr/>';
    echo '<br/>';

    //$titulo = "teste4titulo";
    //$descricao = "teste4descricao";
    //$capa = "teste4capa";
    //$imagem = "teste4imagem";

    //$inserir = $var1->Add($titulo,$descricao,$capa,$imagem);
    echo 'testeclasse';
    echo '<br/>';

    $id = 6;

    $artigo = $var1->Get($id);
    $titulo = $artigo['titulo'];
    $descricao = $artigo['descricao'];

    echo $titulo;
    echo '<br/>';
    echo $descricao;
    

    
    
        
    

    



?>