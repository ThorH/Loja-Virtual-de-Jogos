<?php
	session_start();
    include('includes/dbconnect.php');
    $consulta = $conexao->prepare("SELECT * FROM jogos ORDER BY jogoID DESC LIMIT 6");
    $consulta->execute();
    $registros = $consulta->fetchAll();
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="Loja de Jogos.">
	    <title>Loja</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/modern-business.css" rel="stylesheet">
	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link rel="icon" href="images/favicon.png" type="image/x-icon">
	</head>

	<body>
	    <!-- Navigation -->
	    <?php include ("includes/homeNavigation.php"); ?>
	
	    <!-- Header Carousel -->
	    <header id="myCarousel" class="carousel slide">
	        <!-- Indicators -->
	        <ol class="carousel-indicators">
	            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	            <li data-target="#myCarousel" data-slide-to="1"></li>
	            <li data-target="#myCarousel" data-slide-to="2"></li>
	        </ol>
	
	        <!-- Wrapper for slides -->
	        <div class="carousel-inner">
	            <div class="item active">
	                <div class="fill" style="background-image:url('images/banner1.jpg');"></div>
	                <div class="carousel-caption"></div>
	            </div>
	            <div class="item">
	                <div class="fill" style="background-image:url('images/banner2.jpg');"></div>
	                <div class="carousel-caption"></div>
	            </div>
	            <div class="item">
	                <div class="fill" style="background-image:url('images/banner3.jpg');"></div>
	                <div class="carousel-caption"></div>
	            </div>
	        </div>
	
	        <!-- Controls -->
	        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	            <span class="icon-prev"></span>
	        </a>
	        <a class="right carousel-control" href="#myCarousel" data-slide="next">
	            <span class="icon-next"></span>
	        </a>
	    </header>
	
	    <!-- Page Content -->
	    <div class="container">
	
	        <!-- Marketing Icons Section -->
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header text-center">Loja Virtual de Jogos</h1>
	            </div>
	        </div>
	        <!-- /.row -->
	
	        <!-- Portfolio Section -->
	        <div class="row">
	        	<?php
	        		foreach ($registros as $key => $value) 
	        		{
		        		echo "<div class='col-md-4 col-sm-6'>";
		        		echo 	"<a href='jogo.php?id=".$value['jogoID']."'><img class='img-responsive img-portfolio img-hover' src='".$value['jogoImage']."' alt='".$value['jogoName']."'></a>";
		        		echo "</div>";
	        		}
	        	?>
	        </div>
	        <!-- /.row -->
	
	        <hr>
	
	        <!-- Footer -->
			<?php include ("includes/footer.php"); ?>
	    </div>
	    <!-- /.container -->
	
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script>
		    $('.carousel').carousel({
		        interval: 5000
		    });
	    </script>
	</body>
</html>