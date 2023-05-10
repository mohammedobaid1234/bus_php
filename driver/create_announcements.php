<?php
include '../include/slidebar.php';
global $conn;
if($_SESSION['role'] == 'driver'){
    if (isset($_POST['submit'])) {
        $id = $_SESSION['id'];
        $title = $_POST['title'];
        $msg = $_POST['msg'];
        $announcementSql = "INSERT INTO announcements (title, msg,driver_id) VALUES ('$title', '$msg', $id)";
        $announcement=mysqli_query($conn,$announcementSql);
    }
}
?>
<img src="../assets/imgs/logo.png" alt="">
<div class="content w-full" style="margin-left: 25%;">
    <div class="wrapper d-grid gap-20">
        <!-- Start Quick Draft Widgt -->
        <div class="quick-draft p-20 bg-white rad-10">
            <h2 class="mt-0 mt-10">Announcements</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Fill in the following data</p>
            <form method="post">
                <label for="">Title:</label>
                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" required type="text" name="title" placeholder="Enter the title of the message">

                <label for="">Message:</label>
                <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="msg" placeholder="Enter the text of the message"></textarea>
                <input style="cursor: pointer; width: 20%; height: 35px;" class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" name="submit">

            </form>
        </div>
        <!-- End Quick Draft Widgt -->
    </div>
</div>
<?php
include '../include/footer.php'
?>

