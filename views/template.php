<?php $url = explode('mangiarepizza', $_SERVER['REQUEST_URI']); array_shift($url); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>.: Mangiare Pizza :.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
        
        <style>
            /* Remove the navbar's default rounded borders and increase the bottom margin */ 
            .navbar {
                margin-bottom: 50px;
                border-radius: 0;
            }

            /* Remove the jumbotron's default bottom margin */ 
            .jumbotron {
                margin-bottom: 0;
            }

            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                margin-top: 50px;
                padding: 25px;
            }
        </style>
    </head>
    <body>

        <div class="jumbotron">
            <div class="container text-center">
                <h1>...</h1>      
                <p>...</p>
            </div>
        </div>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo ($url[0] === "/")? "active":""; ?>"><a href="<?php echo BASE_URL; ?>">Home</a></li>
                        <li class="<?php echo ($url[0] === "/pizza")? "active":""; ?>"><a href="<?php echo BASE_URL; ?>/pizza">Pizzas</a></li>
                        <li class="<?php echo ($url[0] === "/contato")? "active":""; ?>"><a href="<?php echo BASE_URL; ?>/contato">Contato</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo BASE_URL; ?>/painel/user"><span class="glyphicon glyphicon-user"></span> Conta</a></li>
                        <li class="<?php echo ($url[0] === "/carrinho")? "active":""; ?>"><a href="<?php echo BASE_URL; ?>/carrinho"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>

        <footer class="container-fluid text-center">
            <p>Mangiare Pizza Copyright</p>  
            Desenvolvido por <a href="http://www.idmweb.com.br" target="_blank">IDMWeb - Soluções</a>
        </footer>
                
        <!-- jQuery -->
        <script src="<?php echo BASE_URL; ?>/assets/js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>        
    </body>
</html>