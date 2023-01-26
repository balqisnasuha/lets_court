<div class="container p-4">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Select court for <?php echo $res['name']; ?></h1>
        </div>
    </div>
    <div class="container res-card">
        <div class="card">
            <?php $img = $res['img'];?>
            <img src="<?php echo base_url().'public/uploads/court/thumb/'.$img; ?>" class="card-img-top" />
            <div class="card-body">
                <h4 class="card-title font-weight-bold text-primary"><?php echo $res['name']; ?></h4>
                <p class="card-text lead"><?php echo $res['address']; ?></p>
                <p class="card-text">
                A feast of gorgeousness awaits you with super-seasonal dishes created with love by our wonderful chefs.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container p-4 ctype-card">
    <div class="row">
        <?php if(!empty($ctypeesh)) { ?>
        <?php foreach($ctypeesh as $ctype) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm">
                <?php $image = $ctype['img'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/ctypeesh/thumb/'.$image; ?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><?php echo $ctype['name']; ?></h4>
                        <h4 class="text-muted"><b>RM<?php echo $ctype['price']; ?></b></h4>
                    </div>
                    <p class="card-text"><?php echo $ctype['about']; ?></p>
                    <a href="<?php echo base_url().'Ctype/addToCart/'.$ctype['d_id']; ?>" class="btn btn-primary"><i
                            class="fas fa-shopping-cart"></i> Insert into booking list</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <div class="jumbotron">
            <h1>No records found</h1>
        </div>
        <?php } ?>
    </div>
    <hr class="my-4">
</div>