<?php include 'connection.php';?>
<?php include 'sessions.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/framework.css">
    <link rel="stylesheet" href="../assets/css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
    <title>Main Page</title>
</head>
<body>
    <!-- الكونتينر الي حاوي الصفحة كلها -->
<div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
        <h3 class="p-relative txt-c mt-0">Pass Bus</h3>
        <ul>
            <li>
                <a class="<?php if($activePage == 'home') echo 'active '  ?> d-flex align-center fs-14 c-black rad-6 p-10"
                   onclick="menuToggle();"
                   href=<?php
                   if($_SESSION['role']=='std'){
                    echo "../student/home.php";
                   }elseif ($_SESSION['role']=='admin'){
                       echo  "../admin/home.php";
                   } elseif ($_SESSION['role']=='driver'){
                       echo  "../driver/home.php";
                   }
                   ?>>
                    <i class="fa-solid fa-chart-bar fa-fw"></i>
                    <span>Main Page</span>
                </a>
            </li>

            <li>
                <a class="<?php if($activePage == 'announcements') echo 'active '  ?>d-flex align-center fs-14 c-black rad-6 p-10" onclick="menuToggle();" href="

                    <?php if($_SESSION['role']=='admin' || $_SESSION['role']=='std'){echo ' ../core/announcements.php'; }else{echo '../driver/create_announcements.php';}?>

                ">
                    <i class="fa-solid fa-bell"></i>
                    <span>Announcements</span>
                </a>
            </li>

            <?php if($_SESSION['role']=='admin' || $_SESSION['role']=='driver'){?>
            <li>
                <a class="<?php if($activePage == 'students_info') echo 'active '  ?>d-flex align-center fs-14 c-black rad-6 p-10" href="../core/students_info.php">
                    <i class="fa-regular fa-circle-user fa-fw"></i>
                    <span style="font-size: 12px; font-weight: bold;">Students Informations</span>
                </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['role']!=='driver'){?>

            <li>
                <a class="<?php if($activePage == 'drivers_info') echo 'active '  ?>d-flex align-center fs-14 c-black rad-6 p-10" href="../core/drivers_info.php">
                    <i class="fa-regular fa-user fa-fw"></i>
                    <span>Driver Information</span>
                </a>
            </li>
            <?php }?>
            <?php if($_SESSION['role']=='admin'){?>

            <li>
                <a class="<?php if($activePage == 'create_group') echo 'active '  ?>d-flex align-center fs-14 c-black rad-6 p-10" href="../admin/create_group.php">
                    <i class="fa-solid fa-square-plus"></i>
                    <span>Create Group</span>
                </a>
            </li>

            <li>
                <a class="<?php if($activePage == 'group_lists') echo 'active '  ?>d-flex align-center fs-14 c-black rad-6 p-10" href="../admin/group_lists.php">
                    <i class="fa-solid fa-list-ul"></i>
                    <span>Groups Lists</span>
                </a>
            </li>
            <?php } ?>

        </ul>
    </div>
    <div class="content w-full">
        <!-- Start Head -->
    <div class="head bg-white p-15 between-flex">
        <div style="color: #3a727f">Hi, <?php echo  $_SESSION['name']?></div>
        <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="../assets/imgs/user.png" alt="">
            </div>
            <div class="menu">
                <ul>
                    <li><img src="../assets/imgs/edit.png" alt=""><a href="<?php if($_SESSION['role']=='admin'){
                        echo '../admin/editProfile.php';
                        }elseif($_SESSION['role']=='std') { echo  '../student/editProfile.php';}else{ echo  '../driver/editProfile.php';} ?>">Edit Profile</a></li>
                    <li><img src="../assets/imgs/log-out.png" alt=""><a href="http://localhost/students/include/logout.php" class="log">Logout</a></li>
                </ul>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>

            function menuToggle(){
                const toggleMenu = document.querySelector('.menu');
                console.log('dddddd');
                toggleMenu.classList.toggle('active')
            }
        </script>
    </div>
    <!-- End Head -->