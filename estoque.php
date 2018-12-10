<!DOCTYPE html>
<?php include("cabecalho.php");
 include("database.php");
 include("banco-produto.php");

?>


<form action="estoque.php" method="post">

    <fieldset>
    <legend>Pesquisar no Estoque</legend>	
    <table class="table">
<tr>
    <td>Cód:</td>
    <td><input class="form-control" type="text" name="codigo"></td>
    <td>Nome:</td>
    <td ><input class="form-control" type="text" name="nome-produto"></td>
    <td><input type="submit" name="buscar" class="btn btn-primary" value="Buscar"></td>
    <td><input type="reset" name="limpar" class="btn btn-primary" value="Limpar" onclick="deleteRows('mytable', false);"></td>
</tr>
    <tr></tr>
</table>
</fieldset>
<br/>

<!-- Inicia a view de produtos estocados -->
<table class="table table-bordered table-sm" id="mytable">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Produto</th>
      <th scope="col">Responsável</th>
      <th scope="col">Pedido</th>
      <th scope="col">Data de Faturamento</th>
      <th scope="col">Franquia</th>
      <th scope="col">Comprante</th>
    </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr>
            <td><?php echo $row['Codigo'];?></td>
            <td><?php echo $row['Produto'];?></td>
            <td><?php echo $row['Responsavel'];?></td>
            <td><?php echo $row['Pedido'];?></td>
            <td><?php echo $row['Dt_faturamento'];?></td>
            <td><?php echo $row['Franquia'];?></td>
            <td><?php echo $row['Comprante'];?></td>
        </tr>
    <?php endwhile;?>
</table>
<!-- FIM DA VIEW -->


<?php include("rodape.php")?>