<?php

if (isset($_POST['submit'])){
    global $conn;
    session_start();

    include("../include/connection.php");
    $std_id = $_POST['std_id'];
    echo "$std_id ";

    $password = $_POST['password'];

    if($std_id=="")
    {
        $_SESSION['msg']="1";
        header( "Location:./index.php");
        exit;
    }
    else if($password=="")
    {
        $_SESSION['msg']="2";
        header( "Location:./index.php");
        exit;
    }
    else
    {
        $qry="select * from drivers where job_id ='".$std_id."' and password='".$password."'";
        $result=mysqli_query($conn,$qry);
        if(mysqli_num_rows($result) > 0)
        {
            $row=mysqli_fetch_assoc($result);
            $_SESSION['id']=$row['id'];
            $_SESSION['name']=$row['name'];
            $_SESSION['role']='driver';
            header( "Location:./home.php");
            exit;
        }else{
            $_SESSION['msg']="4";
            header( "Location:./index.php");
            exit;
        }


    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin & Drivers Login</title>
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
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="../assets/assetsForLogin/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" >
					<span class="login100-form-title">
						Admin & Drivers Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="number" name="std_id" placeholder="Job ID" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="submit">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="Forgot Password.html">
                        Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="../Sign Up/index.html">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
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

</body>
</html>