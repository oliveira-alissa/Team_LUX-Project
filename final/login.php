<?php
session_start();

include "DB_test.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST['email'])) {
        $error = "Email is required";
    } else if (empty($_POST['password'])) {
        $error = "Password is required";
    } else {
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];

            if ($row['role'] === 'admin') {
                header("Location: admin_dashboard.php"); // Redirect to admin_dashboard.php if role is admin
                exit();
            } else {
                // Redirect to user_account.php 
                header("Location: user_account.php");
                exit();
            }
        } else {
            $error = "Incorrect email or password";
        }
    }
}
?>

<?php include 'view/header.php'; ?>

<form class="login" action="#" method="post">
    <div class="container">
        <?php if (isset($error)) { ?>
            <p class="error">
                <?php echo $error; ?>
            </p>
        <?php } ?>
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter email" name="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" class="buttonLogin">Login</button>

        <span class="text_register">Don't have an Account? <a href="register.php">Register</a></span>
    </div>
</form>

<?php include 'view/footer.php'; ?>