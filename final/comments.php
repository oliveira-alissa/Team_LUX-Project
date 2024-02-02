<?php include 'view/header.php'; ?>
<form class="form-horizontal" action="display_comments.php" method="post">
  <h4>We Treasure Your Comments</h4>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="fn">First Name:</label>
    <div class="col-sm-10">
      <input class="form-control" id="fn" type="text" name="FirstName">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="phone">Phone Number:</label>
    <div class="col-sm-10">
      <input class="form-control" id="phone" type="tel" name="phone" pattern="\d{3}\ +\d{3} +\d{4}" />
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="email">Email Address:</label>
    <div class="col-sm-10">
      <input class="form-control" id="email" type="email" name="email" placeholder="name@domain.com">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="sr">Your Comments</label>
    <div class="col-sm-10">
      <input class="form-control" id="sr" type="text" name="request" style="width: 100%; height: 300px;" />
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <input class="btn btn-primary" type="submit" value="Submit Comments" id="ButtonSubmit">

    </div>





    <?php include 'view/footer.php'; ?>