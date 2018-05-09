<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="model/bulma-0.7.1/css/bulma.min.css">
        <title>Registros de personas</title>
    </head>
    <body>
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <nav class="navbar-item">
                    <div class="button is-warning">
                        <a class="navbar-item is-outlined" href="view/listado.php">
                            Listas
                        </a>
                    </div>

                </nav>
            </div>
        </nav>


        <div class="container is-centered">

            <form action="controller/crearRegistro.php" method="POST">
                <div class="box">
                    <div class="control">
                        <input class="input is-focused" type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese Nombre" >
                    </div>
                    <br>
                    <div class="control">
                        <input class="input is-focused" type="text" name="txtEtiquetas" id="txtEtiquetas" placeholder="Ingrese Etiquetas" >  </div>
                    <br>
                    <input class="button is-primary is-outlined" type="submit" value="Registrar"></input>
                    <br>
                    <form onsubmit="this.reset()">
                        </br>


                </div>


            </form>

        </div>





    </body>
</html>
