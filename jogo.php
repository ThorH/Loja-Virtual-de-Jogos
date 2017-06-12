<?php
    session_start();
    include('includes/dbconnect.php');
    $jogoID = $_GET['id'];
    $consulta = $conexao->prepare("SELECT * FROM jogos WHERE jogoID = ?");
    $consulta->execute(array($jogoID));
    $registros = $consulta->fetchAll();

    foreach ($registros as $key => $value) 
    {
        $jogoName = $value['jogoName'];
        $jogoCategory = $value['jogoCategory'];
        $jogoDescription = $value['jogoDescription'];
        $jogoPrice = $value['jogoPrice'];
        $jogoImage = $value['jogoImage'];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Loja de Jogos.">
        <title>Jogo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/modern-business.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="images/favicon.png" type="image/x-icon">
    </head>

    <body>
        <!-- Navigation -->
        <?php include "includes/homeNavigation.php"; ?>

        <!-- Page Content -->
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $jogoName ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="jogos.php">Jogos</a></li>
                        <li class="active">Jogo</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Portfolio Item Row -->
            <div class="row">
                <div class="col-md-8">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <?php echo "<img class='img-responsive fill' src='".$jogoImage."' alt='".$jogoName."' style='width: 100%;'>" ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Descrição</h3>
                    <p><?php echo $jogoDescription ?></p>
                    <h3>Detalhes</h3>
                    <ul>
                        <li><?php echo $jogoCategory ?></li>
                        <li>R$ <?php echo $jogoPrice ?></li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <?php include 'includes/footer.php'; ?>
        </div>
        <!-- /.container -->

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>