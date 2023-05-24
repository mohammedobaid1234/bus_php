<?php
global $conn;
include '../include/slidebar.php';
if($_SESSION['role'] == 'admin'){
    $id = $_SESSION['id'];
    $qry = "SELECT a.id as id_group, a.name as group_name, b.* FROM groups a JOIN drivers b ON a.driver_id = b.id";
    $result=mysqli_query($conn,$qry);
}
?>

<img src="imgs/logo.png" alt="">
<!-- Start Project Table -->
<?php while ($row = mysqli_fetch_assoc($result)){
$id = $row['id_group'];
// $qry2 = "SELECT name, groups.city, students.id as std FROM students LEFT JOIN group_studuents ON group_studuents.std_id = students.id where group_id = $id";
$qry3 = "SELECT name, students.id as std , group_city FROM students LEFT JOIN (SELECT group_studuents.*, groups.city as group_city FROM group_studuents left join groups on group_studuents.group_id = groups.id ) as T ON T.std_id = students.id where group_id = $id";
$result2=mysqli_query($conn,$qry3);
?>+
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20"><?php echo  $row['group_name']?>
       <a href="group_list_edit.php?id=<?php echo  $row['id_group']?>"> <img src="../assets/imgs/edit.png" style="width: 20px ;margin-left:0 " alt=""></a>
    </h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
            <tr>
                <td>Driver Name</td>
                <td>Bus Number</td>
                <td>City</td>
                <td>Students' Names</td>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td rowspan="79"><?php echo  $row['name']?></td>
                    <td rowspan="79"><?php echo  $row['bus_no']?></td>
                </tr>
            <?php
            while ($row1 = mysqli_fetch_assoc($result2)){
            ?>
                <tr>
                    <td><?php echo  $row1['group_city']?></td>
                    <td><?php echo  $row1['name']?></td>
                </tr>

            <?php }?>

            </tbody>
        </table>
    </div>
</div>
<?php }?>
<!-- End Project Table -->
<?php
include '../include/footer.php'
?>
