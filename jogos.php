<?php
    session_start();
    include('includes/dbconnect.php');
    $consulta = $conexao->prepare("SELECT * FROM jogos");
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
        <title>Jogos</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/modern-business.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="images/favicon.png" type="image/x-icon">
    </head>

    <body>

        <!-- Navigation -->
        <?php
            include "includes/homeNavigation.php";
        ?>

        <!-- Page Content -->
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jogos</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li class="active">Jogos</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Projects Row -->
            <?php
                $counter = 0;
                foreach ($registros as $key => $value) 
                {
                    $counter++;
                    if (($counter % 3) == 0)
                    {
                       echo "<div class='row'>"; 
                    }

                    echo    "<div class='col-md-4 img-portfolio'>";
                    echo        "<a href='jogo.php?id=".$value['jogoID']."'><img class='img-responsive img-hover' src='".$value['jogoImage']."' alt='".$value['jogoName']."'></a>";
                    echo        "<h3><a href='jogo.php'>".$value['jogoName']."</a></h3>";
                    echo    "</div>";
                    
                    if (($counter % 3) == 0)
                    {
                       echo "</div>";
                    }
                }
            ?>
            <!-- /.row -->

            <hr>

            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="#">&laquo;</a>
                        </li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <?php
                include 'includes/footer.php';
            ?>

        </div>
        <!-- /.container -->

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>