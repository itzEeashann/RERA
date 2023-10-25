<?php
    include_once 'db.php';
    $sql = "DELETE FROM emergency WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Removed sucessfully!'); window.location.href='homeResponse.php';</script>");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

