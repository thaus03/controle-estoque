<!DOCTYPE html>
<?php include("cabecalho.php");
 include("database.php");
 include("banco-produto.php");
 
$franquias = listaFranquias($conexao);
?>

<h1> Cadastrar Produtos </h1>
<form action="adiciona-produto.php" method="post">
<table class="table">
<!-- Inicio dados do produto -->
     <tr>
        <td>Cód:</td>
        <td><input class="form-control" type="text" name="cod"></td>
        <td>Nome:</td>
        <td colspan="3"><input class="form-control" type="text" name="nome" value="" readonly></td>
    </tr>
    <tr>
        <td>Preço Catálogo:</td>
        <td><input class="form-control" type="text" name="preco_cat" value="" readonly></td>
        <td>Preço Revenda:</td>
        <td><input class="form-control" type="text" name="preco_desc" value="" readonly></td>
        <td>Pontos:</td>
        <td><input class="form-control" type="text" name="pontos" value="" readonly></td>
        </tr>
<!-- Fim dados do produto -->
        <tr>
            <td>Responsável:</td>
            <td><input class="form-control" type="text" name="resp"></td>
            <td>Comprante:</td>
            <td colspan=2><input class="form-control" type="text" name="comp"></td>
        </tr>
        <tr>
            <td>Pedido Nº</td>
            <td><input class="form-control" type="text" name="pedido"></td>
            <td>Data de Faturamento</td>
            <td><input class="form-control" type="date" name="dtfat"></td>
            <td>Franquia</td>
            <td>
            <select name="Franquia_id" class='form-control'>
                <?php foreach($franquias as $franquia) : ?>
                <option value="<?=$franquia['id']?>">
                            <?=$franquia['Franquia']?>
                </option>
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
                <!-- <button class="btn btn-primary" type="submit">Cadastrar</button> -->
            </td>
            <td colspan=6><input type="submit" class="btn btn-primary" value="Cadastro"></td>
        </tr>
        </table>
    </form>
<?php include("rodape.php")?>