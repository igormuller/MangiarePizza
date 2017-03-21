<?php $array = explode('/', $_SERVER['REQUEST_URI']); $url = array_slice($array, 3); ?>
<!DOCTYPE html>
<html lang="pr-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>.: Administração - Mangiare Pizza :.</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo BASE_URL; ?>/assets/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo BASE_URL; ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['nomeLogado']; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo BASE_URL; ?>/usuario/index/<?php echo $_SESSION['uLogado']; ?>"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo BASE_URL ?>/login/logOut"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="<?php echo (in_array("",$url))? "active":""; ?>">
                            <a href="<?php echo BASE_URL; ?>"><i class="fa fa-fw fa-home"></i> Home</a>
                        </li>
                        <li class="<?php echo (in_array("pizza",$url))? "active":""; ?>">
                            <a href="<?php echo BASE_URL; ?>/pizza"><i class="fa fa-fw fa-cubes"></i> Pizzas</a>
                        </li>
                        <li class="<?php echo (in_array("pedido",$url))? "active":""; ?>">
                            <a href="<?php echo BASE_URL; ?>/pedido"><i class="fa fa-fw fa-shopping-cart"></i> Pedidos</a>
                        </li>
                        <li class="<?php echo (in_array("pessoa",$url))? "active":""; ?>">
                            <a href="<?php echo BASE_URL; ?>/pessoa"><i class="fa fa-fw fa-users"></i> Pessoas</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo BASE_URL; ?>/assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
        
        <script src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script>

    </body>

</html>
