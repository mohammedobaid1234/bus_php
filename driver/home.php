<?php
include '../include/slidebar.php';
global $conn;

$id = $_SESSION['id'];
$qry = "SELECT students.name as std_name, presence FROM students  JOIN group_studuents ON students.id = group_studuents.std_id where group_studuents.group_id = (SELECT id FROM groups where driver_id = $id)";
$result=mysqli_query($conn,$qry);
?>

<img src="../assets/imgs/logo.png" alt="">
<!-- Start Project Table -->
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">Main Page</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
            <tr>
                <td>Student's Name</td>
                <td>Student's Status</td>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)){?>
                <tr <?php if($row['presence'] != 1) echo 'style="color: red;"';?>>
                    <td><?php echo $row['std_name']?></td>
                    <td><?php if($row['presence'] == 1){echo  'Present';}else{echo 'Absent';}?> </td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>

<?php
include '../include/footer.php'
?>