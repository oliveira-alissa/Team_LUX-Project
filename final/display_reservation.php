<?php
include 'DB_test.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
$email = isset($_GET['email']) ? $_GET['email'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
?>
<?php include 'view/header.php'; ?>
<form class="register" action="#" method="post">

    <div class="container">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($email); ?>"
            required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" class="buttonLogin">Register</button>
    </div>

</form>
<?php include 'view/footer.php'; ?>