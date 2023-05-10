<?php
global $conn;
include '../include/slidebar.php';
if($_SESSION['role'] == 'admin'){

    if (isset($_POST['submit'])) {
        $driver_id = $_POST['driver_id'];
        $bus_no = $_POST['bus_no'];
        $city = $_POST['city'];
        $students[] = $_POST['students'];
        $name = $_POST['name'];
        $driver = "UPDATE drivers SET bus_no='$bus_no' WHERE id = $driver_id";
        $driver=mysqli_query($conn,$driver);

        $groupSql = "INSERT INTO groups (name, driver_id, city) VALUES ('$name', '$driver_id', '$city')";
        if (mysqli_query($conn,$groupSql)) {
            $group_id =  mysqli_insert_id($conn);
        }

        foreach ($_POST['students'] as $std){
            $sql = "INSERT INTO group_studuents (std_id, group_id) VALUES ('$std', '$group_id')";
            if (mysqli_query($conn, $sql)) {

            } else {
                print_r(mysqli_error($conn));
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

    }
    $id = $_SESSION['id'];
    $qry = "SELECT * FROM drivers where id not in (SELECT driver_id FROM groups)";
    $drivers=mysqli_query($conn,$qry);
    $stdSql = "SELECT *  FROM students where id not in (SELECT std_id FROM group_studuents)";
    $students=mysqli_query($conn,$stdSql);

}
?>
<img src="../assets/imgs/logo.png" alt="">
<div class="content w-full" style="margin-left: 25%;">
    <div class="wrapper d-grid gap-20">
        <!-- Start Quick Draft Widgt -->
        <div class="quick-draft p-20 bg-white rad-10">
            <h2 class="mt-0 mt-10">Create Group</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Fill in the following data</p>
            <form method="post">
                <label for="">Bus Number:</label>
                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" required type="number" name="bus_no" placeholder="Enter the Bus Number">

                <label for="">Group Description:</label>
                <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" required type="text" name="name" placeholder="Enter the group name">

                <label for="">City:</label>
                <select class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="city">
                    <option value="Al Majmaah City">Al Majmaah City</option>
                    <option value="Zulfi city">Zulfi city</option>
                    <option value="Al-Ghat City">Al-Ghat City</option>
                    <option value="Hotat Sudair City">Hotat Sudair City</option>
                    <option value="Artawiyah City">Artawiyah City</option>
                    <option value="Tamir City">Tamir City</option>
                    <option value="Jalajil City<">Jalajil City</option>
                </select>

                <label for="">Driver Name:</label>
                <select class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="driver_id">
                    <?php while ($row = mysqli_fetch_assoc($drivers)){ ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php } ?>
                </select> <label for="">Students Name:</label>
                <select class="js-example-basic-multiple d-block mb-20 w-full  b-none bg-eee rad-6 "  name="students[]" multiple="multiple">
                    <?php while ($row = mysqli_fetch_assoc($students)){ ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php } ?>
                </select>

                <!-- Start Project Table -->
<!--                <div class="projects p-20 bg-white rad-10 m-20">-->
<!--                    <h2 class="mt-0 mb-20">Student List</h2>-->
<!--                    <div class="responsive-table">-->
<!--                        <table class="fs-15 w-full">-->
<!--                            <thead>-->
<!--                            <tr style="width: 50px;">-->
<!--                                <td>Student's Name</td>-->
<!--                                <td>Student's Name</td>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                                --><?php //while ($row = mysqli_fetch_assoc($students)){ ?>
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            <input name="students" class="check" value="--><?php //echo  $row['id']?><!--" type="radio">-->
<!--                                            <span style="display: inline-block" >--><?php //echo  $row['name']?><!--</span>-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <input class="check" type="radio">-->
<!--                                            <span></span>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                --><?php //}?>
<!---->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- End Project Table -->
                <input style="cursor: pointer; width: 20%; height: 35px;" class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" name="submit" value="create">
            </form>
        </div>
        <!-- End Quick Draft Widgt -->
    </div>
</div>

<?php
include '../include/footer.php'
?>

<script>
   setTimeout(()=>{
       $('.js-example-basic-multiple').select2();
   },1000)
</script>
