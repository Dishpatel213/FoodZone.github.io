<?php
session_start();

if (!isset($_SESSION['loggin']) || $_SESSION['loggin'] != true) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home | FoodZone</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include 'cdn.php'; ?>
   
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <?php include 'header.php'; ?>

    <?php
    include 'connection.php';

    $sql = "SELECT * FROM addfood where status='active'";
    $all = $conn->query($sql);
    ?>
    <!-- Food Start -->
    <br><br><br><br><br><br><div class="container-xxl py-5 mt-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h2 class="mb-3">Hey, What's on Your Mind?</h2>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <?php while ($row = mysqli_fetch_assoc($all)) { ?>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary border-2" href="fresult.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row["fname"]; ?>
                                </a>
                            </li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Food End -->

    <?php include 'footer.php'; ?>

    <?php include 'script.php'; ?>
</body>

</html>