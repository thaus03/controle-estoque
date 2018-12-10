{/* <script type='text/javascript'>
	$(document).ready(function(){
	$("input[name='cod']").blur(function(){
		var $nome = $("input[name='nome']");
        var $preco_cat = $("input[name='preco_cat']");
        var $predo_desc = $("input[name='preco_desc']");
        var $pontos = $("input[name='pontos']");
				$.getJSON('banco-produto.php',{ 
				cod: $(this).val() 
					},function( json ){
						$nome.val( json.nome_produto );     //posição no array
                        $preco_cat.val( json.preco_cat );   //posição no array
                        $predo_desc.val( json.predo_desc ); //posição no array
						$pontos.val( json.pontos );         //posição no array
					});
				});
			});
</script> */}


$(document).ready(function(){
$("input[name='cod']").blur(function(){
var $nome = $("input[name='nome']");
var $preco_cat = $("input[name='preco_cat']");
var $predo_desc = $("input[name='preco_desc']");
var $pontos = $("input[name='pontos']");
		$.getJSON('banco-produto.php',{ 
		cod: $(this).val() 
			},function( json ){
				$nome.val( json.nome_produto );     //posição no array
                $preco_cat.val( json.preco_cat );   //posição no array
                $predo_desc.val( json.predo_desc ); //posição no array
				$pontos.val( json.pontos );         //posição no array
		});
	});
});

function deleteRows(id, toDeleteHeader) {
	var obj = document.getElementById(id);
	if(!obj && !obj.rows)
	  return;
	if(typeof toDeleteHeader == 'undefined')
	  toDeleteHeader = false;
	var limit = !!toDeleteHeader ? 0 : 1;
	var rows = obj.rows; 
	if(limit > rows.length)
	  return;
	for(; rows.length > limit; ) {
	  obj.deleteRow(limit);
	}
	}
	
	$(function(){
		$("#tabela input").keyup(function(){		
	
			var index = $(this).parent().index();
			var nth = "#tabela td:nth-child("+(index+1).toString()+")";
			var valor = $(this).val().toUpperCase();
			$("#tabela tbody tr").show();
			$(nth).each(function(){
				if($(this).text().toUpperCase().indexOf(valor) < 0){
					$(this).parent().hide();
				}
			});
		});
	
		$("#tabela input").blur(function(){
			$(this).val("");
		});	
	});