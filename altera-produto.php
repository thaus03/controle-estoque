<?php include("cabecalho.php"); 
 include("database.php");
 include("banco-produto.php");   ?>

<?php

$id = $_POST['id'];
$Responsavel = $_POST['resp'];
$Pedido = $_POST['pedido'];
$Dt_faturamento = $_POST['dtfat'];
$Franquia = $_POST['Franquia_id'];
$Comprante = $_POST['comp'];

//FUNÇÕES



if(alteraProduto($conexao, $id, $Responsavel, $Pedido, $Dt_faturamento, $Franquia, $Comprante)) { ?>
    <p class="alert-success">Produto <?= $Codigo ?> alterado com sucesso!</p>
<?php } else { 
$msg = mysqli_error($conexao);
?>
    <p class="alert-danger">O produto <?= $Codigo ?> não foi altera: <?= $msg ?></p>
<?php } 

header("Location: estoque.php");
die();
?>

 <?php include("rodape.php")?>