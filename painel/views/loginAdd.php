<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>.: Criar Login - Mangiare Pizza :.</title>

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

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <?php if (!empty($info)): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Atneção!</strong> <?php echo $info; ?>
                    </div>
                    <?php endif; ?>
                </div>                
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center"><h3>Criar Login</h3></div>
                        <div class="panel-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" name="nome" required />
                                </div>
                                <div class="form-group">
                                    <label>CEP:</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="cep" name="cep" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Endereço:</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="endereco" name="endereco" required />
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Acessar" />
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- jQuery -->
        <script src="<?php echo BASE_URL; ?>/assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>

    </body>

</html>
