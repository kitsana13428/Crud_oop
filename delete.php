<?php

    include_once('function.php');

    if(isset($_GET['del'])) {
        $userid = $_GET['del'];
        $deletedata = new DB_con();
        $sql = $deletedata->delete($userid);

        if ($sql) {
            echo "<script>alert('Record Delete Successfuly!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        } 
    }

?>