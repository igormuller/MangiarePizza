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
                                    <th>Pizza</th>
                                    <th>Preço Custo</th>
                                    <th>Preço Venda</th>
                                    <th>Massa</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pizzas as $pizza): ?>
                                <tr>
                                    <td><?php echo $pizza['nome']; ?></td>
                                    <td><?php echo $pizza['preco_custo']; ?></td>
                                    <td><?php echo $pizza['preco_venda']; ?></td>
                                    <td><?php echo $pizza['id_massa']; ?></td>
                                    <td></td>
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