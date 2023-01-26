<div class="container">
  <div class="container shadow-container">
    <div class="d-flex justify-content-between align-items-center">
      <div class="btn-group">
        <h2>Users Feedback</h2>
      </div>
      <input class="form-control mb-3" id="myInput" type="text" placeholder="Search .." style="width:50%;">
    </div>
    <div class="table-responsive-sm">
      <table class="table table-bordered table-striped table-hover table-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php if (!empty($feedback)) { ?>
            <?php foreach ($feedback as $fd) { ?>
              <tr>
                <td>
                  <?php echo $fd->feedbackID; ?>
                </td>
                <td>
                  <?php echo $fd->name; ?>
                </td>
                <td>
                  <?php echo $fd->email; ?>
                </td>
                <td>
                  <?php echo $fd->subject; ?>
                </td>
                <td>
                  <?php echo $fd->message; ?>
                </td>
              </tr>
            <?php } ?>
          <?php } else { ?>
            <tr>
              <td colspan="8">Records not found</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>