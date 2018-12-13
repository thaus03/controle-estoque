<!DOCTYPE html>
<?php include("cabecalho.php");
 include("database.php");
 include("banco-produto.php");
 
$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$franquias = listaFranquias($conexao);
?>


<h1> Editar Produto </h1>

<form action="altera-produto.php" method="post">
<input type="hidden" name="id" value="<?=$produto[Estoque_id]?>">
<table class="table">
<!-- Inicio dados do produto -->
     <tr>
        <td>Cód:</td>
        <td><input class="form-control" type="text" name="codA" value="<?=$produto['Codigo']?>" readonly></td>
        <td>Nome:</td>
        <td colspan="3"><input class="form-control" type="text" name="nomeA" value="<?=$produto['Produto']?>" readonly></td>
    </tr>
    <tr>
        <td>Preço Catálogo:</td>
        <td><input class="form-control" type="text" name="preco_catA" value="<?=$produto['PCat']?>" readonly></td>
        <td>Preço Revenda:</td>
        <td><input class="form-control" type="text" name="preco_descA" value="<?=$produto['PComp']?>" readonly></td>
        <td>Pontos:</td>
        <td><input class="form-control" type="text" name="pontosA" value="<?=$produto['Pontos']?>" readonly></td>
        </tr>
<!-- Fim dados do produto -->
        <tr>
            <td>Responsável:</td>
            <td><input class="form-control" type="text" name="resp" value="<?=$produto['Responsavel']?>"></td>
            <td>Comprante:</td>
            <td colspan=2><input class="form-control" type="text" name="comp" value="<?=$produto['Comprante']?>"></td>
        </tr>
        <tr>
            <td>Pedido Nº</td>
            <td><input class="form-control" type="text" name="pedido" value="<?=$produto['Pedido']?>"></td>
            <td>Data de Faturamento</td>
            <td><input class="form-control" type="date" name="dtfat" value="<?=$produto['Dt_faturamento']?>"></td>
            <td>Franquia</td>
            <td>
            <select name="Franquia_id" class='form-control'>
                <?php foreach($franquias as $franquia) : 
                    $essaEhAFranquia = $produto['Franquia_id'] == $franquia['id'];
                    $selecao = $essaEhAFranquia ? "selected='selected'" : "";
                    ?>
                <option value="<?=$franquia['id']?>" <?=$selecao?>>
                            <?=$franquia['Franquia']?>
                </option>
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
            </td>
            <td colspan=6><input type="submit" class="btn btn-primary" value="Alterar"></td>
        </tr>
        </table>
    </form>
<?php include("rodape.php")?>