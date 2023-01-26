<div class="conatiner">
    <form action="<?php echo base_url().'admin/courtmin/edit/'.$courtmin['r_id'];?>" method="POST"
        class="form-container mx-auto  shadow-container" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Edit "<?php echo $courtmin['name'] ?>" Details</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Court Name</label>
                    <input type="text" name="res_name"  class="form-control
                    <?php echo (form_error('res_name') != "") ? 'is-invalid' : '';?>" placeholder="Add court name"
                        value="<?php echo set_value('res_name', $courtmin['name']);?>">
                    <?php echo form_error('res_name'); ?>
                </div>
               
                <div class="form-group">
                    <label class="control-label">Open Days</label>
                    <select name="o_days" id="o_days" class="form-control 
                    <?php echo (form_error('o_days') != "") ? 'is-invalid' : '';?>" data-placeholder="Choose a Category"
                        tabindex="1">
                        <option value="">--Select your Days--</option>
                        <option value="mon-fri <?php echo $courtmin['o_days'] == "mon-fri" ? "selected" : "";?>">mon-fri</option>
                        <option value="mon-sat" <?php echo $courtmin['o_days'] == "mon-sat" ? "selected" : "";?>>mon-sat</option>
                        <option value="24hr-x7" <?php echo $courtmin['o_days'] == "24hr-x7" ? "selected" : "";?>>24hr-x7</option>
                    </select>
                    <?php echo form_error('o_days'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-danger">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <br>
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>

                    <?php if($courtmin['img'] != '' && file_exists('./public/uploads/court/thumb/'.$courtmin['img'])) { ?>
                    <img class="mt-1" src="<?php echo base_url().'public/uploads/court/thumb/'.$courtmin['img']; ?>">
                    <?php } else {?>
                    <img width="300" src="<?php echo base_url().'public/uploads/no-image.png'?>">
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Court type</label>
                    <select name="c_name" id="c_name"
                        class="form-control <?php echo (form_error('c_name') != "") ? 'is-invalid' : '';?>">
                        <option value="">~Court type~</option>
                        <?php 
                if (!empty($cats)) { 
                    foreach($cats as $cat) {
                        ?>
                        <option value="<?php echo $cat['c_id'];?>">
                            <?php echo $cat['c_name'];?>
                        </option>
                        <?php }
                }
                ?>
                    </select>
                    <?php echo form_error('c_name');?>
                </div>
                <h3 class="box-title m-t-40">Address</h3>
                <div class="form-group">
                    <textarea name="address" type="text" style="height:70px;"
                        class="form-control
            <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>"><?php echo set_value('address', $courtmin['address']);?></textarea>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-success" value="Make Changes">
            <a href="<?php echo base_url().'admin/courtmin/index'?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
<script>
    const o_hr = document.getElementById("o_hr");
    const c_hr = document.getElementById("c_hr");
    const o_days = document.getElementById("o_days");
    const c_name = document.getElementById("c_name");

    o_hr.value = "<?php echo $_POST['o_hr']; ?>";
    c_hr.value = "<?php echo $_POST['c_hr']; ?>";
    o_days.value = "<?php echo $_POST['o_days']; ?>";
    c_name.value = "<?php echo $_POST['c_name']; ?>";
</script>