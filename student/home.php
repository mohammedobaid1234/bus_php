<?php
include '../include/slidebar.php';
$id = $_SESSION['id'];
$qry = "SELECT * FROM groups  RIGHT JOIN drivers ON groups.driver_id = drivers.id  WHERE groups.id in  (SELECT  group_id FROM group_studuents	 where std_id = $id)";
$result=mysqli_query($conn,$qry);
$bus_num = '';
if(mysqli_num_rows($result) > 0)
{
    $row=mysqli_fetch_assoc($result);
    $bus_num = $row['bus_no'];

}
if (isset($_POST['submit'])){
    global $conn;
    session_start();
    include("../include/connection.php");
    $presence = $_POST['presence'];
    $id = $_SESSION['id'];
    $query = "UPDATE students SET presence = $presence WHERE id = $id";
    mysqli_query($conn, $query);
    $_SESSION['presence']=$_POST['presence'];
}

?>


    <img src="../assets/imgs/logo.png" alt="">
    <h1 class="p-relative"><?php if(isset($bus_num) && $bus_num){echo 'Bus Number:' . $bus_num;} ?></h1>
    <div class="settings-page m-20">

        <!-- Start Settings Box -->
        <div class="Widgets-control p-20 bg-white rad-10">
                <span>Will you be able to come tomorrow?</span>
            <form method="post">
                  <input class="check" type="radio"  name="presence"
                        <?php if($_SESSION['presence'] == 2) echo 'checked' ; ?>
                         value="2">
                  <label for="html">Absence</label><br> <br>
                  <input class="check" type="radio"  name="presence"
                        <?php if($_SESSION['presence'] == 1) echo 'checked' ; ?>
                         value="1">
                  <label for="css">Presence</label><br>
                        <div class="control d-flex align-center mb-15">
                            <input  type="submit" name="submit" >
                        </div>
            </form>

        </div>



<?php
include '../include/footer.php'
?>
        <script>
            $('input[type="radio"]').on('change',function (){
                $('input[type="radio"]').removeAttr('checked');
                $(this).attr('checked', 'checked');
            })
        </script>

