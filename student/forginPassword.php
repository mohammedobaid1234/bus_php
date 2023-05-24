<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['submit'])){
    include("../include/connection.php");
    global $conn;
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $qry = "SELECT * FROM students where email = '$email'";
        $result=mysqli_query($conn,$qry);

        if(mysqli_num_rows($result) > 0)
        {
            
                // Import the mailer class
                require_once './vendor/autoload.php';
                // create a new mailing object
                // print_r('dxddddddddddddddd');
                

                $mail = new PHPMailer();
                // SMTP configuration

                // $phpmailer = new PHPMailer();
                // $phpmailer->isSMTP();
                // $phpmailer->Host = 'smtp.mailtrap.io';
                // $phpmailer->SMTPAuth = true;
                // $phpmailer->Port = 2525;
                // $phpmailer->Username = 'cb7xx33e1856xxx5b25xx';
                // $phpmailer->Password = '87f63xx87d73e52xxx4xx';
                
                // $row=mysqli_fetch_assoc($result);
                // session_start();
                // $_SESSION['email_reset_id']=$row['id'];
                // $code = mt_rand(1111,9999);
                // $user_id = $row['id'];
                // $_SESSION['code'] = $code;
                // $email = $row['email'];
                // $user_name = $row['name'];
                // $_SESSION['user_id'] = $user_id;

                $phpmailer = new PHPMailer();
                $phpmailer->isSMTP();
                $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = 2525;
                $phpmailer->Username = '52e2cca36084fb';
                $phpmailer->Password = 'c5d8a22c8cede9';
                $mail->setFrom('no-reply@section.io', 'Node.js Deployment');
                $mail->addAddress('test@gmail.com', 'Me');
                // $mail->Subject = 'Thanks for using section.io Edge as a service!';
                // $mail->addAddress($email, $user_name);
                $mail->Subject = 'Code For Reset Password';
                // $mail->Body = 'Hi Mr, ' .$user_name ."\nYour Code is " . $code;
                // Our HTML setup

                // $mail->isHTML(TRUE);
                // $mail->Body = '<html>Hello johndoe, thank you for using our Node.js deployment and distribution platform. Kinldy check the document in the attachment below to review your payments plan.</html>';
                // $mail->AltBody = 'Success';
                // // adding mailing attachment for payment plan
                // $mail->addAttachment('//node/paymments.pdf', 'payments.pdf');
                // // send the thank you messange
                if(!$mail->send()){
                    echo 'Your message could not be develired, try again later';
                    echo 'Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Your message has been sent successfully.';
                }
            // $row=mysqli_fetch_assoc($result);
            // $_SESSION['email_reset_id']=$row['id'];
            // $code = mt_rand(1111,9999);
            // $user_id = $row['id'];
            // session_start();
            // $_SESSION['code'] = $code;
            // $email = $row['email'];
            // $user_name = $row['name'];
            // $_SESSION['user_id'] = $user_id;
// //            $otp = "INSERT INTO otps (user_id, msg) values ('$user_id', '$code')";
// //            $result=mysqli_query($conn,$qry);
//            try {
//             //code...
//             require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
//             require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';
//             $mail = new PHPMailer\PHPMailer\PHPMailer();
//             // Set SMTP parameters
//             $mail->isSMTP();
//             $mail->Host = 'sandbox.smtp.mailtrap.io';
//             $mail->SMTPAuth = true;
//             $mail->Port = 2525;
//             $mail->Username = '52e2cca36084fb';
//             $mail->Password = 'c5d8a22c8cede9';
//             // Set email content and recipients
//             $mail->setFrom('busSystem@example.com', 'Bus Students System');
            // $mail->addAddress($email, $user_name);
            // $mail->Subject = 'Code For Reset Password';
            // $mail->Body = 'Hi Mr, ' .$user_name ."\nYour Code is " . $code;

//            } catch (\Throwable $th) {
//             //throw $th;
//             print_r($th);
//            }
//             // Send the email
//             if ($mail->send()) {

//                 ?>
//                 <script>
//                     setTimeout(()=>{
//                         toastr.success('Code sent Successfully.', {timeOut: 5000})
//                     },1000)
//                 </script>
//                 </script>

//                 <?php
//                 header( "Location:./enterCode.php");
//                 exit;
//             } else {
//                 ?>
//                 <script>
//                     setTimeout(()=>{
//                         toastr.error('Code sent failed.', {timeOut: 5000})
//                     },1000)
//                 </script>
//                 <?php
//             }

        }
    }
    // Include PHPMailer library
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset your password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assetsForLogin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assetsForLogin/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assetsForLogin/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assetsForLogin/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/assetsForLogin/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/assetsForLogin/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100" style="display: flex; justify-content: center; width: 600px; margin-left: 15px;">

            <form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Reset your password
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" name="email" type="email" placeholder="Email" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="submit">
                        Send
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="../assets/assetsForLogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/assetsForLogin/vendor/bootstrap/js/popper.js"></script>
<script src="../assets/assetsForLogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/assetsForLogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/assetsForLogin/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="../assets/assetsForLogin/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</body>
</html>