<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
    <style>
        .tab-content { margin-top: 20px; }
        .carousel-item img { width: 100%; }
        .nav-tabs { display: flex; flex-direction: column; }
        .nav-tabs .nav-item { width: 100%; }
        .carousel-inner img { height: 200px; }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    
    <section class="py-5 header">
        <div class="container py-4">
            <header class="text-center mb-5 pb-5 text-white">
             <h1 class="display-4">Technology Learning and Development</h1>
               
            </header>

            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        
                        <?php
                        include 'db.php';
                        $sql = "SELECT DISTINCT category FROM sliders";
                        $result = $conn->query($sql);
                        $active = "active";
                        while ($row = $result->fetch_assoc()) {
                            echo '<a class="nav-link mb-3 p-3 shadow '.$active.'" id="'.$row['category'].'" data-toggle="pill" href="#'.$row['category'].'" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-user-circle-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">'.$row['category'].'</span></a>';
                            $active = "";
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                    </div>
                </div>

                <div class="col-md-3">
                    <div id="image-display">
                        <img src="images/Learning.jpg" alt="Image Display" id="display-image" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $('.nav-link').on('click', function (event) {
            var category = $(this).attr('id');
            $.ajax({
                url: 'fetch_slides.php',
                type: 'GET',
                data: { category: category },
                success: function (response) {
                    $('#v-pills-tabContent').html(response);
                    updateImage($('#v-pills-tabContent .carousel-item.active').data('image'));
                }
            });
        });

        $(document).on('slid.bs.carousel', '.carousel', function () {
            var activeItem = $(this).find('.carousel-item.active').data('image');
            updateImage(activeItem);
        });

        function updateImage(src) {
            $('#display-image').attr('src', src);
        }
    });
</script>
</body>
</html>
