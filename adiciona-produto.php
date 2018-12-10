<?php include("cabecalho.php"); 
 include("database.php");
 include("banco-produto.php");   ?>

<?php

$Codigo = $_POST['cod'];
$Responsavel = $_POST['resp'];
$Pedido = $_POST['pedido'];
$Dt_faturamento = $_POST['dtfat'];
$Franquia = $_POST['Franquia_id'];
$Comprante = $_POST['comp'];

//FUNÇÕES


if(insereProduto($conexao, $Codigo, $Responsavel, $Pedido, $Dt_faturamento, $Franquia, $Comprante)) { ?>
    <p class="alert-success">Produto <?= $Codigo ?> adicionado com sucesso!</p>
<?php } else { 
$msg = mysqli_error($conexao);
?>
    <p class="alert-danger">O produto <?= $Codigo ?> não foi adicionado: <?= $msg ?></p>
<?php } 

header("Location: produto-formulario.php");
die();
?>

 <?php include("rodape.php")?>