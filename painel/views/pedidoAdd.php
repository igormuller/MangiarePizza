<div class="col-sm-9">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Atenção!</strong> O pagamento deve ser feito na entrega das pizzas!
            </div>
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
                                    <p class="form-control-static"><?php echo $_SESSION['nomePLogado']; ?></p>
                                    <input type="text" name="id_pessoa" class="hidden" value="<?php echo $_SESSION['pLogado']; ?>" />
                                </div>
                                <div class="col-md-6">
                                    <label>Status:</label>
                                    <p class="form-control-static">Novo</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Observação:</label>
                            <textarea class="form-control" name="observacao" rows="3"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success" value="Escolher Pizzas" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>