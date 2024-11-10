<style>
    @media (max-width: 576px) {
    .container-fluid.text-white {
        padding: 20px;
    }
    .container-fluid.text-white p {
        font-size: 0.9rem; /* Smaller font size for mobile */
    }
}
/* Footer Styling */
.footer {
    background: linear-gradient(45deg, #061429, #122b40);
    color: #ffffff;
    padding: 50px 0;
    font-size: 0.9rem;
}

.footer a {
    color: #ffffff;
    transition: all 0.3s ease-in-out;
    text-decoration: none;
}

.footer a:hover {
    color: #ffdd57;
    text-decoration: underline;
}

.footer h3 {
    color: #ffdd57;
    margin-bottom: 20px;
    font-size: 1.3rem;
    font-weight: bold;
    border-bottom: 2px solid #ffdd57;
    display: inline-block;
}

.footer p {
    font-size: 1rem;
}

.footer .btn-square {
    background-color: #ffdd57;
    border: none;
    color: #061429;
    transition: background-color 0.3s;
}

.footer .btn-square:hover {
    background-color: #ffbb33;
}

.footer .btn-primary {
    background-color: #ffdd57;
    border: none;
}

.footer .btn-primary:hover {
    background-color: #ffbb33;
}

/* Add more padding to the text for better readability */
.footer-about p {
    line-height: 1.8;
    padding: 0 15px;
}

/* Social media icons hover effect */
.footer .btn-primary:hover i {
    transform: scale(1.1);
}

/* Responsive font sizes */
@media (max-width: 576px) {
    .footer h3 {
        font-size: 1.1rem;
    }

    .footer p {
        font-size: 0.85rem;
    }

    .footer .btn-square {
        width: 35px;
        height: 35px;
    }
}


</style>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp footer" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 footer-about">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                    <p class="mt-3 mb-4">Welcome to Perera Seneviratne Associates, where legal expertise meets 
                        unwavering commitment. Whether you're navigating a complex family matter, seeking advice on 
                        business ventures, or requiring deed work, we are here to guide you every step of the way.</p>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Get In Touch</h3>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">364/1 Pannipitiya Rd, Thalawathugoda</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">info@example.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+94 77 599 0485</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>

                    <!-- Quick Links -->
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Footer Start -->
<div class="container-fluid text-white footer py-3" style="background: #061429;">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6">
                <p class="mb-1">&copy; <a class="text-white border-bottom" href="#">pereraseneviratne.lk</a>. All Rights Reserved.</p>
                <p class="mb-1">Designed by <a class="text-white border-bottom" href="#">Pasan Manahara</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>



    <!-- JavaScript Libraries -->

    <script>
        // Initialize the counter-up plugin
        // $('[data-toggle="counter-up"]').counterUp({
        //     delay: 10,
        //     time: 1000
        // });

        // Initialize Typed.js for typing effect
        var typed = new Typed("#your", {
            strings: ["Your"],
            typeSpeed: 50,
            backSpeed: 25,
            loop: true
        });

        var typed = new Typed("#legal", {
            strings: ["Legal"],
            typeSpeed: 50,
            backSpeed: 25,
            loop: true
        });

        var typed = new Typed("#guard", {
            strings: ["Guard"],
            typeSpeed: 50,
            backSpeed: 25,
            loop: true
        });


    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= SYSTEM_PATH ?>lib/wow/wow.min.js"></script>
    <script src="<?= SYSTEM_PATH ?>lib/easing/easing.min.js"></script>
    <script src="<?= SYSTEM_PATH ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= SYSTEM_PATH ?>lib/counterup/counterup.min.js"></script>
    <script src="<?= SYSTEM_PATH ?>lib/owlcarousel/owl.carousel.min.js"></script>



    <!-- Template Javascript -->
    <script src="<?= SYSTEM_PATH ?>js/main.js"></script>
</body>

</html>