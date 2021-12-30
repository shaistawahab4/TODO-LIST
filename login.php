<?php
if (isset($_POST['login'])) {
    $users = array(
        array("user" => "shaista19@gmail.com", "password" => "shaista19", "name" => "shaista"), array("user" => "zulekha12@gmail.com", "password" => "zulekha12", "name" => "zulekha"),

    );

    $user_email = $_POST['user-email'];
    $user_password = $_POST['user-password'];


    foreach ($users as  $user) {
        if ($user['user'] == $user_email && $user['password'] == $user_password) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: home.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php include_once('navbar.php') ?>

    <div class="d-flex justify-content-center mt-5">

        <form action="" method="post">
            <div class="container" >
                <br>
                <label"><b>Username</label> 
                <br>
                <input mtype="email" name="user-email" required>
            <div>
                <br>
                <label>Password</label> <br>
                <input type="password" name="user-password" required>
            </div>
            <Center> <input type="submit" name='login' value='LOGIN' class="btn btn-outline-primary mt-3 btn-block">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>