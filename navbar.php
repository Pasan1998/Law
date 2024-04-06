<div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><img class="img-fluid" style="width: 3rem; height: 3rem; border-radius: 20px;" src="img/logo.png">Perera Seneviratne Associates</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <!-- <a href="service.html" class="nav-item nav-link">Services</a> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Practice Areas</a>
                        <div class="dropdown-menu m-0">

                        <?php
                $sqlServices= "SELECT * FROM services ";
                $db = dbConn();
                $resultServices = $db->query($sqlServices);
                ?>
                <?php
                        if ($resultServices->num_rows > 0) {
                            $i = 1;
                            while ($rowService = $resultServices->fetch_assoc()) {
                                $pageNameWithoutSpaces = str_replace(' ', '', $rowService['PageName']);
                                $lowecasePageName= strtolower($pageNameWithoutSpaces);
                                ?>
                            <a href="<?= $lowecasePageName ?>.php" class="dropdown-item"><?= $rowService['Description'] ?></a>
                           <?php }}?>

                        </div>
                    </div>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="price.php" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.php" class="dropdown-item">Our features</a>
                            <a href="team.php" class="dropdown-item">Team Members</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            <a href="quote.php" class="dropdown-item">Free Quote</a>
                        </div>
                    </div> -->
                    <a href="blog.php" class="nav-item nav-link">Blog</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <!-- <a href="https://phpcodex.com/startup-company-website-template" class="btn btn-primary py-2 px-4 ms-3">Download Pro Version</a> -->
            </div>
        </nav>
