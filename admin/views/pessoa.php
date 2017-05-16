<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Pessoas
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php echo BASE_URL; ?>">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-users"></i>  Pessoas
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo BASE_URL; ?>/pessoa/add" class="btn btn-success">Nova pessoa</a>
            </div>            
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pessoas as $pessoa): ?>
                                <tr>
                                    <td><?php echo $pessoa['nome']; ?></td>
                                    <td><?php echo substr($pessoa['endereco'],0,40)." ..."; ?></td>
                                    <td><?php echo $pessoa['telefone']; ?></td>
                                    <td><?php echo $pessoa['email']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>/pessoa/edit/<?php echo $pessoa['id_pessoa']; ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="<?php echo BASE_URL; ?>/pessoa/remove/<?php echo $pessoa['id_pessoa']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remover pessoa?')"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>