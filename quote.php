<?php 
ob_start();
include 'head.php';
include 'secondarynavbar.php';
include 'phpmail/mail.php';

?>

<?php
    //check form submit method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        extract($_POST);
        $client_name = cleanInput($name);
        $client_mobile = cleanInput($mobile);
        $client_email = cleanInput($email);
        $client_message = cleanInput($message);
        $client_serviceid = cleanInput($serviceid);
        $messages = array();

        if (empty($client_name)) {
            $messages['client_name'] = "The Name should not be empty..!";
        }
        if (empty($client_mobile)) {
            $messages['client_mobile'] = "The Mobile should not be empty..!";
        }
        if (empty($client_email)) {
            $messages['client_email'] = "The Email should not be empty..!";
        }
        if (empty($client_message)) {
            $messages['client_message'] = "The Message should not be empty..!";
        }
        if (empty($client_serviceid)) {
            $messages['client_serviceid'] = "The Service should  be selected..!";
        }
        
        if (empty($messages)) {

            $db = dbConn();              
            $adddate = date('Y-m-d');
            $sql = "INSERT INTO inquiries(ClientName,ClientMobile, ClientEmail, ServiceID, ClientMessage, 
            Loggeddate, InquiresState) VALUES ('$client_name','$client_mobile]',
            '$client_email','$client_serviceid','$client_message','$adddate',1)";

            $results = $db->query($sql);


            if (!empty($client_serviceid)){

                $sqlservice = "SELECT * FROM services where ServiceID = '$client_serviceid' ";
            $db = dbConn();
            $resultservice = $db->query($sqlservice);

           if ($resultservice->num_rows > 0) {
            $rowservice = $resultservice->fetch_assoc();
            $selectedService = $rowservice['Description'];

           }else{
            $selectedService = "Did not Mentioned the Practice area";
           }


        }

            // sending email start
            $cEmail=$client_email;
            $Title=$client_serviceid;
            $cFirstName=$client_name;
            $cLastName=$client_name;
            
            $to = $cEmail;
            $toname = $Title . $cFirstName . $cLastName;
            $subject = "We have Recived Your Inquiry";
            $body = '<!doctype html>
    <html lang="en-US">
    
    <head>
        <meta content="text / html;
            charset = utf-8" http-equiv="Content-Type" />
        <title>Reset Password Email Template</title>
        <meta name="description" content="Reset Password Email">
        <style type="text/css">
            a:hover {text-decoration: underline !important;}
        </style>
    </head>
    
    <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px;
            background-color: #f2f3f8;" leftmargin="0">
            <!--100% body table-->
            <table cellspacing = "0" border = "0" cellpadding = "0" width = "100%" bgcolor = "#f2f3f8"
            style = "@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
            <tr>
            <td>
            <table style = "background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width = "100%" border = "0"
            align = "center" cellpadding = "0" cellspacing = "0">
            <tr>
            <td style = "height:80px;">&nbsp;
            </td>
            </tr>
            <tr>
            <td style = "text-align:center;">
            <a href = "https://rakeshmandal.com" title = "logo" target = "_blank">
            <img width = "60" src = "https://pereraseneviratne.lk/image/NEW_LOGO.png" title = "logo" alt = "logo">
            </a>
            </td>
            </tr>
            <tr>
            <td style = "height:20px;">&nbsp;
            </td>
            </tr>
            <tr>
            <td>
            <table width = "95%" border = "0" align = "center" cellpadding = "0" cellspacing = "0"
            style = "max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
            <tr>
            <td style = "height:40px;">&nbsp;
            </td>
            </tr>
            <tr>
            <td style = "padding:0 35px;">
            <h1 style = "color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;"> We have Recived Your Inquiry </h1>
                                            <span
                                                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                Client Name: '.$client_name.'
                                             </p>
                                             <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                Client Email: '.$client_email.'
                                             </p>
                                             <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                Client Mobile: '. $client_mobile.'
                                             </p>
                                             <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                 Topic: '.$selectedService.'
                                          </p>
                                          <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                Message:'.$client_message.'
                                             </p>
                                            <h4> </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">
                                <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>Perera Seneviratne Associates</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!--/100% body table-->
    </body>
    
    </html>';
            $alt = "Customer  Registration";
            send_email($to, $toname, $subject, $body, $alt);
          
        }

        if (empty($messages)) {

            if (!empty($client_serviceid)){

                $sqlservice = "SELECT * FROM services where ServiceID = '$client_serviceid' ";
            $db = dbConn();
            $resultservice = $db->query($sqlservice);

           if ($resultservice->num_rows > 0) {
            $rowservice = $resultservice->fetch_assoc();
            $selectedService = $rowservice['Description'];

           }else{
            $selectedService = "Did not Mentioned the Practice area";
           }


        }

            $sqlsendemails = "SELECT * FROM notfications";
            $db = dbConn();
            $resultemails = $db->query($sqlsendemails);

            if ($resultemails->num_rows > 0) {

                while ($rowEmails = $resultemails->fetch_assoc()) {
                     // sending email start
            $cEmail=$rowEmails['EmailAddress'];
            $Title="A new Inquiry Alert";
            $cFirstName=$rowEmails['FirstName'];
            $cLastName=$rowEmails['LastName'];
            
            $to = $rowEmails['EmailAddress'];
            $toname =  $cFirstName . $cLastName ;
            $subject = "You have Recived New Inquiry" ." ". $selectedService;
            $body = '<!doctype html>
    <html lang="en-US">
    
    <head>
        <meta content="text / html;
            charset = utf-8" http-equiv="Content-Type" />
        <title>Reset Password Email Template</title>
        <meta name="description" content="Reset Password Email">
        <style type="text/css">
            a:hover {text-decoration: underline !important;}
        </style>
    </head>
    
    <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px;
            background-color: #f2f3f8;" leftmargin="0">
            <!--100% body table-->
            <table cellspacing = "0" border = "0" cellpadding = "0" width = "100%" bgcolor = "#f2f3f8"
            style = "@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
            <tr>
            <td>
            <table style = "background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width = "100%" border = "0"
            align = "center" cellpadding = "0" cellspacing = "0">
            <tr>
            <td style = "height:80px;">&nbsp;
            </td>
            </tr>
            <tr>
            <td style = "text-align:center;">
            <a href = "https://rakeshmandal.com" title = "logo" target = "_blank">
            <img width = "60" src = "https://pereraseneviratne.lk/image/NEW_LOGO.png" title = "logo" alt = "logo">
            </a>
            </td>
            </tr>
            <tr>
            <td style = "height:20px;">&nbsp;
            </td>
            </tr>
            <tr>
            <td>
            <table width = "95%" border = "0" align = "center" cellpadding = "0" cellspacing = "0"
            style = "max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
            <tr>
            <td style = "height:40px;">&nbsp;
            </td>
            </tr>
            <tr>
            <td style = "padding:0 35px;">
            <h1 style = "color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;"> You have received new inquiry </h1>
                                            <span
                                                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                               Client Name: '.$client_name.'
                                            </p>
                                            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                               Client Email: '.$client_email.'
                                            </p>
                                            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                               Client Mobile: '. $client_mobile.'
                                            </p>
                                            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                Topic: '.$selectedService.'
                                         </p>
                                         <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                               Message:'.$client_message.'
                                            </p>
                                            <h4> </h4>
                                        
           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">
                                <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>Perera Seneviratne Associates</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!--/100% body table-->
    </body>
    
    </html>';
            $alt = "Customer  Registration";
            send_email($to, $toname, $subject, $body, $alt);

            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'YOur message has been sent !.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'http://localhost/law/quote.php'; // Redirect to success page
            });
        </script>";
            

        }        


    }


}}
    
    ?>


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Request A Quote</h5>
                        <h1 class="mb-0">Need A Free Quote? Please Feel Free to Contact Us</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>24 hrs telephone support</h5>
                        </div>
                    </div>
                    <p class="mb-4">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+012 345 6789</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form method="POST" action="quote.php" >
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" name="name" value="<?= @$name?>" style="height: 55px;">
                                    <label class="text-danger">  <?= @$messages['client_name']; ?></label>
                                </div>
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Mobile" name="mobile" value="<?= @$mobile?>" style="height: 55px;">
                                    <label class="text-danger">  <?= @$messages['client_mobile']; ?></label>
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" name="email" value="<?= @$email?>" style="height: 55px;">
                                    <label class="text-danger">  <?= @$messages['client_email']; ?></label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" style="height: 55px;" name="serviceid">
                                    <?php
                                        $sqlServices= "SELECT * FROM services ";
                                        $db = dbConn();
                                        $resultServices = $db->query($sqlServices);
                ?>
                                        <option >Select A Service</option>
                                        
                                        <?php
                                        if ($resultServices->num_rows > 0) {

                                            while ($rowServices = $resultServices->fetch_assoc()) {
                                                ?>
                                        <option value="<?= $rowServices['ServiceID'] ?>" <?php
                                        if (@$serviceid == $rowServices['ServiceID']) {
                                            echo "selected";
                                                }
                ?>  ><?= ucfirst($rowServices['Description']) ?></option>
                <?php }} ?>
                                       
                                    </select>
                                    <label class="text-danger">  <?= @$messages['client_serviceid']; ?></label>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" name="message" placeholder="Message"></textarea>
                                    <label class="text-danger">  <?= @$messages['client_message']; ?></label>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Request A Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/vendor-1.jpg" alt="">
                    <img src="img/vendor-2.jpg" alt="">
                    <img src="img/vendor-3.jpg" alt="">
                    <img src="img/vendor-4.jpg" alt="">
                    <img src="img/vendor-5.jpg" alt="">
                    <img src="img/vendor-6.jpg" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>Startup</h1>
                        </a>
                        <p class="mt-3 mb-4">Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <button class="btn btn-dark">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street, New York, USA</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">info@example.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+012 345 67890</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Popular Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Your Site Name</a>. All Rights Reserved. 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<?php 

ob_end_flush();
?>