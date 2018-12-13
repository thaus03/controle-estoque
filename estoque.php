<!DOCTYPE html>
<?php include("cabecalho.php");
 include("database.php");
 include("banco-produto.php");



?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<form action="estoque.php" method="post">
<fieldset>
    <legend>Pesquisar no Estoque</legend>	
    <table class="table">
<tr>
    <td>Cód:</td>
    <td><input class="form-control form-control-sm" type="text" name="codigo"></td>
    <td>Produto:</td>
    <td><input class="form-control form-control-sm" type="text" name="nome-produto"></td>
    <td><input type="submit" name="buscar" class="btn btn-sm btn-outline-dark" value="Buscar"> <input type="reset" name="limpar" class="btn btn-sm btn-outline-secondary" value="Limpar" onclick="deleteRows('mytable', false);"></td>
</tr>
    
</table>
<div id="alert_placeholder"></div>
</fieldset>
<br/>

<!-- Inicia a view de produtos estocados -->

<table class="table table-bordered table-striped table-sm table-1" id="mytable">
    <thead class="thead-dark">
    <tr>
        <th width="4%" scope="col">#</th>
        <th scope="col">Código</th>
        <th scope="col">Produto</th>
        <th scope="col">Responsável</th>
        <th scope="col">Pedido</th>
        <th scope="col">Faturamento</th>
        <th scope="col">Franquia</th>
        <th width="10%" scope="col">Comprante</th>
        <th width="2%" class="border-0 bg-transparent"></th>
    </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr>
            <td><input class="checkbox" type="checkbox" id="<?php echo $row['Estoque_id'];?>" name="id[]"></td>
            <td><?php echo $row['Codigo'];?></td>
            <td><?php echo $row['Produto'];?></td>
            <td><?php echo $row['Responsavel'];?></td>
            <td><?php echo $row['Pedido'];?></td>
            <td><?php echo $row['Dt_faturamento2'];?></td>
            <td><?php echo $row['Franquia'];?></td>
            <td><?php echo $row['Comprante'];?></td>
            <td class="td-1"><a href="produto-altera-formulario.php?id=<?php echo $row['Estoque_id'];?>"><img src="assets/edit.png" alt="edit"></a></td>
        </tr>
    <?php endwhile;?>
</table>
</div>
<button type="button" class="btn btn-outline-danger" id="delete">Excluir dados </button>
<!-- FIM DA VIEW -->


<!-- TESTE -->

<?php include("rodape.php")?>