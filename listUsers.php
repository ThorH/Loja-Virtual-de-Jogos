<?php
	session_start();

	if (!isset($_SESSION['userID'])) 
	{
		header("Location: index.php");
	}
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Loja de Jogos.">
	    <title>Admin - Listar Usuários</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/modern-business.css" rel="stylesheet">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	    <link href="css/remodal.css" rel="stylesheet" type="text/css">
	    <link href="css/remodal-default-theme.css" rel="stylesheet" type="text/css">
	    <link rel="icon" href="images/favicon.png" type="image/x-icon">
	</head>

	<?php	
		include('includes/dbconnect.php');

		if (isset($_POST["userName"]))
		{
			if ($_POST["userID"] > 0) //edit
			{
				$consulta = $conexao->prepare("UPDATE usuarios SET userName = ?, userEmail = ?, userPassword = ? WHERE userID = ?");

				$userID = $_POST["userID"];
				$userName = $_POST["userName"];
				$userEmail = $_POST["userEmail"];
				$userPassword = $_POST["userPassword"];

				$consulta->execute(array($userName, $userEmail, $userPassword, $userID));
				$resultado = $consulta->rowCount();
				
				if ($resultado == 0)
				{
					echo "erro ao atualizar";
				}
				else
				{
					echo "atualizado com sucesso";
				}
			}
			else //insert
			{
				$consulta = $conexao->prepare("INSERT INTO usuarios (userName, userEmail, userPassword) VALUES (?,?,?)");

				$userName = $_POST["userName"];
				$userEmail = $_POST["userEmail"];
				$userPassword = $_POST["userPassword"];

				$consulta->execute(array($userName, $userEmail, $userPassword));
				$resultado = $consulta->rowCount();
				
				if($resultado == 0)
				{
					echo "erro inserir";
				}
				else
				{
					echo "inserido com sucesso";
				}
			}
		}
		elseif (isset($_POST["userID"])) //delete
		{
			$consulta = $conexao->prepare("DELETE FROM usuarios WHERE userID = ?");

			$userID = $_POST["userID"];

			$consulta->execute(array($userID));
			$resultado = $consulta->rowCount();
			
			if($resultado == 0)
			{
				echo "erro ao deletar";
			}
			else
			{
				echo "deletado com sucesso";
			}
		}

		$consulta = $conexao->prepare("SELECT * FROM usuarios"); //read
		$consulta->execute();
		$registros = $consulta->fetchAll();
	?>

	<body>
	    <!-- Navigation -->
	    <?php include("includes/adminNavigation.php"); ?>

	    <!-- Page Content -->
	    <div class="container dataTable">
	    	<a class="btn btn-success btnCreate" href="#editModal">Adicionar</a>
	    	<br>
	    	<br>

	    	<table id="usuarios" class="table table-striped table-bordered">
	    		<thead>
	    			<tr>
	    				<th>Nome</th>
	    				<th>E-mail</th>
	    				<th>Senha</th>
	    				<th width="70px">Gerenciar</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php  
	    				foreach ($registros as $key => $value) 
	    				{
	    					echo "<tr>";
	    					echo 	"<td class='userName' data-id='".$value['userID']."'>".$value['userName']."</td>";
	    					echo	"<td class='userEmail'>".$value['userEmail']."</td>";
	    					echo	"<td class='userPassword'>".$value['userPassword']."</td>";
	    					echo	"<td>";
	    					echo		"<a href='#editModal' type='button' style='width: 70px; margin-bottom: 5px;' class='btn btn-sm btn-warning btnEdit'>Editar</a>";
	    					echo		"<a href='#deleteModal' type='button' style='width: 70px;' class='btn btn-sm btn-danger btnDelete'>Deletar</a>";
	    					echo	"</td>";
    						echo "</tr>";
	    				}
	    			?>
	    		</tbody>
	    	</table>
	    	
			<div class="remodal" data-remodal-id="editModal">
				<button data-remodal-action="close" class="remodal-close"></button>
				<form action="listUsers.php" class="well form-horizontal" method="post" id="registerForm">
					<fieldset>
						<!-- Form Name -->
						<legend id="modalTitle" class="text-center"></legend>

						<!-- Hidden ID-->
						<input type="hidden" name="userID" value="">
				
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-12">Nome</label>  
							<div class="col-md-12 center-block text-center pagination-centered inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></i></span>
									<input name="userName" placeholder="João" class="form-control" type="text">
								</div>
							</div>
						</div>
				
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-12">E-mail</label>  
							<div class="col-md-12 center-block text-center pagination-centered inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input name="userEmail" placeholder="joao@joao.com" class="form-control" type="text">
								</div>
							</div>
						</div>
				
						<!-- Text input-->
						<div class="form-group">
							<label class="col-md-12">Senha</label>  
							<div class="col-md-12 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
									<input name="userPassword" placeholder="123456" class="form-control" type="text">
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
				<form action="listUsers.php" method="post">
					<input type="hidden" name="userID" value="">
					<button data-remodal-action="close" class="remodal-close"></button>
					<h2>Deseja deletar este usuário?</h2>
					<p class="deleteUser"></p>
					<br>
					<button data-remodal-action="cancel" class="remodal-cancel">Não</button>
					<button type="submit" class="remodal-confirm">Sim</button>
				</form>
			</div>
	
	        <!-- Footer -->
		    <?php include("includes/footer.php"); ?>
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
			            userName: {
			                validators: {
			                        stringLength: {
		                        	message: 'O nome deve conter no mínimo 2 caracteres.',
			                        min: 2,
			                    },
			                        notEmpty: {
			                        message: 'Preencha o nome do usuário.'
			                    }
			                }
			            },
			            userEmail: {
			                validators: {
			                    notEmpty: {
			                        message: 'Preencha o e-mail do usuário.'
			                    },
			                    emailAddress: {
			                        message: 'Este endereço de e-mail está inválido.'
			                    }
			                }
			            },
			            userPassword: {
			                validators: {
			                	stringLength: {
		                        	message: 'A senha deve conter no mínimo 2 caracteres.',
			                        min: 2,
			                    },
			                    notEmpty: {
			                        message: 'Preencha a senha do usuário.'
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
	    		$("#usuarios").DataTable({
	    			"language": {
	    				"url": "json/Portuguese-Brasil.json"
	    			}
	    		});

	    		$(".btnCreate").click(function(){
	    			$("#modalTitle").text("Criar Usuário");
	    			$("input[name='userID']").val("");
	    			$("input[name='userName']").val("");
	    			$("input[name='userEmail']").val("");
	    			$("input[name='userPassword']").val("");
	    		});
	    		
	    		$(".btnEdit").click(function(){
					$("#modalTitle").text("Editar Usuário");
	    			var $item = $(this).closest("tr");
	    			var userID = $($item).find(".userName").data("id");
	    			var userName = $($item).find(".userName").html();
	    			var userEmail = $($item).find(".userEmail").html();
	    			var userPassword = $($item).find(".userPassword").html();
	    			
	    			$("input[name='userID']").val(userID);
	    			$("input[name='userName']").val(userName);
	    			$("input[name='userEmail']").val(userEmail);
	    			$("input[name='userPassword']").val(userPassword);
	    		});
	    		
	    		$(".btnDelete").click(function(){
	    			var $item = $(this).closest("tr");
	    			var userID = $($item).find(".userName").data("id");
	    			var userName = $($item).find(".userName").html();
	    			$("input[name='userID']").val(userID);
	    			$(".deleteUser").empty().append(userName);
	    		});
	    	});
	    </script>
	</body>
</html>