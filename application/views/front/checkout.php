<div class="container">
    
    <div class="row">
        <div class="col-md-8">
        <h2 class="mt-3">Order Preview</h2>
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Court</th>
                            <th>Price</th>
                            <th>Hours</th>
                            <th>Total payment</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if($this->cart->total_items() > 0) { 
                    foreach($cartItems as $item) { ?>
                        <tr>
                            <td>
                                <?php $image = $item['image'];?>
                                <img class="" width="100"
                                    src="<?php echo base_url().'public/uploads/ctypeesh/thumb/'.$image; ?>">
                            </td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo 'RM'.$item['price']; ?></td>
                            <td><?php echo $item['qty']; ?></td>
                            <td><?php echo 'RM'.$item['subtotal']; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="5">
                                <p>No Items In Your Cart!!</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <?php  if($this->cart->total_items() > 0) { ?>
                            <td class="text-left">Total: <b><?php echo 'RM'.$this->cart->total();?></b></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <form action="<?php echo base_url().'checkout/index';?>" method="POST"
                class="form-container  shadow-container" style="width:80%">
                

                <br>
                <br>
                <br>
                <p class="lead mb-0">Pay at Counter</p>
                <div class="container p-2 mb-3" style="background: #e5e5e5;">
                    Only pay when your booking is accepted :)
                </div>
                <div>
                    <a href="<?php echo base_url().'cart'; ?>" class="btn btn-warning"><i class="fas fa-angle-left"></i>
                        Back to booking</a>
                        
                    <button type="submit" name="placeOrder" class="btn btn-success">
                        Confirm Booking <i
                            class="fas fa-angle-right"></i></button>
                </div>
                </from>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>