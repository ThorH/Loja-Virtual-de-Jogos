<!DOCTYPE html>

<html lang="pt-br">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Loja de Jogos.">
	    <title>Login</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/modern-business.css" rel="stylesheet">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link rel="icon" href="images/favicon.png" type="image/x-icon">
	</head>

	<?php
		session_start();
		$loginError = 0;
		
	    if (isset($_SESSION['user']) != "") 
	    {
	        header("Location: admin.php");
	    }

		if (isset($_POST["userName"]))
		{
			$userName = $_POST["userName"];
			$userPassword = $_POST["userPassword"];

			include('includes/dbconnect.php');
	        $consulta = $conexao->prepare("SELECT userID, userName, userPassword FROM usuarios WHERE userName = ? AND userPassword = ?");
	        $consulta->execute(array($userName, $userPassword));
	        $registros = $consulta->fetchAll();

	        if (!empty($registros))
	        {
		        foreach ($registros as $key => $value) 
		        {
		        	if ($userName == $value["userName"] && $userPassword == $value["userPassword"])
		        	{
		        		$_SESSION['userID'] = $value['userID'];
		        		$_SESSION['userName'] = $value['userName'];
		        		header("Location: admin.php");
		        	}
		        	else
		        	{
		        		$loginError++;
		        	}
		        }
	        }
	        else
	        {
	        	$loginError++;
	        }
		}
	?>

	<body>
	
	    <!-- Navigation -->
	    <?php
	    	include "includes/homeNavigation.php";
	    ?>
		
	    <!-- Page Content -->
	    <div class="container">
		    <div class="row">
			    <div class="col-md-12">
			    	<!-- Login -->
					<form action="login.php" class="well form-horizontal container" method="post" id="loginForm">
						<fieldset>
							<!-- Form Name -->
							<legend class="text-center">Login</legend>
					
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-12 text-center" style="width: 100%;">Nome</label>  
								<div class="col-md-12 center-block text-center pagination-centered inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></i></span>
										<input name="userName" placeholder="João" class="form-control" type="text">
									</div>
								</div>
							</div>
				
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-12 text-center" style="width: 100%;">Senha</label>  
								<div class="col-md-12 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
										<input name="userPassword" placeholder="123456" class="form-control" type="password">
									</div>
								</div>
							</div>

							<?php
								if ($loginError > 0)
								{
									echo "<p class='text-center' style='color: red;'>Login inválido</p>";
								}	
							?>

							<!-- Button -->
							<div class="form-group">
								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-warning">Logar <i class="fa fa-sign-in" aria-hidden="true"></i></button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
	        <!-- Footer -->
		    <?php
		    	include "includes/footer.php";
		    ?>
	    </div>
	    <!-- /.container -->
	
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/bootstrapValidator.min.js"></script>
	    <script>
			$(document).ready(function() {
				$('#loginForm').bootstrapValidator({
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
			                        message: 'Preencha o seu nome de usuário.'
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
			                        message: 'Preencha a sua senha de usuário.'
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
	</body>
</html>