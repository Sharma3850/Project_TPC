<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    
    <link rel="stylesheet" href="Resourse/css/style1.css">
</head>

<body>

    <!-- Navbar here -->
    <nav class="navbar nav1 navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand mx-3" href="#">
                <img src="Resourse/lpulogo.png" alt="Sample Image" height="40px" width="40px">
            </a>

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="listcolor dropdown-menu">
                            <li><a class="dropdown-item mx-2" href="#">Action</a></li>
                            <li><a class="dropdown-item mx-2" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item mx-2" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success " type="submit">Search</button>
                </form> -->

                <form method="post" action="">
                    <button class="btn btn-light custom-btn mx-5" type="submit" name="logout">logout</button>
                </form>
                
                <?php
                // Check if the form was submitted
                if (isset($_POST['logout'])) {
                    
                    // Perform the redirection
                    header("Location: index.php");
                    exit; // Ensure that no further code is executed
                }
                ?>


            </div>
        </div>
    </nav>

    <section>
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="6"></button>

            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner ">
                <div class="carousel-item active  ">
                    <img src="Resourse/lpuimg1.jpg" alt="Los Angeles" class="d-block w-100 size" style="width:100%">
                </div>

                <div class="carousel-item  ">
                    <img src="Resourse/lpuimg3.jpg" alt="New York" class="d-block w-100 size" style="width:100%">
                </div>
                <div class="carousel-item   ">
                    <img src="Resourse/lpuimg4.jpg" alt="Los Angeles" class="d-block w-100 size" style="width:100%">
                </div>
                <div class="carousel-item   ">
                    <img src="Resourse/lpuimg5.jpg" alt="Los Angeles" class="d-block w-100 size" style="width:100%">
                </div>
                <div class="carousel-item   ">
                    <img src="Resourse/lpuimg6.jpg" alt="Los Angeles" class="d-block w-100 size" style="width:100%">
                </div>
                <div class="carousel-item   ">
                    <img src="Resourse/lpuimg7.jpg" alt="Los Angeles" class="d-block w-100 size" style="width:100%">
                </div>
                <div class="carousel-item   ">
                    <img src="Resourse/lpuimg8.jpg" alt="Los Angeles" class="d-block w-100 size" style="width:100%">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


    </section>


    <section style="background: linear-gradient(to top, #cc00ff 0%, #0000ff 100%);">
        <div class="row p-5">
            <h5 class="col-12 text-center mb-5">
                <marquee style="color:#fff" behavior="scroll" direction="left">Important Functionalities</marquee>
            </h5>

            <div class="col-4 text-center d-flex justify-content-center align-items-center">
                <button class="btn btn-primary p-5 rounded-0 nav-link" style="background-color:#99ccff; color:black;"
                    onclick="openPage('student_details.php')"><b>Student details</b></button>
            </div>

            <div class="col-4 text-center d-flex justify-content-center align-items-center">
                <button class="btn btn-success p-5 rounded-0 nav-link" style="background-color:#99ccff"
                    onclick="openPage('redressal_form.php')"><b>Redressal form</b></button>
            </div>

            <div class="col-4 text-center d-flex justify-content-center align-items-center ">
                <button class="btn p-5 rounded-0 nav-link" style="background-color:#99ccff"
                    onclick="openPage('performance.html')"><b>Performance</b></button>
            </div>

        </div>



        <div class="row p-5">

            <div class="col-4 text-center d-flex justify-content-center align-items-center">
                <button class="btn btn-primary p-5 rounded-0 nav-link" style="background-color:#99ccff; color:black;"
                onclick="openPage('add_student.php')"><b>Add Student details</b></button>
            </div>

            <div class="col-4 text-center d-flex justify-content-center align-items-center">
                <button class="btn btn-success p-5 rounded-0 nav-link" style="background-color:#99ccff"
                    onclick="openPage('walk_in_query.php')"><b>walk in query</b></button>
            </div>

            <div class="col-4 text-center d-flex justify-content-center align-items-center ">
                <button class="btn p-5 rounded-0 nav-link" style="background-color:#99ccff"
                    onclick="openPage('performance.html')"><b>Performance</b></button>
            </div>

        </div>
    </section>

    <script>
        function openPage(url) {
            window.location.href = url;
        }
    </script>




</body>

</html>