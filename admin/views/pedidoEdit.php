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
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar Pedido</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Pessoa:</label>
                                <select class="form-control" name="id_pessoa">
                                    <?php foreach ($pessoas as $pessoa): ?>
                                    <option value="<?php echo $pessoa['id_pessoa']; ?>"><?php echo $pessoa['nome']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Status:</label>
                                <select class="form-control" name="id_pessoa">
                                    <?php foreach ($status_pedido as $sp): ?>
                                    <option value="<?php echo $sp['id_status_pedido']; ?>"><?php echo $sp['nome']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação:</label>
                                    <textarea class="form-control" name="observacao" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <a href="#modal_pizza_pedido" class="btn btn-success" data-toggle="modal" data-id_pedido="<?php echo $pedido['id_pedido']; ?>">Incluir pizza</a>
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
                                        <tr>
                                            <td></td>
                                        </tr>
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
<div class="modal fade" id="modal_pizza_pedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <select class="form-control" name="id_pizza">
                                <?php foreach ($pizzas as $pizza): ?>
                                <option value="<?php echo $pizza['id_pizza']; ?>"><?php echo $pizza['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Massa:</label>
                        <div class="col-md-9">
                            <select class="form-control" name="id_massa">
                                <?php foreach ($massas as $massa): ?>
                                <option value="<?php echo $massa['id_massa']; ?>"><?php echo $massa['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Quantidade:</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="quantidade" required="" />
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