<!DOCTYPE html>
<?php 
REQUIRE_ONCE("../model/Data.php");
$d = new Data();
$rs = $d->listarEtiquetas();
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
                                <tr>
                                    <td>ID</td>
                                    <td>NOMBRE</td>
                                    <td>ETIQUETA</td>
                                </tr>
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
                            
                            while($dato = $rs->fetch_assoc()){
                             ?>   
                            <tr>
                                <td><?php echo $etiqueta['id'] ?></td>
                                <td><?php echo $etiqueta['nombre']?></td>
                            </tr>
                            <?php }?>
                            
                            
                           
                            <!Dentro de ciclo etiquetas>

                        </table>
                    </div>
                </div>    


            </div>

        </div>
    </body>
</html>