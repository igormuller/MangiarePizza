<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Editar Pedido <?php echo $pedido['id_pedido']; ?>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php echo BASE_URL; ?>">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-shopping-cart"></i>  <a href="<?php echo BASE_URL; ?>/pedido">Pedido</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i>  Editar
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
                    <div class="panel-heading">Editar Pedido</div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pessoa:</label>
                                    <select class="form-control" name="id_pessoa">
                                        <?php foreach ($pessoas as $pessoa): ?>
                                        <option value="<?php echo $pessoa['id_pessoa']; ?>" <?php echo ($pessoa['id_pessoa'] === $pedido['id_pessoa'])? "selected" : ""; ?>>
                                            <?php echo $pessoa['nome']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Status:</label>
                                    <select class="form-control" name="id_status_pedido">
                                        <?php foreach ($status_pedido as $sp): ?>
                                        <option value="<?php echo $sp['id_status_pedido']; ?>" <?php echo ($sp['id_status_pedido'] === $pedido['id_status_pedido'])? "selected" : ""; ?>>
                                            <?php echo $sp['nome']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação:</label>
                                        <textarea class="form-control" name="observacao" rows="3"><?php echo $pedido['observacao']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="Salvar" />
                        </form>                            
                        
                        <hr>
                        <a href="<?php echo BASE_URL; ?>/pizza_pedido/add/<?php echo $pedido['id_pedido']; ?>" class="btn btn-success">Incluir pizza</a>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pizza</th>
                                            <th>Massa</th>
                                            <th>Qtde</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pizza_pedido as $pp): ?>
                                        <tr>
                                            <td><?php echo $pp['pizza']; ?></td>
                                            <td><?php echo $pp['massa']; ?></td>
                                            <td><?php echo $pp['quantidade']; ?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL; ?>/pizza_pedido/edit/<?php echo $pedido['id_pedido']."/".$pp['id_pizza']."/".$pp['id_massa']; ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="<?php echo BASE_URL; ?>/pizza_pedido/remove/<?php echo $pedido['id_pedido']."/".$pp['id_pizza']."/".$pp['id_massa']; ?>" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>