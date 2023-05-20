<?php
include '../include/connection.php';
global $conn;
$id = $_SESSION['id'];
$qry="select * from students where id ='".$id."'";
$result=mysqli_query($conn,$qry);
$row=mysqli_fetch_assoc($result);
if($_SESSION['role'] == 'std'){
    if (isset($_POST['submit'])) {
        $std_id = $_POST['id'];
        $qry="select * from students where id ='".$std_id."'";
        $result=mysqli_query($conn,$qry);

        if(mysqli_num_rows($result) > 0 && $std_id != $id)
        {
            $_SESSION['msg']="This User Already Exist";
            exit;
        }else {
            $id = $_SESSION['id'];
            $newId = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $specialization = $_POST['specialization'];
            $neighborhood = $_POST['neighborhood'];
            $mobile_no = $_POST['mobile_no'];
            $relatives_mobile_no = $_POST['relatives_mobile_no'];
            $kinship_relationship = $_POST['kinship_relationship'];
            $blood_type = $_POST['blood_type'];
            $announcementSql = "UPDATE students SET id='$newId',name='$name', email='$email',city='$city', neighborhood = '$neighborhood' ,mobile_no ='$mobile_no'
                ,relatives_mobile_no = '$relatives_mobile_no', kinship_relationship = '$kinship_relationship',blood_type = '$blood_type', specialization = '$specialization'
                WHERE id = '$id'";
            $announcement = mysqli_query($conn, $announcementSql);
            print_r('ddddddd');
            ?>
            <script>
                window.location = 'http://localhost/students/student/home.php';
            </script>
            <?php
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <title>Update the student's profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="5738925b-1e08-4de1-a1de-6f8bbae982c2.png" rel="icon">
    <style type="text/css">
        body{margin-top:20px;
            background-color:#f2f6fc;
            color:#69707a;
            text-align: right;
        }
        .img-account-profile {
            height: 10rem;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);

        }
        .card .card-header {
            font-weight: 500;
            background-color: #3a727f;
            color: white;
        }
        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }
        .card-header {
            text-align: left;
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }
        .form-control, .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        input{
            text-align: left;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }
        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .btn-up{
            margin-right: 90% !important;
        }


        .btn{
            background-color: #3a727f;
            border: none;
        }

        .btn:hover{
            background-color: #3a727f;
        }

        label{
            margin-top: 5px;
            padding: 5px;
        }

        @media (max-width:767px) {
            .input-2{
                margin-left: 6px !important;
            }
        }
    </style>
</head>
<body>
<?php
if(isset($_SESSION["msg"])) {
$error = $_SESSION["msg"];
echo  "<div role='alert' class='alert-danger w-50 m-auto text-center'>$error</div> ";
//session_unset('msg');
//    unset($_SESSION['msg']);
//    unset($_SESSION["msg"]);

}?>
<div class="container-xl px-4 mt-4">
    <br>
    <div class="row">

        <div class="col-xl-8" style="margin: auto;">

            <div class="card mb-4">
                <div class="card-header"> Account Details</div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3" style="text-align: left !important; display: flex; flex-wrap: wrap;">
                            <div>
                                <label  for="">Name</label>
                                <input style="width: 120%;" class="form-control" name="name" required id="inputUsername" type="text" placeholder="Enter your name" value="<?php echo  $row['name']?>">
                            </div>

                            <div class="input-2" style=" margin-left: 90px;">
                                <label  for=""> ID number</label>
                                <input style="width: 120%;" readonly class="form-control" name="id" required id="inputUsername" type="number" placeholder="Enter your ID number" value="<?php echo  $row['id']?>">
                            </div>
                        </div>

                        <div class="mb-3" style="text-align: left !important; display: flex; flex-wrap: wrap;">
                            <div>
                                <label  for="">Email</label>
                                <input style="width: 120%;" class="form-control" name="email" required id="inputUsername" type="email" placeholder="Enter your email" value="<?php echo  $row['email']?>">
                            </div>

                            <div class="input-2" style=" margin-left: 90px;">
                                <label  for="">city</label>
                                <input style="width: 120%;" class="form-control" name="city" required id="inputUsername" type="text" placeholder="Enter the city" value="<?php echo  $row['city']?>">
                            </div>
                        </div>

                        <div class="mb-3" style="text-align: left !important; display: flex; flex-wrap: wrap;">
                            <div>
                                <label  for="">Neighborhood</label>
                                <input style="width: 120%;" class="form-control" name="neighborhood" required id="inputUsername" type="text" placeholder="Enter the neighborhood" value="<?php echo  $row['neighborhood']?>">
                            </div>

                            <div class="input-2" style=" margin-left: 90px;">
                                <label  for="">Mobile number</label>
                                <input style="width: 120%;" class="form-control" name="mobile_no" required id="inputUsername" minlength="10" maxlength="10"  pattern="\d{10}" type="phone" placeholder="Enter the mobile number" value="<?php echo  $row['mobile_no']?>">
                            </div>
                        </div>

                        <div class="mb-3" style="text-align: left !important; display: flex; flex-wrap: wrap;">
                            <div>
                                <label  for="">Relative's phone number</label>
                                <input style="width: 120%;" class="form-control" name="relatives_mobile_no" required id="inputUsername"  minlength="10" maxlength="10"  pattern="\d{10}" type="phone" placeholder="Enter a relative's phone number" value="<?php echo  $row['relatives_mobile_no']?>">
                            </div>

                            <div class="input-2" style=" margin-left: 90px;">
                                <label  for="">Kinship Relationship</label>
                                <input style="width: 120%;" class="form-control" name="kinship_relationship" required id="inputUsername" type="text" placeholder="Kinship Relationship" value="<?php echo  $row['kinship_relationship']?>">
                            </div>
                        </div>

                        <div class="mb-3" style="text-align: left !important; display: flex; flex-wrap: wrap;">
                            <div>
                                <label  for="">Blood  Type</label>
                                <!-- <input style="width: 120%;" class="form-control" name="blood_type" required id="inputUsername" type="text" placeholder=" Enter Blood Type" value="<?php echo  $row['blood_type']?>"> -->
                                <select name="blood_type" class="form-control" style="width: 240px;"type="text" placeholder="Blood Group Type" required>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="input-2" style=" margin-left: 90px;">
                                <label  for="">specialization</label>
                                <input style="width: 120%;" class="form-control" name="specialization" required id="inputUsername" type="text" placeholder="specialization" value="<?php echo  $row['specialization']?>">
                            </div>
                        </div>

                        <input class="btn btn-primary btn-up" type="submit" value="Update" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>