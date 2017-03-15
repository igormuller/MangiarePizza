<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Pizzas Adicionar
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php echo BASE_URL; ?>">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-cubes"></i>  <a href="<?php echo BASE_URL; ?>/pizza">Pizzas</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-cube"></i>  Adicionar
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Adicionar Pizza</strong></div>
                <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" class="form-control" name="nome" required="" />
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Preço Custo:</label>
                                    <input type="text" class="form-control" name="preco_custo" />
                                </div>
                                <div class="col-md-4">
                                    <label>Preço Venda:</label>
                                    <input type="text" class="form-control" name="preco_venda" required=""/>
                                </div>
                                <div class="col-md-4">
                                    <label>Massa:</label>
                                    <select class="form-control" name="id_massa">
                                        <?php foreach ($massas as $massa): ?> 
                                        <option value="<?php echo $massa['id_massa']; ?>"><?php echo $massa['nome']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Imagem:</label>
                            <input type="file" name="imagem" />
                        </div>
                        <div class="form-group">
                            <label>Ingredientes:</label>
                            <textarea class="form-control" rows="3" name="ingredientes"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Salvar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>