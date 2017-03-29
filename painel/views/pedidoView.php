<div class="col-sm-9">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Data Pedido</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $pedido['dt_pedido']; ?></td>
                <td><?php echo "R$ ".number_format($pedido['valor_final'],2,',','.'); ?></td>
                <td><?php echo $pedido['status']; ?></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sabor</th>
                <th>Massa</th>
                <th>Qtde</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedido['pizzas'] as $pizza): ?>
            <tr>
                <td><?php echo $pizza['pizza']; ?></td>
                <td><?php echo $pizza['massa']; ?></td>
                <td><?php echo $pizza['quantidade']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
