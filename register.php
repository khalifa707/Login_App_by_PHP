<?php
include 'database.php';

$errors= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
}


if ($password != $confirm_password) {
    $errors = "Passwords do not match";
}else{

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn,$sql);

   if (mysqli_num_rows($result) ===1) {
       $errors = "This email is already registered";
   }

//    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
//    if(mysqli_query($conn, $sql)){
//        echo "New record created successfully";
//    }else{
//        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body class="register">
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>

            <!-- When the user is logged in -->
            <li>
                <a href="admin.php">Admin</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>

            <!-- When the user is not logged in -->
            <li>
                <a href="register.php">Register</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
        </ul>
    </nav>

<div class="container">
    <div class="form-container">
        <form method="POST" action="">
            <h2>Create your Account</h2>

            <!-- Error message placeholder -->
            <?php if($errors): ?>
                <p style="color:red">
                    <?php echo $errors; ?>
                </p>
            <?php endif; ?>

            <label for="username">Username:</label>
            <input placeholder="Enter your username" type="text" name="username" required aria-label="">

            <label for="email">Email:</label>
            <input placeholder="Enter your email" type="email" name="email" required aria-label="">

            <label for="password">Password:</label>
            <input placeholder="Enter your password" type="password" name="password" required aria-label="">

            <label for="confirm_password">Confirm Password:</label>
            <input placeholder="Confirm your password" type="password" name="confirm_password" required aria-label="">

            <input type="submit" value="Register">
        </form>
    </div>
</div>

</body>
</html>

