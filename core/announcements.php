<?php
global $conn;
include '../include/slidebar.php';
if($_SESSION['role'] == 'std'){
    $id = $_SESSION['id'];
    $qry = "SELECT * FROM groups  RIGHT JOIN drivers ON groups.driver_id = drivers.id  WHERE groups.id in  (SELECT  group_id FROM group_studuents	 where std_id = $id)";
    $result=mysqli_query($conn,$qry);
    if(mysqli_num_rows($result) > 0)
    {
        $row=mysqli_fetch_assoc($result);
        $driver_id = $row['id'];
        $announcements = "SELECT * FROM announcements join drivers ON announcements.driver_id = drivers.id WHERE driver_id = $driver_id";
        $result=mysqli_query($conn,$announcements);

    }
}if($_SESSION['role'] == 'admin'){
    $announcements = "SELECT * FROM announcements join drivers ON announcements.driver_id = drivers.id";
    $result=mysqli_query($conn,$announcements);
}

?>
<img src="../assets/imgs/logo.png" alt="">
<?php while ($data = mysqli_fetch_assoc($result)){ ?>
<div>
    <div class="main-ann" style="display: flex; align-items: center;">
        <img style="max-width: 50px; height: 50px;" src="../assets/imgs/testimonial1.png" alt="">
        <div style="margin-left: 5px;">
            <p><?php echo  $data['name']?> <?php if($data['bus_no'])echo ',bus number-' . $data['bus_no']?></p>
            <p style="font-size: 12px; color: #989898;"><?php
                $date=date_create($data['created_at']);
                echo date_format($date,"h:i") . "  ،  " .date_format($date,"m/d/Y")
                ?></p>
        </div>
    </div>
    <hr style="width: 50%; height: 7px; background-color: #3a727f; border-radius: 10px;">
    <div class="main-ann2"  style="margin-top: 2%; text-align: center; text-transform:capitalize;">
        <span style="font-weight: bold; font-size: 14px;"><i class="fa-solid fa-triangle-exclamation" style="color: #ffd43b;"></i> <?php echo  $data['msg']?></span>
    </div>
    <br>
</div>
<?php } ?>


<?php
include '../include/footer.php'
?>

