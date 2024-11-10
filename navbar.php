
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0" >
        <div class="d-flex justify-content-between align-items-center w-100">
                <!-- Center brand on mobile and align left on larger screens -->


                <!-- Toggler button for mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>

                <a href="index.php" class="navbar-brand mx-auto mx-lg-0 p-0">
                    <h1 class="m-0 text-wrap text-center fs-4 fs-md-3 fs-lg-2">Perera Seneviratne Associates</h1>
                </a>
            </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="<?= SYSTEM_PATH ?>index.php" class="nav-item nav-link ">Home</a>
                <a href="<?= SYSTEM_PATH ?>about.php" class="nav-item nav-link">About</a>

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
                        <a href="<?= SYSTEM_PATH ?>accidentClaims.php"class="dropdown-item">Accident Claims   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Medical negligence matters   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Labour matters </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Intellectual property rights   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Contracts drafting and reviewing  </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Notarial Works   </a>
                        <a href="<?= SYSTEM_PATH ?>"class="dropdown-item">Other </a>


                    </div>
                </div>
                <!-- <a href="<?= SYSTEM_PATH ?>blog.php" class="nav-item nav-link">Blog</a> -->
                <a href="<?= SYSTEM_PATH ?>contact.php" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>