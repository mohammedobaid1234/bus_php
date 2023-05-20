<?php

if (isset($_POST['submit'])){
    if($_POST['password'] != $_POST['confirm-password']){
        $_SESSION['msg']="password and confirm password not matched";

    }else{
        global $conn;
        session_start();
        include("../include/connection.php");
        $std_id = $_POST['std_id'];
        $qry="select * from students where id ='".$std_id."' and status='1'";
        $result=mysqli_query($conn,$qry);
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['msg']="This User Already Exist";
    //        exit;
    //        exit;
        }else{
            $name = addslashes($_POST['name']);
            $std_id = $_POST['std_id'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $neighborhood = $_POST['neighborhood'];
            $mobile_no = $_POST['mobile_no'];
            $relatives_mobile_no = $_POST['relatives_mobile_no'];
            $kinship_relationship = $_POST['kinship_relationship'];
            $blood_type = $_POST['blood_type'];
            $password = $_POST['password'];
            $specialization = $_POST['specialization'];
            $status = 1;
            $query = "INSERT INTO students (name, id, email, city, neighborhood, mobile_no, relatives_mobile_no,kinship_relationship,blood_type,password,status, specialization)
                        VALUES ('$name','$std_id','$email','$city','$neighborhood','$mobile_no','$relatives_mobile_no','$kinship_relationship','$blood_type','$password',1, '$specialization')";
            mysqli_query($conn, $query);
             header( "Location:../index.php");
    
            ?>
            <script>
               openModal();
            </script>
        <?php
    
       }
    }




}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Sign Up</title>

    <!-- Icons font CSS-->
    <link href="../assets/assetsForRegister/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../assets/assetsForRegister/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../assets/assetsForRegister/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../assets/assetsForRegister/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/assetsForRegister/css/main.css" rel="stylesheet" media="all">
</head>

<body>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <?php
                if(isset($_SESSION["msg"]) && $_SESSION["msg"] != '') {

                $error = $_SESSION["msg"] ;
                $_SESSION["msg"] = '';
                echo  "<div role='alert' class='alert-danger w-50 m-auto text-center' style='background:red;'>$error</div> ";
                unset($_SESSION["msg"]);

                }?>
                <h2 class="title">Sign Up</h2>
                <form method="POST">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Enter your name</label>
                                <input class="input--style-4" name="name" type="text" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Enter your ID number</label>
                                <input class="input--style-4" name="std_id" type="number" placeholder="Enter your ID number" required>
                            </div>
                        </div>
                    </div>


                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Enter your email</label>
                                <input class="input--style-4" name="email" type="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Enter the city</label>
                                <input class="input--style-4" name="city" type="text" placeholder="Enter the city" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Enter the neighborhood</label>
                                <input class="input--style-4" name="neighborhood" type="text" placeholder="Enter the neighborhood" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Enter the mobile number</label>
                                <input class="input--style-4" name="mobile_no" type="phone" placeholder="Enter the mobile number" minlength="10" maxlength="10"  pattern="\d{10}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Enter a relative's phone number</label>
                                <input class="input--style-4" name="relatives_mobile_no"  type="phone" placeholder="Enter a relative's phone number" minlength="10" maxlength="10"  pattern="\d{10}"  required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Kinship Relationship</label>
                                <input class="input--style-4"  name="kinship_relationship" type="text" placeholder="Kinship Relationship" required>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="">
                                <label class="label" style="display:block">Blood Group Type</label>
                                <select name="blood_type" class="input--style-4 form-control" type="text" placeholder="Blood Group Type" required>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>

                                <!-- <input name="blood_type" class="input--style-4" type="text" placeholder="Blood Group Type" required> -->
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">password</label>
                                <input name="password" class="input--style-4" type="password" placeholder="password" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">confirm password</label>
                                <input name="confirm-password" id="confirm-password" class="input--style-4" type="password" placeholder="password" required>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Specialization</label>
                                    <input name="specialization" class="input--style-4" type="text" placeholder="specialization" required>
                                </div>
                            </div>

                        </div>

                        <div class="col-2">
                            <div class="input-group" style="display: flex; align-items: center;">
                                <input style="width: 30px;" type="checkbox" required>
                                <span style="margin-left: 13px;">I agree to participate in the university transfer membership</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" name="submit">Send</button>
<!--                        <button onclick="openModal()" class="btn btn--radius-2 btn--blue" type="send">Send</button>-->
                    </div>

                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <p> Your request has been  successfully sent</p>
                            <button class="btn2" onclick="redirectToPage()"><a href="./index.php">LOG IN </a></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<style>

    a{
        text-decoration: none;
        color: #000;
    }
    .btn2
    {
        padding: 1.3em 3em;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
    }

    .btn2:hover{
        background-color: #23c483;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        transform: translateY(-7px);
    }

    .btn2:hover a{
        color: white;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-content p{
        font-size: 20px;
        margin-left: 30%;
    }

    .modal-content button{
        margin-left: 44%;
        margin-top: 20px;
    }

</style>

<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
        document.body.style.backgroundColor = "white";
    }

    function redirectToPage() {
        window.location.href = "";
    }

</script>

<!-- Jquery JS-->
<script src="../assets/assetsForRegister/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="../assets/assetsForRegister/vendor/select2/select2.min.js"></script>
<script src="../assets/assetsForRegister/vendor/datepicker/moment.min.js"></script>
<script src="../assets/assetsForRegister/vendor/datepicker/daterangepicker.js"></script>


<!-- Main JS-->
<script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->