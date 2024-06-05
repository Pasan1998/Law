<?php 

include 'head.php';
include 'navbar.php';
include 'carousel.php';
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
        
        
        if (empty($messages)) {

            $db = dbConn();              
            $adddate = date('Y-m-d');
            $sql = "INSERT INTO inquiries(ClientName,ClientMobile, ClientEmail, ClientMessage, 
            Loggeddate, InquiresState) VALUES ('$client_name','$client_mobile]',
            '$client_email','$client_message','$adddate',1)";

            $results = $db->query($sql);


            

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
            <a href = "https://pereraseneviratne.lk" title = "logo" target = "_blank">
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
            $subject = "You have Recived New Inquiry";
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
            <a href = "https://pereraseneviratne.lk" title = "logo" target = "_blank">
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
                window.location.href = 'http://localhost/law/index.php'; // Redirect to success page
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


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Happy Clients</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Projects Done</h5>
                            <h1 class="mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Win Awards</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Introduction</h5>
                        <!--<h1 class="mb-0">The Best IT Solution With 10 Years of Experience</h1>-->
                    </div>
                    <p class="mb-4">Welcome to Perera Seneviratne Associates, where legal expertise meets unwavering commitment. 
                    Whether you're navigating a complex family matter, seeking advice on business ventures, dealing with administrative challenges, 
                    or requiring deed work, we are here to guide you every step of the way. At Perera Seneviratne Associates, your success and peace 
                    of mind are our top priorities.</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3">
                                <!--<i class="fa fa-check text-primary me-3"></i>Award Winning-->
                                </h5>
                            <h5 class="mb-3">
                                <!--<i class="fa fa-check text-primary me-3"></i>Professional Staff-->
                                </h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3">
                                <i class="fa fa-check text-primary me-3"></i>
                                <!--24/7 Support-->-->
                                </h5>
                            <h5 class="mb-3">
                                <!--<i class="fa fa-check text-primary me-3"></i>Fair Prices-->
                                </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <!--<i class="fa fa-phone-alt text-white"></i>-->
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+012 345 6789</h4>
                        </div>
                    </div>
                    <a href="quote.php" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Why Choose Us</h5>
                <h1 class="mb-0">We Are Here to Guide You Every Step of The Way</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Cost-Effective Legal Solutions</h4>
                            <p class="mb-0">Cost-Effective Legal Solutions: Being a small law firm allows us to maintain lower overhead costs, which we pass on to our clients in the form of competitive pricing. We understand the financial strain legal matters can impose, and we're committed to providing cost-effective solutions without compromising on quality or results.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Personalized Attention</h4>
                            <p class="mb-0">Personalized Attention:  As a small law firm, we prioritize personalized service, ensuring that every client receives the individual attention and care they deserve. You won't get lost in the shuffle; we're dedicated to understanding your unique needs and crafting tailored legal strategies accordingly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="img/feature.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Transparent Communication</h4>
                            <p class="mb-0">We believe in transparent communication and pricing, ensuring that you are fully informed about your options, potential outcomes, and costs from the outset. You can rely on us to provide clear, honest advice and to work diligently to resolve your legal matters in a timely and cost-effective manner.</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>Community Connection</h4>
                            <p class="mb-0">Community Connection: As a small firm, we're deeply rooted in the local community. We understand the unique challenges and dynamics of our area, allowing us to provide informed and effective legal advice tailored to your specific circumstances.</p>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Service Start -->
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Services</h5>
                <h1 class="mb-0"> Legal Solutions for your personal or business matters</h1>
            </div>
            <?php
                        $sqlServices = "SELECT * FROM services ";
                        $db = dbConn();
                        $resultServices = $db->query($sqlServices);
                        ?>


            <div class="row g-5">
            <?php
                        if ($resultServices->num_rows > 0) {
                            $i = 1;
                            while ($rowService = $resultServices->fetch_assoc()) { 



                                ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="mb-3"><?= $rowService['Description'] ?></h4>
                        <!-- sinhala  -->
                        <?php
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
                        <h4 class="mb-3"><?=   $sentences ?></h4>
                        <?php
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
                             CURLOPT_POSTFIELDS => 'sl=en&tl=ta&q=' . urlencode($text),
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
                        <h4 class="mb-3"><?=   $sentences ?></h4>
                        <!-- <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed</p> -->
                        <a class="btn btn-lg btn-primary rounded" href="<?= SYSTEM_PATH ?>servicearea.php?ServiceID=<?= $rowService['ServiceID'] ?>">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php }}?>
              
                
                
                
                
            </div>
        </div>
    </div>
    <!-- Service End -->


  


    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Request A Free Opinion</h5>
                        <h1 class="mb-0">Need a free Legal Opinion? Please Feel Free to Contact Us </h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-10 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>You will receive our response immediately or within 12 hours </h5>
                        </div>
                        <!-- <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>2</h5>
                        </div> -->
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
                    <form method="POST" action="index.php" >
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" name="name" value="<?= @$name ?>" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="number" name="mobile" value="<?= @$mobile ?>" class="form-control bg-light border-0" placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" value="<?= @$email ?>" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Message" name="message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Request A Free Advice</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
                <h1 class="mb-0">What Our Clients Say About Our  Services</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-1.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-2.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-3.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="img/testimonial-4.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Client Name</h4>
                            <small class="text-uppercase">Profession</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <!--<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">-->
    <!--    <div class="container py-5">-->
    <!--        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">-->
    <!--            <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>-->
    <!--            <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>-->
    <!--        </div>-->
    <!--        <div class="row g-5">-->
    <!--            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">-->
    <!--                <div class="team-item bg-light rounded overflow-hidden">-->
    <!--                    <div class="team-img position-relative overflow-hidden">-->
    <!--                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="">-->
    <!--                        <div class="team-social">-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="text-center py-4">-->
    <!--                        <h4 class="text-primary">Full Name</h4>-->
    <!--                        <p class="text-uppercase m-0">Designation</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">-->
    <!--                <div class="team-item bg-light rounded overflow-hidden">-->
    <!--                    <div class="team-img position-relative overflow-hidden">-->
    <!--                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="">-->
    <!--                        <div class="team-social">-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="text-center py-4">-->
    <!--                        <h4 class="text-primary">Full Name</h4>-->
    <!--                        <p class="text-uppercase m-0">Designation</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">-->
    <!--                <div class="team-item bg-light rounded overflow-hidden">-->
    <!--                    <div class="team-img position-relative overflow-hidden">-->
    <!--                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="">-->
    <!--                        <div class="team-social">-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>-->
    <!--                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="text-center py-4">-->
    <!--                        <h4 class="text-primary">Full Name</h4>-->
    <!--                        <p class="text-uppercase m-0">Designation</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Team End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest Blog</h5>
                <h1 class="mb-0">Read The Latest Articles from Our Blog Post</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-1.jpg" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">How to build a website</h4>
                            <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-2.jpg" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">How to build a website</h4>
                            <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-3.jpg" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">How to build a website</h4>
                            <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->


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
    

   <?php 
   include 'footer.php';
   
   ?>