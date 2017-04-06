<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Editar Pessoa
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php echo BASE_URL; ?>">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-users"></i>  <a href="<?php echo BASE_URL; ?>/pessoa">Pessoas</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-user"></i>  Editar
                    </li>
                </ol>
            </div>
        </div>
        <?php if (!empty($info)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Atneção!</strong> <?php echo $info; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><strong>Editar Pessoa</strong></div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo $pessoa['nome']; ?>" required="" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>CEP:</label>
                                        <input type="text" class="form-control cep" name="cep" id="cep" value="<?php echo $endereco[6]; ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Endereco:</label>
                                        <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $endereco[0]; ?>" required="" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Número:</label>
                                        <input type="text" class="form-control" name="numero" value="<?php echo $endereco[1]; ?>" required="" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Complemento:</label>
                                        <input type="text" class="form-control" name="complemento" value="<?php echo $endereco[2]; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Bairro:</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $endereco[3]; ?>" required="" />
                                    </div>
                                    <div class="col-md-5">
                                        <label>Cidade:</label>
                                        <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $endereco[4]; ?>" required="" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Estado:</label>
                                        <input type="text" class="form-control" name="estado" id="uf" value="<?php echo $endereco[5]; ?>" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Telefone:</label>
                                        <input type="text" class="form-control telefone" name="telefone" value="<?php echo $pessoa['telefone']; ?>" required="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>E-mail:</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $pessoa['email']; ?>" required="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Senha:</label>
                                        <input type="password" class="form-control" name="senha" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>