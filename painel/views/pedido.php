<div class="col-sm-9">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo BASE_URL; ?>/pedido/add" class="btn btn-success">Novo pedido</a>
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
                                    <th>Pedido</th>
                                    <th>Data</th>
                                    <th>Valor Total</th>
                                    <th>Total Pizzas</th>
                                    <th>Status</th>
                                    <th>Pessoa</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pedidos as $pedido): ?>
                                <tr>
                                    <td><?php echo $pedido['id_pedido']; ?></td>
                                    <td><?php echo date('d/m/Y - H:i:s',strtotime($pedido['dt_pedido'])); ?></td>
                                    <td><?php echo "R$ ".number_format($pedido['valor_final'],2,',','.'); ?></td>
                                    <td><?php echo $pedido['total_pizza']; ?></td>
                                    <td><?php echo $pedido['status_pedido']; ?></td>
                                    <td><?php echo $pedido['pessoa']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>/pedido/view/<?php echo $pedido['id_pedido']; ?>" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Visualizar"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <?php if ($pedido['id_status_pedido'] === '1') { ?>
                                        <a href="<?php echo BASE_URL; ?>/pedido/edit/<?php echo $pedido['id_pedido']; ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="<?php echo BASE_URL; ?>/pedido/cancel/<?php echo $pedido['id_pedido']; ?>" onclick="return confirm('Deseja cancelar o pedido?')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></a>
                                        <?php } ?>
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
