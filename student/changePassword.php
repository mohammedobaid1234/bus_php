<?php
session_start();

if(isset($_SESSION['verified'])) {

    if (isset($_POST['submit'])) {
        include("../include/connection.php");
        global $conn;
        if(isset($_POST['newPass'])){
            $user_id = $_SESSION['user_id'];
            $pass = $_POST['newPass'];

            $qry = "UPDATE students SET password='$pass' where  id = '$user_id'";
            $result=mysqli_query($conn,$qry);
            ?>
            <script>
            setTimeout(()=>{
                toastr.success('Code sent Successfully.', {timeOut: 5000})
                    },1000);
                // window.location.href="http://localhost/students/student/";

            </script>
            <?php
            header( "Location:./index.php");

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enter Your Code</title>
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

                <div class="wrap-input100 validate-input" >
                    <input class="input100" name="newPass" type="text" placeholder="New Password" required>
<!--                    <br>-->
<!--                    <input class="input100" name="confirmPass" type="text" placeholder="Code" required>-->
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    // Set the options that I want
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    function showTosterFail(){
        toastr.error("Failed, The Code Not True");

    }
</script>
<?php }?>
