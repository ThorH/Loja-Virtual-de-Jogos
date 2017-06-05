<!DOCTYPE html>

<html lang="pt-br">
	<head>
	    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Sistema de biblioteca.">
	    <title>Admin - Listar Jogos</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/modern-business.css" rel="stylesheet">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	    <link href="css/remodal.css" rel="stylesheet" type="text/css">
	    <link href="css/remodal-default-theme.css" rel="stylesheet" type="text/css">
	    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
	</head>

	<body>
	
	    <!-- Navigation -->
	    <?php
	    	include "includes/adminNavigation.php";
	    ?>

	    <!-- Page Content -->
	    <div class="container dataTable">
	    
	    	<table id="alunos" class="table table-striped table-bordered">
	    		<thead>
	    			<tr>
	    				<th>Nome</th>
	    				<th>Categoria</th>
	    				<th>Descrição</th>
	    				<th>Preço</th>
	    				<th>Gerenciar</th>
	    			</tr>
	    		</thead>
	    		<tbody>
		    			<tr>
		    				<td class="jogoName">Dark Souls</td>
		    				<td class="jogoCategory">Adventure RPG</td>
		    				<td class="jogoDescription">Só morre</td>
		    				<td class="jogoPrice">10,00</td>
		    				<td>
		    					<a href="#editModal" type="button" class="btn btn-sm btn-warning btnEdit">Editar</a>
		    					<a href="#deleteModal" type="button" class="btn btn-sm btn-danger btnDelete">Deletar</a>
		    				</td>
		    			</tr>

		    			<tr>
		    				<td class="jogoName">Dark Souls II</td>
		    				<td class="jogoCategory">Adventure RPG</td>
		    				<td class="jogoDescription">Só morre</td>
		    				<td class="jogoPrice">10,00</td>
		    				<td>
		    					<a href="#editModal" type="button" class="btn btn-sm btn-warning btnEdit">Editar</a>
		    					<a href="#deleteModal" type="button" class="btn btn-sm btn-danger btnDelete">Deletar</a>
		    				</td>
		    			</tr>
	    		</tbody>
	    	</table>
	    	
			<div class="remodal" data-remodal-id="editModal">
				<button data-remodal-action="close" class="remodal-close"></button>
				<form class="well form-horizontal" method="post" id="registerForm">
					<fieldset>
			
					<!-- Form Name -->
					<legend class="text-center">Editar Jogo</legend>
			
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-12">Nome</label>  
						<div class="col-md-12 center-block text-center pagination-centered inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-gamepad" aria-hidden="true"></i></span>
								<input name="firstName" placeholder="Nome do jogo" class="form-control" type="text">
							</div>
						</div>
					</div>
			
					<!-- Text input-->
					<div class="form-group"> 
						<label class="col-md-12">Categoria</label>
						<div class="col-md-12 selectContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
								<select name="library" class="form-control selectpicker" >
									<option value=" " >Selecione a Categoria</option>
									<option value="Alabama">Alabama</option>
									<option value="Alaska">Alaska</option>
								</select>
							</div>
						</div>
					</div>
			
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-12">Descrição</label>  
						<div class="col-md-12 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
								<input name="email" placeholder="Descrição do jogo" class="form-control" type="text">
							</div>
						</div>
					</div>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-12">Preço</label>  
						<div class="col-md-12 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
								<input id="endereco" name="endereco" placeholder="10,00" class="form-control" type="text">
							</div>
						</div>
					</div>
			
					<!-- Button -->
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-warning">Enviar <span class="glyphicon glyphicon-send"></span></button>
						</div>
					</div>
					
					</fieldset>
				</form>
				<br>
				<button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
			</div>
			
			<div class="remodal" data-remodal-id="deleteModal">
				<button data-remodal-action="close" class="remodal-close"></button>
				<h2>Deseja deletar este jogo?</h2>
				<p class="deleteStudent"></p>
				<br>
				<button data-remodal-action="cancel" class="remodal-cancel">Não</button>
				<button data-remodal-action="confirm" class="remodal-confirm">Sim</button>
			</div>
	
	        <!-- Footer -->
	    <?php
	    	include "includes/footer.php";
	    ?>
		
	    </div>
	
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/jquery.dataTables.min.js"></script>
	    <script src="js/jquery.mask.min.js"></script>
	    <script src="js/remodal.js"></script>
	    <script src="js/bootstrapValidator.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#registerForm').bootstrapValidator({
			        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			            firstName: {
			                validators: {
			                        stringLength: {
		                        	message: 'O nome deve conter no mínimo 2 caracteres.',
			                        min: 2,
			                    },
			                        notEmpty: {
			                        message: 'Preencha o nome do aluno.'
			                    }
			                }
			            },
			             lastName: {
			                validators: {
			                     stringLength: {
			                    	message: 'O sobrenome deve conter no mínimo 2 caracteres.',
			                        min: 2,
			                    },
			                    notEmpty: {
			                        message: 'Preencha o sobrenome do aluno.'
			                    }
			                }
			            },
			            email: {
			                validators: {
			                    notEmpty: {
			                        message: 'Preencha o e-mail do aluno.'
			                    },
			                    emailAddress: {
			                        message: 'Este endereço de e-mail está inválido.'
			                    }
			                }
			            },
			            endereco: {
			            	validators: {
			            		notEmpty: {
			            			message: 'Preencha o endereço do aluno.'
			            		}
			            	}
			            }
	            	}
		        })
		        .on('success.form.bv', function(e) {
		            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
		                $('#registerForm').data('bootstrapValidator').resetForm();
		
		            // Prevent form submission
		            e.preventDefault();
		
		            // Get the form instance
		            var $form = $(e.target);
		
		            // Get the BootstrapValidator instance
		            var bv = $form.data('bootstrapValidator');
		
		            // Use Ajax to submit form data
		            $.post($form.attr('action'), $form.serialize(), function(result) {
		                console.log(result);
		            }, 'json');
		        });
			});
		</script>
	    <script>
	    	$(document).ready(function(){
	    		$("#alunos").DataTable({
	    			"language": {
	    				"url": "json/Portuguese-Brasil.json"
	    			}
	    		});

	    		$("#endereco").mask("00.000,00", {reverse: true});
	    		
	    		$(".btnEdit").click(function(){
	    			var $item = $(this).closest("tr");
	    			var studentName = $($item).find(".studentName").html();
	    			var studentLastName = $($item).find(".studentLastName").html();
	    			var studentEmail = $($item).find(".studentEmail").html();
	    			var studentAddress = $($item).find(".studentAddress").html();
	    			
	    			$("input[name='firstName']").val(studentName);
	    			$("input[name='lastName']").val(studentLastName);
	    			$("input[name='email']").val(studentEmail);
	    			$("input[name='endereco']").val(studentAddress);
	    		});
	    		
	    		$(".btnDelete").click(function(){
	    			var $item = $(this).closest("tr");
	    			var studentName = $($item).find(".studentName").html();
	    			var studentLastName = $($item).find(".studentLastName").html();
	    			$(".deleteStudent").empty().append(studentName + " " + studentLastName);
	    		});
	    	});
	    </script>
	</body>
</html>