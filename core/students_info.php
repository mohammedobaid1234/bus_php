<?php
global $conn;
include '../include/slidebar.php';
if($_SESSION['role'] == 'driver'){
    $id = $_SESSION['id'];
    $qry = "SELECT * , students.id as std FROM students LEFT JOIN group_studuents ON students.id = group_studuents.std_id where group_studuents.group_id = (SELECT id FROM groups where driver_id = $id)";
    $result=mysqli_query($conn,$qry);
}
if($_SESSION['role'] == 'admin'){
    $id = $_SESSION['id'];
    $qry = "SELECT * , students.id as std  FROM students where status != '1'";
    $result=mysqli_query($conn,$qry);

    if (isset($_POST['submit'])) {
        $id= $_POST['id'];
        $q = "DELETE from students WHERE id = '$id'";
        mysqli_query($conn, $q);

    }
}
?>
<img src="imgs/logo.png" alt="">
<!-- Start Project Table -->
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">Students Informations</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
            <tr>
                <td>Student's Name</td>
                <td>Student's ID</td>
                <td>Email</td>
                <td>Collega</td>
                <td>City</td>
                <td>Neighborhood</td>
                <td>Mobile number</td>
                <td>relative's phone number</td>
                <td>Kinship Relationship</td>
                <td>Blood Group Type</td>
                <?php
                    if($_SESSION['role'] == 'admin')
                        echo '<td>Options</td>'
                ?>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)){?>

            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['std']?></td>
                <td><?php echo $row['email']?></td>
                <td>Computer& information Science</td>
                <td> <?php echo $row['city']?></td>
                <td><?php echo $row['neighborhood']?></td>
                <td><?php echo $row['mobile_no']?></td>
                <td><?php echo $row['relatives_mobile_no']?></td>
                <td><?php echo $row['kinship_relationship']?></td>
                <td class="Blood"><?php echo $row['blood_type']?></td>
                <?php
                    if($_SESSION['role'] == 'admin')
                {
                        $std = $row['std'];
                       echo ' <td><img style="cursor: pointer;" id="cancel" src="../assets/imgs/cancel.png" alt="" data-action="cancel" data-id='. $std . '</td>';
                }
                ?>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>


<?php
include '../include/footer.php'
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script !src="">
    setTimeout(()=>{
        $('img#cancel').on('click', function (){
            $this = $(this);
            if($(this).data('action') == 'cancel'){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var action = $(this).data('action');
                        id = $(this).data('id');
                        data = {
                            action : $(this).data('action').toString(),
                            id : id.toString(),
                            submit: "true"
                        };
                        console.log(data);
                        $.post('', data, function (){
                            $this.closest('.card').remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        });

                    }
                })


            }
        })
    },1000)

</script>


