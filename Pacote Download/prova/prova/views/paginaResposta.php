<?php 
include '../base.php';

session_start();
$mensagem = null;
$tipo_alerta = null;
if(isset($_SESSION['msg'])){
    $mensagem = $_SESSION['msg'];
    unset($_SESSION['msg']);

    if ($_SESSION['tipo'] == 'sucesso'){
        $tipo_alerta = "alert-success";
    } else{
        $tipo_alerta = "alert-danger";
    }
    unset($_SESSION['tipo']);
}


?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

   <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="../css/styles.css">
   <title>Sistema</title>
</head>
<body>

<div id='cssmenu'>
<ul>
    <li id="opcaoHome"><a href="javascript:window.location='<?php echo URL_BASE.'/views/index.php';?>'"><span>Home</span></a></li>
   <li id="opcaoProdutos"> <a href="javascript:window.location='<?php echo URL_BASE.'/views/paginaProdutos.php';?>'" ><span>Produtos</span></a></li>
   <li  id="opcaoEmpresa"><a href="javascript:window.location='<?php echo URL_BASE.'/views/paginaEmpresa.php';?>'"><span>Empresa</span></a></li>
   <li class='active' id="opcaoContato" class='last'><a href="javascript:window.location='<?php echo URL_BASE.'/views/paginaFaleConosco.php';?>'"><span>Fale Conosco</span></a></li>
   <li id="opcaoListarMensagens" class='last'><a href="javascript:window.location='<?php echo URL_BASE.'/views/paginaListarMensagens.php';?>'"><span>Listar Mensagens</span></a></li>
   <li id="opcaoResposta" class='last'><a href="javascript:window.location='<?php echo URL_BASE.'/views/paginaResposta.php';?>'"><span>Resposta</span></a></li>
</ul>
</div>