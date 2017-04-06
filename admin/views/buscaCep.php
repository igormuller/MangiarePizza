<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Busca CEP
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-search"></i>  Busca CEP
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
                    <div class="panel-heading">.: Busca CEP :.</div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="form-group">
                                <label>Endereço:</label>
                                <input type="text" class="form-control" name="endereco" placeholder="Endereço" required="" />
                            </div>
                            <div class="form-group">
                                <label>Cidade:</label>
                                <input type="text" class="form-control" name="cidade" placeholder="Cidade" required="" />
                            </div>
                            <div class="form-group">
                                <label>Estado:</label>
                                <input type="text" class="form-control" name="estado" placeholder="UF" required="" />
                            </div>
                            <input type="submit" class="btn btn-success" value="Buscar" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>CEP</th>
                            <th>Endereço</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($registros as $reg): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $reg['cep']; ?></td>
                            <td><?php echo $reg['logradouro']; ?></td>
                            <td><?php echo $reg['bairro']; ?></td>
                            <td><?php echo $reg['localidade']; ?></td>
                            <td><?php echo $reg['uf']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
