{{-- @include('dashboard.includes.session') --}}
{{-- @include('dashboard.includes.config') --}}
<?php
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM profiles WHERE email='$email'";
    $Result = $conn->query($sql);
    if ($Result->num_rows > 0) {
        while ($row = $Result->fetch_assoc()) {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $phone = $row['phone'];
            $joinDate = $row['joindate'];
            $userid = $row['id'];
        }
    }
}

?>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="/main/css/style.css">
    <link href="/lightbox/css/lightbox.css" rel="stylesheet" />
    <script src="/lightbox/js/lightbox.js"></script>
</head>

<body class="hero-anime">

    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md">

                        <a class="navbar-brand" href="/"><img style="width: 200px !important; height: auto !important;"
                                src="/images/logo.png" alt=""></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link" data-toggle="dropdown" href="/" role="button"
                                        aria-haspopup="true" aria-expanded="false">Home</a>

                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/plan">Plans and Pricing</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/designIdea">Design Ideas</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/joinOurTeam">Join Our Team</a>
                                </li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger"
                                    style="border: 0px; background: #f4b242 !important; padding: 5px !important; color: white !important;">
                                    <a style="color: white !important;" class="nav-link" href="dashboard/misc.php">Start
                                        Project</a>
                                </li>
                                <?php
                                if (isset($_SESSION['email'])) {

                                    echo ('
                                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger" style="background: transparent; border: 2px solid #f4b242; padding: 5px !important; color: #f4b242 !important;">
                                                    <a data-toggle="dropdown" style="color: #f4b242 !important;" class="nav-link" href="#menu">' . $fname . " " . $lname . '</a>
                                                    <ul class="dropdown-menu">
                                                       <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                            <a class="nav-link" href="#' . $fname . '"><b>' . $fname . " " . $lname . '</b><br />' . $email . '</a>
                                                        </li>
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                            <a class="nav-link" href="/account"><span class="fa fa-image"></span> My Design Image</a>
                                                        </li>
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                            <a class="nav-link" href="/account"><span class="fa fa-shopping-cart"></span> My Product Order</a>
                                                        </li>
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                            <a class="nav-link" href="/account"><span class="fa fa-user"></span> My Profile</a>
                                                        </li>
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                            <a class="nav-link" href="/logout"><span class="fa fa-sign-out-alt"></span> Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            ');
                                } else if (!isset($_SESSION['email'])) {
                                    echo ('
                                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger" style="background: transparent; border: 2px solid #f4b242; padding: 5px !important; color: #f4b242 !important;">
                                                    <a style="color: #f4b242 !important;" class="nav-link" href="/login">Login</a>
                                                </li>
                                            ');
                                }
                                ?>

                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="section full-height">
        <div class="absolute-center">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 style="color: #fff;">Online interior design services for any space on any budget</h1>
                            <p style="color: #fff;">InDeCore offers innovative and luxury interior design for commercial
                                and residential spaces.

                                We believe in creating exciting and wonderful spaces according to the client’s tastes
                                and demands. From online interior design
                                to 3D renderings, we aim to provide complete interior solutions online, no matter where
                                you are.
                                Aside from this, we provide a healthy and safe lifestyle by incorporating the concept of
                                Universal Design in projects for customers<br />
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="section mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!--
                                <div id="switch">
                                    <div id="circle"></div>
                                </div>
                                -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="margin-top: -120px !important;" class="carousel-caption">
                    <h3 style="margin-top: -120px !important;">WHAT'S THE SAME<br /><br />
                        Expertise You Can Trust</h3>
                    <p>We handpick expert designers to ensure you’re working with the best to bring your project to
                        life. Once you sign up, you’ll be paired with a designer who will help you create designs
                        tailored to your style, budget, and needs.</p>
                </div>
                <img style="height: auto; width: 100%"
                    src="https://static.wixstatic.com/media/0ce01b_05d3df6b5faf495694490e5ade8c09b6~mv2.jpg/v1/fill/w_2846,h_1276,al_c,q_90,usm_0.66_1.00_0.01/0ce01b_05d3df6b5faf495694490e5ade8c09b6~mv2.webp"
                    alt="Los Angeles">

            </div>
            <div class="carousel-item">
                <img style="height: auto; width: 100%"
                    src="https://static.wixstatic.com/media/0ce01b_18f93df0cfd24fcab362fe86ca7c8952~mv2.jpg/v1/fill/w_2846,h_1276,al_c,q_90,usm_0.66_1.00_0.01/0ce01b_18f93df0cfd24fcab362fe86ca7c8952~mv2.webp"
                    alt="Chicago">
                <div style="margin-top: -120px" class="carousel-caption">
                    <h3>WHAT'S THE SAME<br /><br />
                        Expertise You Can Trust</h3>
                    <p>We handpick expert designers to ensure you’re working with the best to bring your project to
                        life. Once you sign up, you’ll be paired with a designer who will help you create designs
                        tailored to your style, budget, and needs.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="height: auto; width: 100%"
                    src="https://static.wixstatic.com/media/0ce01b_38e787667c724792a1e4dbea3bcc3395~mv2.jpg/v1/fill/w_2846,h_1276,al_c,q_90,usm_0.66_1.00_0.01/0ce01b_38e787667c724792a1e4dbea3bcc3395~mv2.webp"
                    alt="New York">
                <div style="margin-top: -120px" class="carousel-caption">
                    <h3>WHAT'S THE SAME<br /><br />
                        Expertise You Can Trust</h3>
                    <p>We handpick expert designers to ensure you’re working with the best to bring your project to
                        life. Once you sign up, you’ll be paired with a designer who will help you create designs
                        tailored to your style, budget, and needs.</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <br /><br /><br />
    <style>
        .carousel-caption {
            transform: translateY(-2%);
            bottom: 0;
            top: 60%;
        }

    </style>

    <img src="/images/back.gif" width="100%" height="auto" />

    </div>
    <div class="container">
        <h2>Take a tour of some of our recent designs
        </h2><br /><br />
    </div>
    <div class="scrolling-wrapper">
        <div class="card">
            <a href="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp"
                data-lightbox="image-1">
                <img width="300px" height="300px" style="border-radius: 500px; margin: 20px;"
                    src="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp" />
            </a>
        </div>
        <div class="card">
            <a href="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp"
                data-lightbox="image-1">
                <img width="300px" height="300px" style="border-radius: 500px; margin: 20px;" width="400px"
                    height="auto"
                    src="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp" />
            </a>
        </div>
        <div class="card">
            <a href="https://static.wixstatic.com/media/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.webp"
                data-lightbox="image-1">
                <img width="300px" height="300px" style="border-radius: 500px; margin: 20px;" width="400px"
                    height="auto"
                    src="https://static.wixstatic.com/media/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.webp" />
            </a>
        </div>
        <div class="card">
            <a href="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp"
                data-lightbox="image-1">
                <img width="300px" height="300px" style="border-radius: 500px; margin: 20px;"
                    src="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp" />
            </a>
        </div>
        <div class="card">
            <a href="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp"
                data-lightbox="image-1">
                <img width="300px" height="300px" style="border-radius: 500px; margin: 20px;" width="400px"
                    height="auto"
                    src="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp" />
            </a>
        </div>
        <div class="card">
            <a href="https://static.wixstatic.com/media/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.webp"
                data-lightbox="image-1">
                <img width="300px" height="300px" style="border-radius: 500px; margin: 20px;" width="400px"
                    height="auto"
                    src="https://static.wixstatic.com/media/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.webp" />
            </a>
        </div>
        <!--
              <div class="card"><h2>Card</h2></div>
              <div class="card"><h2>Card</h2></div>
              <div class="card"><h2>Card</h2></div>
              <div class="card"><h2>Card</h2></div>
              <div class="card"><h2>Card</h2></div>
              <div class="card"><h2>Card</h2></div>
              -->
    </div>
    <br /><br /><br />
    <style>
        .scrolling-wrapper {
            overflow-x: scroll;
            overflow-y: hidden;
            white-space: nowrap;
        }

        .card {
            display: inline-block;

        }

    </style>
    <style>
        <blade media|%20screen%20and%20(max-width%3A%20600px)%20%7B%0D>.child-div {
            background: white !important;
        }
        }

    </style>
    <div class="container-fluid child-div"
        style="padding-top: 70px;background: url('/images/child.webp'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;;">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-xs-12">

                    </div>
                    <div style="text-align: left;" class="col-xl-6 col-md-6 col-xs-12">
                        <h3>Interior design is for everyone.</h3>
                        <br /><br /><br />
                        <h4>find your happy place</h4>
                        <p style="text-align: left;">You deserve a space that is functional and stylish, today. We can
                            create a beautiful space that fits your needs </p>
                        <br /><br /><br />
                        <h4>Delightfully affordable</h4>
                        <p style="text-align: left;">We believe that interior design should be accessible to everyone.
                            That’s why our packages are designed to be affordable, and our designers are trained to work
                            within your budget. </p>
                        <br /><br /><br />
                        <h4>Delightfully affordable</h4>
                        <p style="text-align: left;">We believe that interior design should be accessible to everyone.
                            That’s why our packages are designed to be affordable, and our designers are trained to work
                            within your budget. </p>
                        <br /><br /><br />
                    </div>
                </div>
            </div>
        </div>
    </div><br /><br /><br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2>Subscribe for Update</h2>
                    <br /><br />

                    <form action="dashboard/subscribe.php" method="POST">

                        <div class="form-group">

                            <input style="width: 300px;" type="text" class="form-control" placeholder="Your Name"
                                id="name" name="username" required>
                        </div>



                        <div class="form-group">

                            <input style="width: 300px;" type="email" class="form-control" placeholder="Enter email"
                                id="email" name="email" required>
                        </div>


                        <button style="width: 300px;background: #f4b242;" type="submit"
                            class="btn btn-danger">Submit</button>



                    </form>
            </div>
        </div>
    </div>
    </div>
    <br /><br /><br />
    <div class="container-fluid" style="background: #000; text-align: center; color: #fff; padding: 40px;">
        <p style="color: #fff">Copyright 2020</p><br />
        <style>
            .fa {
                padding: 20px;
                font-size: 30px;
                width: 50px;
                text-align: center;
                text-decoration: none;
                margin: 5px 2px;
            }

            .fa:hover {
                opacity: 0.7;
            }

        </style>
        <h5>Social Media</h5>

        <!-- Add font awesome icons -->
        <a href="https://www.facebook.com/Indecoredesign" target="_blank" class="fa fa-facebook"></a>
        <a href="https://www.twitter.com/Indecoredesign" target="_blank" class="fa fa-twitter"></a>
        <a href="https://www.instagram.com/Indecoredesign" target="_blank" class="fa fa-instagram"></a>
        <a href="https://www.linkedin.com/in/Indecoredesign" target="_blank" class="fa fa-linkedin"></a>

    </div>
    <script src="/main/js/app.js" type="text/javascript"></script>

    <script src="//code.tidio.co/a2ayfn7rgpckfjhkpg0vx73oy90kdi5i.js" async></script>
</body>

</html>
