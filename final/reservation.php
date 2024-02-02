<?php include 'view/header.php'; ?>

<form class="form-horizontal" action="insert.php" method="post">
  <h4>Reservation at LUX Beach Resort </h4>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="fn"> First Name:</label>
    <div class="col-sm-10">
      <input class="form-control" id="fn" type="text" name="FirstName" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="ln">Last Name:</label>
    <div class="col-sm-10">
      <input class="form-control" id="ln" type="text" name="LastName">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="na">Number & Address:</label>
    <div class="col-sm-10">
      <input class="form-control" id="na" type="text" name="Address" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="city">City:</label>
    <div class="col-sm-10">
      <input class="form-control" id="city" type="text" name="city" placeholder="City" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="zip">Zip Code:</label>
    <div class="col-sm-10">
      <input class="form-control" id="zip" type="postal" name="zipcode" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="in">Check-In Date:</label>
    <div class="col-sm-10">
      <input class="form-control" id="in" type="date" name="checkIn" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="ou">Check-Out Date:</label>
    <div class="col-sm-10">
      <input class="form-control" id="ou" type="date" name="checkOut" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="ppl">Number of People:</label>
    <div class="col-sm-10">
      <input class="form-control" id="ppl" type="number" name="numOfPeople" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="rm">Room Type:</label>
    <div class="col-sm-10">
      <input class="form-control" id="rm" type="text" name="roomType" list="room" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="phone">Phone Number:</label>
    <div class="col-sm-10">
      <input class="form-control" id="phone" type="tel" name="phone" required />
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="email">Email Address:</label>
    <div class="col-sm-10">
      <input class="form-control" id="email" type="email" name="email" placeholder="xx@domain.com" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="pm">Payment Method:</label>
    <div class="col-sm-10">
      <input class="form-control" id="pm" type="text" name="Payment" list="card" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="cc">Credit Card Number:</label>
    <div class="col-sm-10">
      <input class="form-control" id="cc" type="text" placeholder="#### #### #### ####"
        pattern="\d{4} +\d{4} +\d{4} +\d{4}" name="cardNum" required />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="sr">Special Requests:</label>
    <div class="col-sm-10">
      <input class="form-control" id="sr" type="text" name="request" placeholder=" Enter Your Request Here"
        style="width:100%; height: 200px;" />
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <input class="btn btn-primary" type="submit" value="Reserve a room" id="ButtonSubmit">
      <input class="btn btn-secondary" type="reset" value="Clear" id="ButtonReset">
    </div>

    <datalist id="room">
      <option value="King" name="King"> King </option>
      <option value="Queen" name="Queen"> Queen </option>
      <option value="Suite" name="Suite"> Suite </option>
    </datalist>
    <datalist id="card">
      <option value="MasterCard"> MasterCard </option>
      <option value="Visa"> Visa </option>
      <option value="AMEX"> AMEX </option>
      <option value="Discover"> Discover </option>
    </datalist>

</form>
</div>
<?php include 'view/footer.php'; ?>