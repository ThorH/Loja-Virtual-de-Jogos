<?php
    $registros_pagina = 9;
    $consulta_total = "SELECT * from jogos";
    $conexao->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $consulta = $conexao->prepare($consulta_total);
    $consulta->execute();
    $linhas = $consulta->rowCount();
    $paginas = ceil($linhas/$registros_pagina);

    if (isset($_GET['pagina'])) 
    {
        $pagina = $_GET['pagina'] - 1;
        $pagina = $pagina * $registros_pagina;
        $consulta = $conexao->prepare("{$consulta_total} limit ?,?");
        $consulta->execute(array($pagina, $registros_pagina));
        $registros = $consulta->fetchAll();
        $linhas = $consulta->rowCount();
        imprimeJogos($registros);
        imprimePaginas($paginas);
    }
    else
    {
        if ($linhas > $registros_pagina) 
        {
            $consulta = $conexao->prepare("{$consulta_total} limit 0,?");
            $consulta->execute(array($registros_pagina));
            $registros = $consulta->fetchAll();
            imprimeJogos($registros);
            imprimePaginas($paginas);
        }
        else
        {
            $registros = $consulta->fetchAll();
            imprimeJogos($registros);
        }
    }

    function imprimeJogos($registros)
    {  
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
    }

    function imprimePaginas($paginas)
    {
        echo "<hr>";
        echo "<div class='row text-center'>";
        echo    "<div class='col-lg-12'>";
        echo        "<ul class='pagination'>";
        echo            "<li>";
        echo                "<a href='#'>&laquo;</a>";
        echo            "</li>";

        for ($i = 1; $i <= $paginas; $i++)
        {
            if (isset($_GET['pagina']))
            {
                if ($_GET['pagina'] == $i)
                {
                    echo "<li class='active'>";
                }
                else
                {
                    echo "<li>";
                }
            }    
            else
            {
                echo    "<li>";
            }

            echo            "<a href='jogos.php?pagina=".$i."'>".$i."</a>";
            echo        "</li>";
        }

        echo            "<li>";
        echo                "<a href='#'>&raquo;</a>";
        echo            "</li>";   
        echo        "</ul>";
        echo    "</div>";
        echo "</div>";
    }
?>