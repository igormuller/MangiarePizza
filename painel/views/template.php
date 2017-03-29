<?php $array = explode('/', $_SERVER['REQUEST_URI']); $url = array_slice($array, 3); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>.: Painel Cliente :.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/font-awesome.min.css">
        
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 100%}

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
                    <h4><a href="<?php echo BASE_URL; ?>/user"><?php echo $_SESSION['nomePLogado']; ?></a></h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="<?php echo (in_array("",$url))? "active":""; ?>"><a href="<?php echo BASE_URL; ?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li class="<?php echo (in_array("pedido",$url))? "active":""; ?>"><a href="<?php echo BASE_URL; ?>/pedido"><i class="glyphicon glyphicon-inbox"></i> Pedidos</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/login/logOut"><i class="glyphicon glyphicon-log-out"></i> LogOut</a></li>
                    </ul>
                    <br>
                </div>
                <br/>
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
                
            </div>
        </div>
        
        <footer class="container-fluid">
            <div class="row">
                <div class="col-md-12 text text-center">
                    Voltar para <a href="../">Mangiare Pizza</a>
                </div>
            </div>
            
        </footer>
        
        <script src="<?php echo BASE_URL; ?>/assets/js/jquery.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>