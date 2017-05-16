<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Pizzas
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php echo BASE_URL; ?>">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-cubes"></i>  Pizzas
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo BASE_URL; ?>/pizza/add" class="btn btn-success">Nova pizza</a>
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
                                    <th>Imagem</th>
                                    <th>Pizza</th>
                                    <th>Massa</th>
                                    <th>Preço Custo</th>
                                    <th>Preço Venda</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pizzas as $pizza): ?>
                                <tr>
                                    <td><img src="<?php echo BASE_URL; ?>/assets/images/pizzas/<?php echo $pizza['imagem']; ?>" width="60"></td>
                                    <td><?php echo $pizza['nome']; ?></td>
                                    <td><?php echo $pizza['massa']; ?></td>
                                    <td><?php echo "R$ ".number_format($pizza['preco_custo'],2,',','.'); ?></td>
                                    <td><?php echo "R$ ".number_format($pizza['preco_venda'],2,',','.'); ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>/pizza/edit/<?php echo $pizza['id_pizza']; ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="<?php echo BASE_URL; ?>/pizza/remove/<?php echo $pizza['id_pizza']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remover pizza?')"><i class="glyphicon glyphicon-remove"></i></a>
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