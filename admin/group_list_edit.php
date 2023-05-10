<?php
global $conn;
include '../include/slidebar.php';
$group_id = $_REQUEST['id'];
$qry = "SELECT * FROM drivers where id not in (SELECT driver_id FROM groups where id not in ($group_id))";
$drivers=mysqli_query($conn,$qry);
$stdSql = "SELECT *  FROM students where id not in (SELECT std_id FROM group_studuents where group_id not in ($group_id))";
$students=mysqli_query($conn,$stdSql);
if($_SESSION['role'] == 'admin'){
    $id = $_SESSION['id'];
    $qry = "SELECT *, drivers.id as driver_id,groups.city as group_city, groups.name as group_name  from groups join drivers on (drivers.id = groups.driver_id) where groups.id = $group_id";
    $result=mysqli_query($conn,$qry);
    if (isset($_POST['submit'])) {
        $qry="select * from groups where id ='".$group_id."'";
        $result=mysqli_query($conn,$qry);
        $id = $group_id;
        $name = $_POST['name'];
        $bus_no = $_POST['bus_no'];
        $city = $_POST['city'];
        $driver_id = $_POST['driver_id'];
        $driver = "UPDATE drivers SET bus_no='$bus_no' WHERE id = $driver_id";

        $driver=mysqli_query($conn,$driver);

        $groupSql = "UPDATE groups SET name='$name', city='$city', driver_id='$driver_id' where  id = '$group_id'";
        if (mysqli_query($conn,$groupSql)) {

                $deleteSql =mysqli_query($conn, "DELETE FROM group_studuents where group_id = '$group_id'");
            foreach ($_POST['students'] as $std){
                $sql = "INSERT INTO group_studuents (std_id, group_id) VALUES ('$std', '$group_id')";
                if (mysqli_query($conn, $sql)) {

                } else {
                    print_r(mysqli_error($conn));
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        ?>
        <script>
            window.location = 'http://localhost/students/admin/group_lists.php';
        </script>
        <?php
    }

}
?>

<img src="imgs/logo.png" alt="">
<!-- Start Project Table -->
<?php while ($row = mysqli_fetch_assoc($result)){
    $driver_id = $row['driver_id'];
    $students_group = array();
    $id = $row['id_group'];
// $qry2 = "SELECT name, groups.city, students.id as std FROM students LEFT JOIN group_studuents ON group_studuents.std_id = students.id where group_id = $id";
    $qry3 = "SELECT *  FROM students where id in (SELECT std_id FROM group_studuents where group_id = $group_id)";
    $result2=mysqli_query($conn,$qry3);
    while ($row1 = mysqli_fetch_assoc($result2)){
        $students_group[] = $row1['id'];
    }


    ?>
    <div class="content w-full" style="margin-left: 25%;">
        <div class="wrapper d-grid gap-20">
            <!-- Start Quick Draft Widgt -->
            <div class="quick-draft p-20 bg-white rad-10">
                <h2 class="mt-0 mt-10">Create Group</h2>
                <p class="mt-0 mb-20 c-grey fs-15">Fill in the following data</p>
                <form method="post">
                    <label for="">Bus Number:</label>
                    <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" required type="number" value="<?php echo $row['bus_no'];?>" name="bus_no" placeholder="Enter the Bus Number">

                    <label for="">Group Description:</label>
                    <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" required type="text" value="<?php echo $row['group_name'];?>" name="name" placeholder="Enter the group name">


                    <label for="">City:</label>
                    <select class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="city">
                        <option value="Al Majmaah City" <?php if($row['group_city'] == 'Al Majmaah City'){echo 'selected';} ?>>Al Majmaah City</option>
                        <option value="Zulfi city" <?php if($row['group_city'] == 'Zulfi city'){echo 'selected';} ?>>Zulfi city</option>
                        <option value="Al-Ghat City" <?php if($row['group_city'] == 'Al-Ghat City'){echo 'selected';} ?>>Al-Ghat City</option>
                        <option value="Hotat Sudair City" <?php if($row['group_city'] == 'Hotat Sudair City'){echo 'selected';} ?>>Hotat Sudair City</option>
                        <option value="Artawiyah City" <?php if($row['group_city'] == 'Artawiyah City'){echo 'selected';} ?>>Artawiyah City</option>
                        <option value="Tamir City" <?php if($row['group_city'] == 'Tamir City'){echo 'selected';} ?>>Tamir City</option>
                        <option value="Jalajil City" <?php if($row['group_city'] == 'Jalajil City'){echo 'selected';} ?>>Jalajil City</option>
                    </select>

                    <label for="">Driver Name:</label>
                    <select class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="driver_id">
                        <?php while ($row = mysqli_fetch_assoc($drivers)){ ?>
                            <option value="<?php echo $row['id']?>" <?php if($driver_id == $row['id']){echo  'selected';} ?>><?php echo $row['name']?></option>
                        <?php } ?>
                    </select> <label for="">Students Name:</label>
                    <select class="js-example-basic-multiple d-block mb-20 w-full  b-none bg-eee rad-6 " id="stds"  name="students[]" multiple="multiple">
                        <?php while ($row = mysqli_fetch_assoc($students)){ ?>
                            <option value="<?php echo $row['id']?>" <?php if(in_array($row['id'],$students_group)){echo 'selected';} ?>"><?php echo $row['name']?></option>
                        <?php } ?>
                    </select>

                    <input style="cursor: pointer; width: 20%; height: 35px;" class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" name="submit" value="create">
                </form>
            </div>
            <!-- End Quick Draft Widgt -->
        </div>
    </div>

<?php }?>
<!-- End Project Table -->
<?php
include '../include/footer.php'
?>

<script>
    setTimeout(()=>{
        $('.js-example-basic-multiple').select2();
    },1000)
    setTimeout(()=>{
        var list = ['<?=implode("', '", $students_group)?>'];
            $('#stds').val(list).trigger('change');


    },1000)
</script>
