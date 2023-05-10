<?php
include '../include/slidebar.php';
global $conn;
$qry = "SELECT * FROM students WHERE status = 1";
$result=mysqli_query($conn,$qry);
if (isset($_POST['submit'])) {
    $id= $_POST['id'];
    $action= $_POST['action'] == 'cancel' ? 3: 2;
    $query = "UPDATE students SET status = $action WHERE id = $id";
    mysqli_query($conn, $query);
    if($_POST['action'] == 'cancel'){
        $q = "DELETE FROM students WHERE id = $id";
        mysqli_query($conn, $q);
    }
}
?>

<img src="../assets/imgs/logo.png" alt="">
<!-- Start Project Table -->
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">Admin Page</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full" style="text-align: left;">
            <thead>
            <tr>
                <td>Students Requests:</td>
                <td>City:</td>
                <td style="text-align: center;">Request Status:</td>
            </tr>
            </thead>
            <tbody>
            <?php while ($data = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['city']?></td>
                    <div style="display: flex;" class="Request Status">
                        <td><img style="cursor: pointer; margin-left: 180px; margin-right: 40px;" src="../assets/imgs/cancel.png" alt="" data-action="cancel" data-id="<?php echo  $data['id']?>">
                            <img style="cursor: pointer;" src="../assets/imgs/checked.png" alt="" data-action="approve" data-id="<?php echo  $data['id']?>">
                        </td>
                    </div>

                </tr>
            <?php } ?>
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
        $('img').on('click', function (){
            $this = $(this);
            if($(this).data('action') == 'cancel' || $(this).data('action') == 'approve'){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, ' + $(this).data('action')
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
                    $this.closest('tr').remove();
                });
                }
            })


            }
        })
    },1000)

</script>
