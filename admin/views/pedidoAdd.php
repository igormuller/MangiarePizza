<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Adicionar Pedido
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php echo BASE_URL; ?>">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-shopping-cart"></i>  <a href="<?php echo BASE_URL; ?>/pedido">Pedido</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-plus"></i>  Adicionar
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Adicionar Pedido</div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="form-group">
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
                                        <select class="form-control" name="id_status_pedido">
                                            <?php foreach ($status_pedido as $sp): ?>
                                            <option value="<?php echo $sp['id_status_pedido']; ?>"><?php echo $sp['nome']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Observação:</label>
                                <textarea class="form-control" name="observacao" rows="3"></textarea>
                            </div>
                            <input type="submit" class="btn btn-success" value="Salvar" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>