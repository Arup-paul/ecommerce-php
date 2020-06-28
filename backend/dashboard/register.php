<?php

session_start();
require_once '../../app/Database.php';
$message = [];

if ( isset( $_POST['register'] ) ) {
    $email         = trim( $_POST['email'] );
    $password      = trim( $_POST['password'] );
    $username      = trim( $_POST['username'] );
    $mobile_number = trim( $_POST['mobile_number'] );

    $result = $connection->insert( 'users', [
        'email' => $email,
        'password' => password_hash( $password, PASSWORD_BCRYPT ),
        'username' => $username,
        'mobile_number' => $mobile_number,
    ] );

    if ( $result ) {
        $message['success'] = 'Registration succefully';
    }

}

// session_start();
// require_once '../../app/Database.php';
// require_once '../../vendor/autoload.php';
// $messages = [];

// if (isset($_POST['register'])) {
//     $email = trim($_POST['email']);
//     $password = trim($_POST['password']);
//     $username = trim($_POST['username']);
//     $mobile_number = trim($_POST['mobile_number']);
//     $result = $connection->insert('users', [
//         'email' => $email,
//         'password' => password_hash($password, PASSWORD_BCRYPT),
//         'username' => $username,
//         'mobile_number' => $mobile_number,
//     ]);

//     if ($result) {
//         // Generate PDF
//         try {
//             $mpdf = new \Mpdf\Mpdf();
//         } catch (\Mpdf\MpdfException $e) {
//         }

//         ob_start();
//         echo '<h1>Your account is created</h1>';
//         echo '<p>Email: '.$email.'</p>';
//         echo '<p>Username: '.$username.'</p>';
//         echo '<p>Mobile Number: '.$mobile_number.'</p>';
//         echo '<br/>';
//         $html = ob_get_contents();
//         ob_end_clean();

//         try {
//             $mpdf->WriteHTML(utf8_encode($html));
//         } catch (\Mpdf\MpdfException $e) {
//         }

//         try {
//             $content = $mpdf->Output('', 'S');
//         } catch (\Mpdf\MpdfException $e) {
//         }

//         $attachment = new Swift_Attachment($content, $username.'.pdf', 'application/pdf');

//         // Mail
//         $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
//             ->setUsername('da24cc67e9bb79')
//             ->setPassword('dc5778bc9b1351');

//         // Create the Mailer using your created Transport
//         $mailer = new Swift_Mailer($transport);

//         $message = (new Swift_Message('Registration successful'))
//             ->setFrom(['no-reply@php-ecommerce.sumon' => 'PHP Project System'])
//             ->setTo([$email => $username])
//             ->setBody('Your account is registered. Please visit the following link to login.')
//             ->attach($attachment);

//         $mailer->send($message);

//         $messages['success'] = 'Registration successful';
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
    <?php include_once '../partials/message.php';?>

    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">PHP Ecommerce Admin Panel</h1>
    </div>

    <div class="form-label-group">
        <input type="email" name="email" class="form-control"  required>
        <label>Email address</label>
    </div>

    <div class="form-label-group">
        <input type="password" name="password" class="form-control"  required>
        <label>Password</label>
    </div>

    <div class="form-label-group">
        <input type="text" name="username" class="form-control" ="Username" required>
        <label>Username</label>
    </div>

    <div class="form-label-group">
        <input type="text" name="mobile_number" class="form-control"  required>
        <label>Mobile Number</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
    <p>Already have an account?</p>
    <a href="index.php" class="btn btn-lg btn-primary btn-block">Login</a>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
</form>
</body>
</html>
