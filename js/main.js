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



	// FUNÇÃO DE DELETE MANY
	$(document).ready(function(){
		$('#checkAll').click(function(){
			 if(this.checked){
					 $('.checkbox').each(function(){
							this.checked = true;
					 });   
			 }else{
					$('.checkbox').each(function(){
							this.checked = false;
					 });
			 } 
		});


	$('#delete').click(function(){
		 var dataArr  = new Array();
		 if($('input:checkbox:checked').length > 0){
				$('input:checkbox:checked').each(function(){
						dataArr.push($(this).attr('id'));
						$(this).closest('tr').remove();
				});
				 sendResponse(dataArr)
		 }else{
				showAlert("Nenhum dado selecionado", "alert-warning");
			//  alert('Nenhum dado selecionado');
		 }

	});  


	function sendResponse(dataArr){
			$.ajax({
					type    : 'post',
					url     : 'banco-produto.php',
					data    : {'data' : dataArr},
					success : function(response){
											alert(response);
										},
					error   : function(errResponse){
										alert(errResponse);
										}                     
			});
	}

});




/**
  Bootstrap Alerts -
  Function Name - showalert()
  Inputs - message,alerttype
  Example - showalert("Invalid Login","alert-error")
  Types of alerts -- "alert-error","alert-success","alert-info","alert-warning"
  Required - You only need to add a alert_placeholder div in your html page wherever you want to display these alerts "<div id="alert_placeholder"></div>"
  Written On - 14-Jun-2013
**/

function showAlert(message,alerttype) {

	// $('#alert_placeholder').append('<div id="alertdiv" class="alert ' +  alerttype + '"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
	$('#alert_placeholder').append('<div id="alertdiv" class="alert ' +  alerttype + '"><span>'+message+'</span></div>')

	setTimeout(function() { // this will automatically close the alert and remove this if the users doesnt close it in 5 secs
		$("#alertdiv").remove();

	}, 5000);
}

