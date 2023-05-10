<?php
global $conn;
include '../include/slidebar.php';
if($_SESSION['role'] == 'std'){
    $id = $_SESSION['id'];
    $qry = "SELECT * FROM groups  RIGHT JOIN drivers ON groups.driver_id = drivers.id WHERE groups.id in(SELECT  group_id FROM group_studuents	 where std_id = $id)";
    $result=mysqli_query($conn,$qry);
    if(mysqli_num_rows($result) > 0)
    {
        $row=mysqli_fetch_assoc($result);

    }
}
if($_SESSION['role'] == 'admin'){
    $id = $_SESSION['id'];
    $qry = "SELECT * FROM drivers";
    $result=mysqli_query($conn,$qry);
    if (isset($_POST['submit'])) {
        $id= $_POST['id'];
        $action= $_POST['action'] == 'cancel' ? 3: 2;
        $query = "DELETE from drivers WHERE id = $id";
        mysqli_query($conn, $query);
    }
}
?>
<img src="../assets/imgs/logo.png" alt="">
<?php if($_SESSION['role'] == 'std'&& isset($row)){?>
<div class="wrapper d-grid gap-20">
    <div class="card" style="margin-left: 320px;">
        <div class="card-info">
            <img src="../assets/imgs/testimonial1.png" alt="">
            <div class="card-title" style="border: none;">Driver Name : <?php echo $row['name'] ?></div>

            <div class="card-title">Bus Number : <?php echo $row['bus_no'] ?>></div>

            <div class="card-title">Email : <?php echo $row['email'] ?></div>
            <div class="card-title">phone number : <?php echo $row['mobile_no'] ?></div>
        </div>
    </div>
</div>
<?php }elseif ($_SESSION['role'] == 'admin'){ ?>
    <div class="wrapper d-grid gap-20">

    <?php while ($row = mysqli_fetch_assoc($result)){?>
        <div class="card">
            <div class="card-info">
                <img src="../assets/imgs/testimonial1.png" alt="">
                <div class="card-title" style="border: none;">Driver Name : <?php echo $row['name'] ?></div>

                <div class="card-title">Bus Number : <?php echo $row['bus_no'] ?></div>

                <div class="card-title">Email : <?php echo $row['email'] ?></div>
                <div class="card-title">phone number : <?php echo $row['mobile_no'] ?> </div>
                <div class="card-title"><img style="cursor: pointer; width:50px; height:50px;" id="cancel" src="../assets/imgs/cancel.png" alt="" data-action="cancel" data-id="<?php echo  $row['id']?>"></div>
            </div>
        </div>
<?php } ?>
    </div>
<?php } ?>

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
