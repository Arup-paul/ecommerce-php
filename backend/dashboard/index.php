<?php


// $data = [
//     'username' => 'Arup',
//     'password' => '1234'
// ];

// $string = [];
//     foreach($data as $key => $value){
//       $string[] = "'{$key}' = '{$value}'";
//     }
//     $strings = implode(',',$string);
   
//     echo $strings;
//     die();


// session_start();
// require_once '../../app/Database.php';
// $messages = [];

// if (isset($_POST['login'])) {
//     $email = trim($_POST['email']);
//     $password = trim($_POST['password']);

//     $result = $connection->select('users', 'id, email, password', [
//         'email' => $email,
//     ]);
//     $result->execute();

//     if ($result->rowCount() === 1) {
//         $data = $result->fetch();
//         if (password_verify($password, $data['password'])) {
//             $messages['success'] = 'Logged in';
//             $_SESSION['logged_in'] = true;
//             $_SESSION['email'] = $data['email'];
//             $_SESSION['id'] = $data['id'];

//             header('Location: dashboard.php');
//         } else {
//             $messages['warning'] = 'User and password does not match';
//         }
//     } else {
//         $messages['warning'] = 'User not found';
//     }
// }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PHP Ecommerce Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/login.css" rel="stylesheet">
</head>

<body>

<form class="form-signin" action="" method="post">
    <?php include_once '../partials/message.php'; ?>

    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">PHP Ecommerce Admin Panel</h1>
    </div>

    <div class="form-label-group">
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
 
       <a href="register.php" class="btn btn-lg btn-primary btn-block">Create an Account</a>
    
       <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
</form>
   

</body>
</html>
