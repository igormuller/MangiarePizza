<div class="container">    
    <div class="row">
        <?php foreach ($pizzas as $pizza): ?>
        <div class="col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $pizza['nome']." - ".$pizza['massa']; ?></div>
                <div class="panel-body">
                    <img src="<?php echo BASE_URL."/admin/assets/images/pizzas/".$pizza['imagem']; ?>" class="img-responsive" style="width:100%" alt="Image">
                </div>
                <div class="panel-footer">
                    <?php echo "R$ ".number_format($pizza['preco_venda'],2,',','.'); ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
