<?php
// get the data from the request
$First_Name = $_POST['FirstName'];
$Phone_Number = $_POST['phone'];
$Email_Adddress = $_POST['email'];
$Request = $_POST['request'];

/*$First_Name = filter_input(
  INPUT_GET,
  'FirstName'
);
$Phone_Number = filter_input(
  INPUT_GET,
  'phone'
);
$Email_Adddress = filter_input(
  INPUT_GET,
  'email'
);

$information = $First_Name;
$guest = 'guest';

// check if available
if ($First_Name === NULL) {
  $information = $Email_Adddress;
} else if ($Email_Adddress && $First_Name === NULL) {
  $information = $guest;
} else if ($Email_Adddress && $First_Name && $Phone_Number && $Request === NULL) {
  $thanks_message = 'Dear Guest, please enter your comments.';
} else {
  $information = $guest;
}

$thanks_message = 'Dear ' . $information . ', thank you for your comments';
*/
$information = $First_Name;

if (empty($First_Name)) {
  if (!empty($Email_Adddress)) {
    $information = $Email_Adddress;
  } else {
    $information = 'guest';
  }
}

if (empty($Phone_Number) && empty($Email_Adddress) && empty($First_Name) && empty($Request)) {
  $thanks_message = 'Dear Guest, please enter your comments.';
} else {
  $thanks_message = 'Dear ' . $information . ', thank you for your comments';
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reservation</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container"></div>
  <h1 class="team_name"> LUX Beach Resort </h1>

  <nav class="navbar navbar-expand-md navbar-dark bg-navbar ">
    <!-- Brand -->
    <a class="navbar-brand">
      <img src="pool.jpg" alt="logo" style="width: 60px;">
    </a>

    <!-- Toggler/collapsible Button -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
      aria-controls="navbarToggleExternalContent" aria-controls="collapsibleNavbar" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="yurts.html">Yurts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="activities.html">Activities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reservation.html">Reservation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comments.html">Comments</a>
        </li>
      </ul>
    </div>

  </nav>
  <!-- ******** End of Nav bar ******** -->
  <main>
    <h1>
      <span>
        <?php echo $thanks_message; ?>
      </span><br>
    </h1>
  </main>
</body>

</html>