<!-- Navbar & Carousel Start -->
<style>
  /* Internal Styles */
  .welcome {
    display: inline-block;
    padding: 15px 30px;
    margin-right: 10px;
    font-size: 1.5rem;
    text-decoration: none;
    text-transform: uppercase;
    border-radius: 30px;
    transition: background-color 0.3s;
  }
  .welcome-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
  }
  .welcome-primary:hover {
    background-color: #0056b3;
  }
  /* Keyframe animations */
  @keyframes slideInDown {
    from {
      transform: translateY(-50%);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
  @keyframes zoomIn {
    from {
      transform: scale(0.5);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }
    @media (max-width: 576px) {
    .welcome {
      padding: 10px 20px; /* Reduce padding for smaller screens */
      font-size:  0.7rem;   /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px; /* Adjust radius for smaller size */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      width: 20px;  /* Smaller width for mobile */
      height: 20px; /* Smaller height for mobile */
      background-size: 100%; /* Ensures icon fills the reduced size */
    }
    
  }
  /* For very small mobile phones (portrait) */
@media (max-width: 575px) {
  .welcome {
      padding: 10px 20px; /* Reduce padding for smaller screens */
      font-size:  0.7rem;   /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px; /* Adjust radius for smaller size */
    }
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
      width: 20px;  /* Smaller width for mobile */
      height: 20px; /* Smaller height for mobile */
      background-size: 100%; /* Ensures icon fills the reduced size */
    }
}

/* For larger phones (landscape) */
@media (min-width: 576px) and (max-width: 767px) {
  .welcome {
      padding: 10px 20px; /* Reduce padding for smaller screens */
      font-size:  0.7rem;   /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px; /* Adjust radius for smaller size */
    }
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
      width: 20px;  /* Smaller width for mobile */
      height: 20px; /* Smaller height for mobile */
      background-size: 100%; /* Ensures icon fills the reduced size */
    }

/* For tablets and smaller screens */
@media (min-width: 768px) and (max-width: 991px) {
  .welcome {
      padding: 10px 20px; /* Reduce padding for smaller screens */
      font-size:  0.7rem;   /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px; /* Adjust radius for smaller size */
    }
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
      width: 20px;  /* Smaller width for mobile */
      height: 20px; /* Smaller height for mobile */
      background-size: 100%; /* Ensures icon fills the reduced size */
    }
}

/* For larger devices (desktops) */
@media (min-width: 992px) {
  .welcome {
      padding: 10px 20px; /* Reduce padding for smaller screens */
      font-size: 0.7rem;   /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px; /* Adjust radius for smaller size */
    }
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
      width: 20px;  /* Smaller width for mobile */
      height: 20px; /* Smaller height for mobile */
      background-size: 100%; /* Ensures icon fills the reduced size */
    }
}
}
</style>
<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5> -->
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Protecting Your Rights</h1>
                            <a href="quote.php" class="btn btn-primary welcome py-md-3 px-md-5 me-3 animated slideInLeft">Book Free Consultation</a>
                            <!-- <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a> -->
                        </div>
                    </div> 
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5> -->
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Advocating for Justice</h1>
                            <a href="quote.php" class="btn btn-primary welcome welcome-primary py-md-3 px-md-5 me-3 animated slideInLeft">Book Free Consultation</a>
                            <!-- <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->