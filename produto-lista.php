<!DOCTYPE html>


<?php include("cabecalho.php"); 
 include("database.php");
 include("banco-produto.php");  ?>


<table class="table table-bordered table-sm" id="tabela">
  <thead class="thead-dark">
    <tr>
      <th width="10%  scope="col">Código</th>
      <th width="40% scope="col">Produto</th>
      <th width="10% scope="col">Conteúdo</th>
      <th scope="col">Preço no Catálogo</th>
      <th scope="col">Preço de Custo</th>
      <th width="10%" scope="col">Pontos</th>
    </tr>
    <tr>
        <th><input class="form-control form-control-sm" type="text" id="txtColuna1"/></th>
        <th><input class="form-control form-control-sm" type="text" id="txtColuna2"/></th>
        <th><input class="form-control form-control-sm" type="text" id="txtColuna3"/></th>
        <th><input class="form-control form-control-sm" type="text" id="txtColuna4"/></th>
        <th><input class="form-control form-control-sm" type="text" id="txtColuna5"/></th>
        <th><input class="form-control form-control-sm" type="text" id="txtColuna6"/></th>
    </tr>     
  </thead>

<?php
        $produtos = listaProdutos($conexao);
        foreach($produtos as $produto) :
?>
 <tr>
        <td><?= $produto['Codigo'] ?></td>
        <td><?= $produto['Descricao'] ?></td>
        <td><?= $produto['Conteudo'] ?></td>
        <td><?= $produto['Preco_cat'] ?></td>
        <td><?= $produto['Preco_desc'] ?></td>
        <td><?= $produto['Pontos'] ?></td>
</tr>
<?php
        endforeach
?>
</table>


 <?php include("rodape.php"); ?>