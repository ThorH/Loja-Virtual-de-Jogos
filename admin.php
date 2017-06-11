<?php
	session_start();

	if (!isset($_SESSION['user'])) 
	{
		header("Location: index.php");
	}
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Loja de Jogos.">
	    <title>Admin</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/modern-business.css" rel="stylesheet">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   	    <link rel="icon" href="images/favicon.png" type="image/x-icon">
	</head>

	<body>
	
	    <!-- Navigation -->
	    <?php
	    	include "includes/adminNavigation.php";
	    ?>

	    <!-- Page Content -->
	    <div class="container">
	    
	    	<!-- content -->
	
	        <!-- Footer -->
			<?php
				include 'includes/footer.php';
			?>
		
	    </div>
	
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>