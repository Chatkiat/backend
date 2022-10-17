<?php

include_once('functions.php');
$updatedata = new DB_con();

if (isset($_POST['update'])) {
    $cameraid = $_POST['id_camera'];
    $status = $_POST['status_cm'];
    //$location = $_POST['location_cm'];

    $sql = $updatedata->update($status, $cameraid);
    if ($sql) {
        echo "<script>alert('Updated Successfully!');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='update.php'</script>";
    }
}

    

?>