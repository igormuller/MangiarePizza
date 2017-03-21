<div class="container">    
    <div class="row">
        <div class="col-md-8">
            <div id="carrousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="item <?php echo ($i===1)? "active":""; ?>">
                        <img class="slide-image center-block" src="<?php echo BASE_URL."/assets/images/pizzas/apresentacao/".$i.".png" ?>" alt="">
                    </div>
                    <?php endfor; ?>
                </div>
                <a class="left carousel-control" href="#carrousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carrousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            dsjfashdjkfh
        </div>
    </div>
</div>