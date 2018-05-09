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
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <nav class="navbar-item">
                    <div class="button is-warning">
                        <a class="navbar-item is-outlined" href="../index.php">
                            Inicio
                        </a>
                    </div>

                </nav>
            </div>
        </nav>
        <div class="box">
            <div class="columns">

                <div class="column is-left">

                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <div class="title">Listado de asignacion de etiquetas</div>

                            <div class="box">
                                <table class="table is-bordered is-hoverable is-fullwidth is-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Etiquetas</th>
                                        </tr>
                                    </thead>
                                    <!dentro de un ciclo de personaEtiqueta >


                                    <?php
                                    while ($persona = $resPers->fetch_assoc()) {
                                        ?>

                                        <?php $res = $d->etiquetaPers($persona['id']);
                                        ?>


                                        <tr>
                                            <td class="style is-danger"><?php echo $persona['id']; ?></td>
                                            <td><?php echo $persona['nombre']; ?></td>

                                            <?php while ($r = $res->fetch_assoc()) { ?>
                                            <td class="style is-primary"> <?php echo $r['etiquetas'] ?> </td>
                                            <?php } ?>
                                        </tr>

                                    <?php } ?>




                                    <!dentro de un ciclo de personaEtiqueta ^>



                                </table>
                            </div>

                            <div class="box">
                                <table class="table is-bordered is-hoverable is-fullwidth is-striped">
                                    <div class="title">Etiquetas registradas</div>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Etiquetas</th>
                                        </tr>
                                    </thead>
                                    <!Dentro de ciclo etiquetas>

                                    <?php
                                    while ($et = $resEtiquetas->fetch_assoc()) {
                                        ?>   

                                        <tr>
                                            <td class="style is-danger> <?php echo $et['id'] ?>    </td>
                                            <td> <?php echo $et['nombre'] ?></td>
                                        </tr>

                                    <?php } ?>

                                    <!Dentro de ciclo etiquetas>

                                </table>
                            </div>

                    </div>
                </div>    


            </div>

        </div>
    </body>
</html>