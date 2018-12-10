<?php
include_once("database.php");

function listaProdutos($conexao) {
$produtos = [];
$resultado = mysqli_query($conexao, "SELECT Codigo, Descricao, Conteudo, concat('R$ ',format(Preco_cat,2,'de_DE')) as Preco_cat, concat('R$ ',format(Preco_desc,2,'de_DE')) as Preco_desc, Pontos FROM Produto");
//$resultado = mysqli_query($conexao, "select * from Produto");
while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
}
        return $produtos;
}

// LISTA TODAS AS FRANQUIAS CADASTRADAS NA TABELA
function listaFranquias($conexao) {
$franquias = [];
$query = "select * from Franquias";
$resultado = mysqli_query($conexao, $query);
while($franquia = mysqli_fetch_assoc($resultado)) {
        array_push($franquias, $franquia);
}
return $franquias;
}


function insereProduto($conexao, $Codigo, $Responsavel, $Pedido, $Dt_faturamento, $Franquia, $Comprante) {
$query = "insert into Estoque(Codigo, Responsavel, Pedido, Dt_faturamento, Franquia, Comprante) values ('${Codigo}','${Responsavel}','${Pedido}','${Dt_faturamento}','${Franquia}','${Comprante}')";
//$query = "insert into Estoque (Codigo) VALUES ('${Codigo}')";
return mysqli_query($conexao,$query);
}


// function insereProduto($conexao, $nome, $preco) {
// $query = "insert into produto(nome,preco) values ('${nome}','${preco}')";
// return mysqli_query($conexao,$query);
// }

function removeProduto($conexao, $id) {
    $query = "delete from produto where id = {$id}";
    return mysqli_query($conexao, $query);
}


function retornaDados($codigo, $conexao){
        $result_prod = "SELECT *,concat('R$ ',format(Preco_cat,2,'de_DE')) as Preco_cat2, concat('R$ ',format(Preco_desc,2,'de_DE')) as Preco_desc2 FROM Produto WHERE Codigo = '$codigo' LIMIT 1";
	$resultado_prod = mysqli_query($conexao, $result_prod);
	if($resultado_prod->num_rows){
		$row_prod = mysqli_fetch_assoc($resultado_prod);
        	$valores['nome_produto'] = $row_prod['Descricao'];
                $valores['preco_cat'] = $row_prod['Preco_cat2'];
                $valores['predo_desc'] = $row_prod['Preco_desc2'];
		$valores['pontos'] = $row_prod['Pontos'];
	}else{
	        $valores['nome_produto'] = 'Produto não encontrado';
        } 	
        return json_encode($valores);
}

if(isset($_GET['cod'])){
	echo retornaDados($_GET['cod'], $conexao);
}

if(isset($_POST['buscar']))
{
    $Nome = $_POST['nome-produto'];
    $Codigo = $_POST['codigo'];

    if($Codigo != ""){
        $query = "SELECT * from vw_estoque WHERE Codigo like '%".$Codigo."%'";
        $search_result = filterTable($conexao, $query);
        // echo "Código: $Codigo";
    }
    elseif($Nome != "") {
        $query = "SELECT * from vw_estoque where Produto like '%".$Nome."%'";
        $search_result = filterTable($conexao, $query);
        // echo "Nome: $Nome";
    }
    elseif ($Nome == "" && $Codigo == "") {
        $query = "SELECT * from vw_estoque";
        $search_result = filterTable($conexao, $query);
        //  echo "Nome vazio ($Nome) e Código vazio ($Codigo)";
    }

}

function filterTable($conexao, $query)
{
        
//     $connect = mysqli_connect("172.17.0.2", "root", "astronauta", "ESTOQUE");
    $filter_Result = mysqli_query($conexao, $query);
    return $filter_Result;
}


?>

