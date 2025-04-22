<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM krs WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
