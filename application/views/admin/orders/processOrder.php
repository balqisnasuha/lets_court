<div class="container table-responsive m-t-20">
    <h2 class="py-3 text-center">View user's booking</h2>
    <table id="myTable" class="table table-bordered table-hover table-striped dataTable">
        <tbody>
            <tr>
                <td><strong>Booked by :</strong></td>
                <td><?php echo $order['username'] ?></td>
            </tr>
            <tr>
                <td><strong>Court:</strong></td>
                <td><?php echo $order['d_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Hours:</strong></td>
                <td><?php echo $order['quantity'] ?></td>
            </tr>
            <tr>
                <td><strong>Price:</strong></td>
                <td><?php echo "RM".$order['price'] ?></td>
            </tr>
            <tr>
                <td><strong>Booking made on:</strong></td>
                <td><?php echo $order['date'] ?></td>
            </tr>
            <form method="post" action="<?php echo base_url().'admin/orders/updateOrder/'.$order['o_id']; ?>">
                <tr>
                    <td><strong>Select Booking Status:</strong></td>
                    <td>
                        <select class="form-control" name="status"
                            class="<?php echo (form_error('status') != "") ? 'is-invalid' : '';?>">
                            <option>Select Status</option>
                            <option value="in process">To Be Determined</option>
                            <option value="closed">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <?php echo form_error('status');?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary btn-block" type="submit">Submit</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>