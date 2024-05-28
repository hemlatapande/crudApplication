<?php
include 'db.php';

$category = $_GET['category'];
$sql = "SELECT * FROM sliders WHERE category = '$category'";
$result = $conn->query($sql);

echo '<div class="tab-pane nav-pills-custom nav-link fade shadow rounded bg-white show active p-5" id="'.$category.'" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div id="'.$category.'-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">';

$active = "active";
while ($row = $result->fetch_assoc()) {
    echo '<div class="carousel-item '.$active.'" data-image="'.$row['image'].'">
            <h3>'.$row['title'].'</h3>
            <p>'.$row['description'].'</p>
          </div>';
    $active = "";
}


$conn->close();
?>
