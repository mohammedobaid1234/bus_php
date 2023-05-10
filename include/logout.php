<?php
session_start();
unset($_SESSION["id"]);
session_destroy();
echo "<script language=javascript>location.href='../index.php';</script>";
?>
    <script>
        window.location = '../index.php';
    </script>
<?php
?>