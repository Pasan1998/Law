<?php 
include 'head.php';
include 'secondarynavbar.php';

?>

<?php
 extract($_GET);
if ($_SERVER ['REQUEST_METHOD'] == "GET") {
    extract($_GET);
    $db = dbConn();
     $sql = "SELECT * FROM practice_areas WHERE PracticeAreaId = '$PracticeAreaId' AND practiceAreaStatus = '1' ";
    $result = $db->query($sql);
   
    $rowService = $result->fetch_assoc();

     "<br>";
     $LongerDescriptionEnglishOptionalStatus = $rowService['LongerDescriptionEnglishOptionalStatus'] ;
     "<br>";
    if ($LongerDescriptionEnglishOptionalStatus == 1){
         $Description =  $rowService['HeadingName'] ;
         $LongerDescription = $rowService['LongerDescriptionEnglish'] ;
       "testing1";

    }elseif ($LongerDescriptionEnglishOptionalStatus == 2) {
         $Description =  $rowService['HeadingNameOptional'] ;
         $LongerDescription = $rowService['LongerDescriptionEnglishOptional'] ;
         "testing2";
    }
   
     $PracticeAreaId;
}
?>


<style>
    #header-carousel .carousel-inner {
        /* background-image: url("img/carousel-1.jpg"); */
        background-size: cover;
        background-position: center;
        height: 50vh; /* Adjust the height as needed */
    }
</style>



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


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Legal Area - <?= ucwords($Description) ?></h5>

                        <!-- <h1 class="mb-0"><?  ucwords($Description) ?></h1> -->
                    </div>
                    <?php
                    
                    $sentences_withbreaks = preg_split('/(?<=[.!?])\s+/', $LongerDescription);
$paragraphs = array_chunk($sentences_withbreaks, 5);

foreach ($paragraphs as $paragraph) {
    echo '<p class="mb-4" style="text-align: justify;">' . implode(' ', $paragraph) . '</p>';
}
                    ?>
                    
                        <!-- sinhala -->
                        <?php
                         
                          $text= $LongerDescription;
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

                    <?php
                    
                    $sentences_withbreaks_sinhala = preg_split('/(?<=[.!?])\s+/', $sentences);
                    $paragraphs = array_chunk($sentences_withbreaks_sinhala, 5);

                    foreach ($paragraphs as $paragraph) {
                        echo '<p class="mb-4" style="text-align: justify;">' . implode(' ', $paragraph) . '</p>';
                    }
                    ?>
                         <!-- <p class="mb-4"><?= $sentences; ?></p> -->


                         <!-- tamil -->
                         <?php
                           $text= $LongerDescription;
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
                        <?php
                    
                    $sentences_withbreaks_Tamil = preg_split('/(?<=[.!?])\s+/', $sentences);
                    $paragraphs = array_chunk($sentences_withbreaks_Tamil, 5);

                    foreach ($paragraphs as $paragraph) {
                        echo '<p class="mb-4" style="text-align: justify;">' . implode(' ', $paragraph) . '</p>';
                    }
                    ?>
                         <!-- <p class="mb-4"><?= $sentences; ?></p> -->
                    <!-- <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    </div> -->
                    <!-- <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+94 77 599 0485</h4>
                        </div>
                    </div> -->
                    <!-- <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a> -->
                </div>
                <!-- <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- About End -->



    

 <?php 
 include 'footer.php';
 
 ?>