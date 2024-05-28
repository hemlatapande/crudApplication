<?php
include 'db.php';

// Create
if (isset($_POST['create'])) {
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $sql = "INSERT INTO sliders (category, title, description, image) VALUES ('$category', '$title', '$description', '$image')";
    $conn->query($sql);
}

// Read
$sql = "SELECT * FROM sliders";
$result = $conn->query($sql);

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $sql = "UPDATE sliders SET category='$category', title='$title', description='$description', image='$image' WHERE id=$id";
    $conn->query($sql);
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM sliders WHERE id=$id";
    $conn->query($sql);
}

$conn->close();
?>

