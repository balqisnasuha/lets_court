<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Courts</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container text-center padding ctype-card">
    <div class="row container">
        <?php if(!empty($courtmins)) { ?>
        <?php foreach($courtmins as $courtmin) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm">
                <?php $image = $courtmin['img'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/court/thumb/'.$image; ?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $courtmin['name']; ?></h4>
                    <!-- <p class="card-text mb-0"><?php echo $courtmin['c_name']." Court"; ?></p>
                    <p class="card-text mb-0"><?php echo $courtmin['address']; ?></p>
                    <hr>
                    <p class="card-text mb-0"></p>
                    <p class="card-text mb-0">OPENING HOURS</p>
                    <p class="card-text mb-0"><?php echo $courtmin['o_days']; ?></p>
                    <p class="card-text"><?php echo $courtmin['o_hr']; ?> - <?php echo $courtmin['c_hr']; ?></p> -->
                    <hr>
                    <a href="<?php echo base_url().'ctype/list/'.$courtmin['r_id']; ?>" class="btn btn-primary">Book</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <h1>Not found</h1>
        <?php } ?>
    </div>
</div>