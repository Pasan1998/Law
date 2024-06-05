


<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0">Perera Seneviratne Associates</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <<div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link ">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <!-- <a href="service.html" class="nav-item nav-link">Services</a> -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Practice Areas</a>
                    <div class="dropdown-menu m-0">

                        <?php
                        $sqlServices = "SELECT * FROM services ";
                        $db = dbConn();
                        $resultServices = $db->query($sqlServices);
                        ?>
                        <?php
                        if ($resultServices->num_rows > 0) {
                            $i = 1;
                            while ($rowService = $resultServices->fetch_assoc()) {
                                $pageNameWithoutSpaces = str_replace(' ', '', $rowService['PageName']);
                                $lowecasePageName = strtolower($pageNameWithoutSpaces);
                                 $text=($rowService['PageName']);
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://translate.googleapis.com/translate_a/single?client=gtx&dt=t',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_POSTFIELDS => 'sl=en&tl=si&q=' . urlencode($text),
                                    CURLOPT_HTTPHEADER => array(
                                        'Content-Type: application/x-www-form-urlencoded'
                                    ),
                                )
                                );
                                $response = curl_exec($curl);
                                curl_close($curl);

                                $sentencesArray = json_decode($response, true);
                               
                                $sentences = "";
                                foreach ($sentencesArray[0] as $s) {
                                    $sentences .= isset($s[0]) ? $s[0] : '';
                                }

                                 $sentences;
                                ?>


                                <a href="<?= $lowecasePageName ?>.php"
                                    class="dropdown-item"><?= $rowService['PageName'] ." ". $sentencesArray ?> abs</a>
                            <?php }
                        } ?>

                    </div>
                </div>
               
                <a href="blog.php" class="nav-item nav-link">Blog</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>

    </nav>

    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-90" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="    max-height: 400px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Protecting Your Rights</h1>
                            <a href="quote.php" class="btn btn-primary welcome py-md-3 px-md-5 me-3 animated slideInLeft">Free Advice</a>
                            <!-- <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a> -->
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    <!-- <div class="container-fluid bg-primary py-5 " style="margin-bottom: 90px;">
    <img class="" src="img/carousel-1.jpg" style="background-size: cover;" alt="Image">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                <a href="" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">About</a>
            </div>
        </div>
    </div> -->
</div>
<!-- Navbar End -->