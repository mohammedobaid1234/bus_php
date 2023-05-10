<?php
include '../include/connection.php';

global $conn;
$id = $_SESSION['id'];
$qry="select * from admins where id ='".$id."'";
$result=mysqli_query($conn,$qry);
$row=mysqli_fetch_assoc($result);
if($_SESSION['role'] == 'admin'){
    if (isset($_POST['submit'])) {
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile_no = $_POST['mobile_no'];
        $announcementSql = "UPDATE admins SET name='$name', email='$email', mobile_no ='$mobile_no' WHERE id = '$id'";
        $announcement=mysqli_query($conn,$announcementSql);
    ?>
        <script>
            window.location = 'http://localhost/students/admin/home.php';
        </script>
<?php
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <title>Update the profile of the admin</title>
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
    </style>
</head>
<body>
<div class="container-xl px-4 mt-4">
    <br>
    <div class="row">

        <div class="col-xl-8" style="margin: auto;">

            <div class="card mb-4">
                <div class="card-header"> Account Details</div> <p>
                <div class="card-body">
                    <form method="post">

                        <div class="mb-3" style="text-align:left  !important;">
                            <label  for=""> Name</label> <p>
                                <input class="form-control" id="inputUsername" name="name" required type="text" placeholder="Enter your name" value="<?php echo  $row['name']?>">
                            </p>
                        </div>

                        <div class="mb-3" style="text-align: left !important;">
                            <label  for=""> Mobile number</label> <p>
                                <input class="form-control" id="inputUsername"  name="mobile_no" required type="text" placeholder="Enter a phone number" value="<?php echo  $row['mobile_no']?>">
                            </p>
                        </div>

                        <div class="mb-3" style="text-align: left !important;">
                            <label  for=""> Email</label> <p>
                                <input class="form-control" id="inputUsername" name="email" required type="email" placeholder="Enter your email" value="<?php echo  $row['email']?>">
                            </p>
                        </div>
                        <p>
                            <input class="btn btn-primary btn-up" type="submit" value="Update" name="submit">
                        </p>
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