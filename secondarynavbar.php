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

  @media (max-width: 768px) {
    .service-item {
      width: 100%;
      /* Ensures the card takes full width on mobile */
      margin-left: auto;
      margin-right: auto;
    }
  }

  @media (max-width: 576px) {
    .welcome {
      padding: 10px 20px;
      /* Reduce padding for smaller screens */
      font-size: 0.7rem;
      /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px;
      /* Adjust radius for smaller size */
    }

    .service-item {
      width: 100%;
      /* Ensures the card takes full width on mobile */
      margin-left: auto;
      margin-right: auto;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      width: 20px;
      /* Smaller width for mobile */
      height: 20px;
      /* Smaller height for mobile */
      background-size: 100%;
      /* Ensures icon fills the reduced size */
    }

  }

  /* For very small mobile phones (portrait) */
  @media (max-width: 575px) {
    .welcome {
      padding: 10px 20px;
      /* Reduce padding for smaller screens */
      font-size: 0.7rem;
      /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px;
      /* Adjust radius for smaller size */
    }

    .service-item {
      width: 100%;
      /* Ensures the card takes full width on mobile */
      margin-left: auto;
      margin-right: auto;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      width: 20px;
      /* Smaller width for mobile */
      height: 20px;
      /* Smaller height for mobile */
      background-size: 100%;
      /* Ensures icon fills the reduced size */
    }
  }

  /* For larger phones (landscape) */
  @media (min-width: 576px) and (max-width: 767px) {
    .welcome {
      padding: 10px 20px;
      /* Reduce padding for smaller screens */
      font-size: 0.7rem;
      /* Adjust font size */
      margin-right: 5px;
      border-radius: 20px;
      /* Adjust radius for smaller size */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      width: 20px;
      /* Smaller width for mobile */
      height: 20px;
      /* Smaller height for mobile */
      background-size: 100%;
      /* Ensures icon fills the reduced size */
    }

    .service-item {
      width: 100%;
      /* Ensures the card takes full width on mobile */
      margin-left: auto;
      margin-right: auto;
    }

    /* For tablets and smaller screens */
    @media (min-width: 768px) and (max-width: 991px) {
      .welcome {
        padding: 10px 20px;
        /* Reduce padding for smaller screens */
        font-size: 0.7rem;
        /* Adjust font size */
        margin-right: 5px;
        border-radius: 20px;
        /* Adjust radius for smaller size */
      }

      .carousel-control-prev-icon,
      .carousel-control-next-icon {
        width: 20px;
        /* Smaller width for mobile */
        height: 20px;
        /* Smaller height for mobile */
        background-size: 100%;
        /* Ensures icon fills the reduced size */
      }

      .service-item {
        width: 100%;
        /* Ensures the card takes full width on mobile */
        margin-left: auto;
        margin-right: auto;
      }
    }

    /* For larger devices (desktops) */
    @media (min-width: 992px) {
      .welcome {
        padding: 10px 20px;
        /* Reduce padding for smaller screens */
        font-size: 0.7rem;
        /* Adjust font size */
        margin-right: 5px;
        border-radius: 20px;
        /* Adjust radius for smaller size */
      }

      .carousel-control-prev-icon,
      .carousel-control-next-icon {
        width: 20px;
        /* Smaller width for mobile */
        height: 20px;
        /* Smaller height for mobile */

        .service-item {
          width: 100%;
          /* Ensures the card takes full width on mobile */
          margin-left: auto;
          margin-right: auto;
        }

        background-size: 100%;
        /* Ensures icon fills the reduced size */
      }
    }
  }
</style>


<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
  <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0">
      <h1 class="m-0">Perera Seneviratne Associates</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto py-0">
        <a href="<?= SYSTEM_PATH ?>index.php" class="nav-item nav-link ">Home</a>
        <a href="<?= SYSTEM_PATH ?>about.php" class="nav-item nav-link">About</a>
        <!-- <a href="service.html" class="nav-item nav-link">Services</a> -->
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Practice Areas</a>
          <div class="dropdown-menu m-0">
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Fundamental Rights </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Writ   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Divorce</a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Testamentary   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Money Recovery </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Leasing and loan related matters </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Land Disputes  </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Accident Claims   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Medical negligence matters   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Labour matters </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Intellectual property rights   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Contracts drafting and reviewing  </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Notarial Works   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Other </a>

                        <!-- <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Fundamental Rights  මුලික අයිතිවාසිකම් அடிப்படை உரிமைகள் </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Writ  රිට් எழுத்து </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Divorce  දික්කසාද விவாகரத்து </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Testamentary  තෙස්තමේන්තු டெஸ்டமெண்டரி </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Money Recovery මුදල් ප්‍රතිසාධනය பணம் திரும்ப </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Leasing and loan related matters  ලීසිං සහ ණය සම්බන්ධ කරුණු குத்தகை மற்றும் கடன் தொடர்பான விஷயங்கள் </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Land Disputes  ඉඩම් ආරවුල් நில சர்ச்சைகள் </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Accident Claims  හදිසි අනතුරු හිමිකම් விபத்து உரிமைகோரல்கள் </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Medical negligence matters  වෛද්ය නොසැලකිල්ල කරුණු மருத்துவ அலட்சியம் தான் முக்கியம் </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Labour matters  කම්කරු කරුණු தொழிலாளர் விஷயங்கள் </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Intellectual property rights  බුද්ධිමය දේපල අයිතිවාසිකම් அறிவுசார் சொத்துரிமைகள் </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Contracts drafting and reviewing  ගිවිසුම් කෙටුම්පත් කිරීම සහ සමාලෝචනය කිරීම ஒப்பந்தங்கள் வரைவு மற்றும் மதிப்பாய்வு </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Notarial Works  නොතාරිස් වැඩ நோட்டரி வேலை </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Other  වෙනත් மற்றவை </a> -->


          </div>
        </div>

        <!-- <a href="<?= SYSTEM_PATH ?>blog.php" class="nav-item nav-link">Blog</a> -->
        <a href="<?= SYSTEM_PATH ?>contact.php" class="nav-item nav-link">Contact</a>
      </div>

  </nav>

  <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Protecting Your Rights</h1>
            <a href="quote.php" class="btn btn-primary welcome py-md-3 px-md-5 me-3 animated slideInLeft">Book Free
              Consultation</a>
            <!-- <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a> -->
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Advocating for Justice</h1>
            <a href="quote.php"
              class="btn btn-primary welcome welcome-primary py-md-3 px-md-5 me-3 animated slideInLeft">Book Free
              Consultation</a>
            <!-- <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a> -->
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<!-- Navbar End -->