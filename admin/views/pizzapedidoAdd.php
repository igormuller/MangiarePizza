<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Adicionar Pizza ao Pedido <?php echo $pedido; ?>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php echo BASE_URL; ?>">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-users"></i>  <a href="<?php echo BASE_URL; ?>/pedido/edit/<?php echo $pedido; ?>">Pedido</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-plus"></i>  Adicionar Pizza
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Adionar Pizza</div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Pizza:</label>
                                        <select class="form-control" name="id_pizza">
                                            <?php foreach ($pizzas as $pizza): ?>
                                                <option value="<?php echo $pizza['id_pizza']; ?>"><?php echo $pizza['nome']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Massa:</label>
                                        <select class="form-control" name="id_massa">
                                            <?php foreach ($massas as $massa): ?>
                                                <option value="<?php echo $massa['id_massa']; ?>"><?php echo $massa['nome']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Quantidade:</label>
                                        <input type="number" class="form-control" name="quantidade" required="" />
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success" value="Salvar" />
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>