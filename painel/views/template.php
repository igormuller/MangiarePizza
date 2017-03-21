<?php $url = explode('painel', $_SERVER['REQUEST_URI']); array_shift($url); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>.: Painel Cliente :.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
        
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height: auto;} 
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <h4>Nome do cliente logado</h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="<?php echo ($url[0]==="/")? "active":""; ?>"><a href="<?php echo BASE_URL; ?>"><i class="glyphicon glyphicon-home"></i>    Home</a></li>
                        <li class="<?php echo ($url[0]==="/pedido")? "active":""; ?>"><a href="<?php echo BASE_URL; ?>/pedido">Pedidos</a></li>
                    </ul>
                    <br>
                </div>

                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
                
            </div>
        </div>

        <footer class="container-fluid">
            <p>Footer Text</p>
        </footer>
        
        <script src="<?php echo BASE_URL; ?>/assets/js/jquery.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>