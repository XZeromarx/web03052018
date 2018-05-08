<!DOCTYPE html>
<?php
REQUIRE_ONCE("../model/Data.php");
$d = new Data();
$resEtiquetas = $d->listarEtiquetas();
$resPers = $d->listarPersona();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../model/bulma-0.7.1/css/bulma.min.css">
        <title>Listado de Personas</title>
    </head>
    <body>
        <div class="box">
            <div class="columns">

                <div class="column is-left">

                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <table class="table is-bordered">
                                <caption>Lista de personas</caption>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Etiquetas</th>
                                </tr>
                                <!dentro de un ciclo de personaEtiqueta >


                                <?php
                                while ($persona = $resPers->fetch_assoc()) {
                                    ?>
                                    
                                <?php$res = $d->etiquetaPers($persona['id']) ?>

                                    <tr>
                                        <td><?php echo $persona['id'] ?></td>
                                        <td><?php echo $persona['nombre'] ?></td>



                                        <td> <?php echo $res['rs'] ?> </td>
                                    </tr>

                                <?php } ?>




                                <!dentro de un ciclo de personaEtiqueta ^>



                            </table> 


                            <table class="table is-bordered">
                                <caption>Lista de Etiquetas</caption>
                                <tr>
                                    <th>id</th>
                                    <th>Etiquetas</th>
                                </tr>

                                <!Dentro de ciclo etiquetas>

                                <?php
                                while ($etiqueta = $resEtiquetas->fetch_assoc()) {
                                    ?>   

                                    <tr>
                                        <td> <?php echo $etiqueta['id'] ?>    </td>
                                        <td> <?php echo $etiqueta['nombre'] ?></td>
                                    </tr>

                                <?php } ?>

                                <!Dentro de ciclo etiquetas>

                            </table>
                    </div>
                </div>    


            </div>

        </div>
    </body>
</html>