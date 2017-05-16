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
                        <i class="fa fa-shopping-cart"></i>  <a href="<?php echo BASE_URL; ?>/pedido">Pedidos</a>
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
                    <strong>Atenção!</strong> <?php echo $info; ?>
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
                                <div class="col-md-5">
                                    <label>Pessoa:</label>
                                    <select class="form-control" name="id_pessoa">
                                        <?php foreach ($pessoas as $pessoa): ?>
                                        <option value="<?php echo $pessoa['id_pessoa']; ?>" <?php echo ($pessoa['id_pessoa'] === $pedido['id_pessoa'])? "selected" : ""; ?>>
                                            <?php echo $pessoa['nome']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Status:</label>
                                    <select class="form-control" name="id_status_pedido">
                                        <?php foreach ($status_pedido as $sp): ?>
                                        <option value="<?php echo $sp['id_status_pedido']; ?>" <?php echo ($sp['id_status_pedido'] === $pedido['id_status_pedido'])? "selected" : ""; ?>>
                                            <?php echo $sp['nome']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Valor Final:</label>
                                    <p class="form-control-static"><strong><?php echo "R$ ".number_format($pedido['valor_final'],2,',','.'); ?></strong></p>
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
                        <a href="#modal_pizza_pedido_add" class="btn btn-success" data-toggle="modal">Incluir pizza</a>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pizza</th>
                                            <th>Massa</th>
                                            <th>Qtde</th>
                                            <th>Valor Un.</th>
                                            <th>Valor</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pizza_pedido as $pp): ?>
                                        <tr>
                                            <td><?php echo $pp['pizza']; ?></td>
                                            <td><?php echo $pp['massa']; ?></td>
                                            <td><?php echo $pp['quantidade']; ?></td>
                                            <td><?php echo "R$".number_format($pp['preco_venda'],2,',','.'); ?></td>
                                            <td><?php echo "R$".number_format($pp['valor'],2,',','.'); ?></td>
                                            <td>
                                                <a href="#modal_pizza_pedido_edit" class="btn btn-sm btn-success" data-toggle="modal" data-id_pizza="<?php echo $pp['id_pizza']; ?>" data-pizza="<?php echo $pp['pizza']; ?>" data-qtde="<?php echo $pp['quantidade']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="<?php echo BASE_URL; ?>/pizza_pedido/remove/<?php echo $pedido['id_pedido']."/".$pp['id_pizza']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remover pizza do pedido?')"><i class="glyphicon glyphicon-remove"></i></a>
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
<!--Modal Incluir Pizza-->
<div class="modal fade" id="modal_pizza_pedido_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Incluir Pizza</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Pedido:</label>
                        <p class="form-control-static" id="editar_id_pedido"><?php echo $pedido['id_pedido']; ?></p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Pizza:</label>
                        <div class="col-md-9">
                            <select class="form-control" name="id_pizza_add">
                                <?php foreach ($pizzas as $pizza): ?>
                                <option value="<?php echo $pizza['id_pizza']; ?>"><?php echo $pizza['nome']." - ".$pizza['massa']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Quantidade:</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="quantidade_add" required="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal Editar Pizza-->
<div class="modal fade" id="modal_pizza_pedido_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Pizza</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Pedido:</label>
                        <p class="form-control-static" id="id_pedido_edit"><?php echo $pedido['id_pedido']; ?></p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Pizza:</label>
                        <p class="form-control-static" id="pizza_edit"></p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Quantidade:</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="quantidade_edit" id="quantidade_edit" required="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                <input type="text" class="form-control hidden" name="id_pizza_edit" id="id_pizza_edit" />
            </form>
        </div>
    </div>
</div>