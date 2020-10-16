<?php
session_start();
require_once "meta.php";

// Nome da página
$areaAdmin = 'artigos';

// Requires
//require_once 'lib/autoload.php';
//require_once "lib/utilidades.php";
//require_once 'classe/bo/artigosBO.php';
//require_once 'classe/vo/artigosVO.php';
include('classe/lib/config.php');
include('classe/bo/artigosBO1.php');

// Instanciamentos

//$vo = new artigosVO();
//$bo = new artigosBO();
$var1 = new artigoBO1();
$artigos = $var1->GetAll();
// $catBO = new classe\bo\GenericoBO('categoria');

$data = new DateTime('now');
$hoje = $data->format('Y-m-d');


// echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

// Cadastra um novo post ("diferencial")
if (isset($_POST['adicionar'])) {
    
    $URL="./artigos_Add.php";
    //$vo = new artigosVO();
    //$bo = new artigosBO();


    // Verifica se algum dos campos obrigatórios está vazio
    //$errors = utilidades::checkEmptyFields(
                    //array('titulo','descricao'),
                    //$_POST
                //);

    
    //if ($bo->Add($vo)) {
     //$_SESSION['msgSuccess'] = 'Artigo cadastrado com sucesso!';
    //} else {
        //$_SESSION['msgError'] = 'Dados não inseridos';
        //echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        //exit();
    //}
}
  
//if (isset($_POST["editar"])) {
      // Verifica se algum dos campos obrigatórios está vazio
    //$URL="./artigos.php";
      //$errors = utilidades::checkEmptyFields(
                      //array('titulo','descricao'),
                      //$_POST
               //);      

    
    //$bo->Edit($vo);
    //$_SESSION['msgSuccess'] = 'Artigo editado com sucesso.';
//}


//-----------------------

//$artigos = "";
if (isset($_SESSION['msgError'])) {
    $msgErro = $_SESSION['msgError'];
}
if (isset($_SESSION['msgSuccess'])) {
    $msgSucesso = $_SESSION['msgSuccess'];
}
?>


<script>
    function excluir(id, token) {
        if (confirm("Tem certeza que deseja excluir esta Artigo?")) {
            window.location.href = "artigos.php?excluir="+token+"&id="+id;
        }
    }
    $(document).ready(function(){
        var error = "<?php print($msgErro)?>";
        if (error != "") {
            $('.msgError').show();
        }
        var success = "<?php print($msgSucesso)?>";
        if (success != "") {
            $('.msgSuccess').show();
        }
    });
</script>

<link rel="stylesheet" type="text/css" href="style/css/artigos.css" />

<script type="text/javascript" src="js/artigo.js"></script>
</head>
<body>
    <?php include("header.php"); ?>

    <main role="main" class="container-fluid">

        <div class="col-md-10 offset-md-1">

            <div class="row">
                <div id="header1" class="col p-4 text-center justify-content-center">
                    <h2>Artigos</h2>
                    <hr/>
                </div>
            </div>

            <?php

                if(isset($_SESSION['add'])){
                    echo '<p class="alert alert-success text-center" role="alert">'.$_SESSION['add'].'</p>'; 
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['edit'])){
                    echo '<p class="alert alert-success text-center" role="alert">'.$_SESSION['edit'].'</p>'; 
                    unset($_SESSION['edit']);
                }

                if(isset($_SESSION['del'])){
                    echo '<p class="alert alert-success text-center" role="alert">'.$_SESSION['del'].'</p>'; 
                    unset($_SESSION['del']);
                }

            ?>

            <div class="row">
                <div id="header2" class="col-12 p-2 text-center">
                    <div class="btn-group text-center">
                        <!-- <a class="btn btn-primary active" href="seguradoras.php">Ver Seguradoras</a> -->
                        <a class="btn btn-primary" href="artigos_Add.php">Adicionar Artigo</a>
                    </div>
                </div>
            </div>
            <div class="msgError col p-4 text-center">
                <label><?=$msgErro?></label>
            </div>
            <div class="msgSuccess col p-4 text-center">
                <label><?=$msgSucesso?></label>
            </div>
            <div class="row">
                <div class="col-12 p-4 full-page">

                    <div class="m-3">
                        <table class="data-table table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Imagem Capa Artigo</th> -->
                                    <th scope="col">Imagem Artigo</th>
                                    <th scope="col">Título Artigo</th>
                                    <th scope="col">Descrição Artigo</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Exibe teste
                                    //if(!empty($artigos)){
                                    foreach ($artigos as $artigo):?>
                                        <tr>
                                            
                                            <td style="text-align:center;">
                                                <img src="img/sem-foto.png" width="35" height="35">
                                            </td>
                                            <td>
                                                <p>
                                                    <b id="titulo"><?=urldecode($artigo['titulo'])?></b>
                                                    <br/>
                                                    

                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <b id="texto">
                                                    <?php

                                                        
                                                        $texto = urldecode($artigo['descricao']);
                                                        $tam = strlen($texto); // Tamanho do texto.
                                                        $max = 80; // exibe 80 primeiros caracteres do texto.

                                                        if($tam > $max) // Se o texto for maior do que 80, retira o restante.
                                                        {
                                                            echo substr($texto, 0, $max - $tam);
                                                        
                                                        } else {
                                                            echo $texto;
                                                        }
                                                    ?>
                                                    </b>
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group-horizontal">
                                                    <a href="artigos_Edit.php?id=<?=$artigo['id']?>" class="btn btn-sm btn-secondary">Editar</a>
                                                    <a href="artigos_Del.php?id=<?=$artigo['id']?>" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Tem certeza que desaja excluir este artigo?');">Excluir</a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php /* endforeach; }else{ */?>
                                <?php  endforeach; ?>
                            </tbody>
                        </table>
                        <hr/>
                        <div class="row">
                            <div id="header2" class="col-12 p-2 text-center">
                                <div class="btn-group text-center">
                                    <a class="btn btn-primary" href="artigos_Add.php">Adicionar Artigo</a>
                                </div>
                            </div>
                        </div>
                        <?php /* } */ ?>
                        <hr/>
                    </div>
                    <?php include "footer.php"; ?>
                </div>
            </div>
        </div>
                                

    </main>


<script>
    function excluir(id, token) {
        if (confirm("Tem certeza que deseja excluir esta Artigo?")) {
            window.location.href = "artigos.php?excluir="+token+"&id="+id;
        }
    }

</script>
</body>
</html>