<?php
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['username'];
    $subject = 'New Message from ' . $email;
    $msg = $message . ' (' . $name . ' ' . $phone . ')';
    if (mail('someone@example.com', 'New Message', $msg)) {
        echo '
                <script>
                    alert("Message sent!");
                </script>
            ';
    }
}
?>
<html>

<head>
    <style>
        .carousel-caption {
            transform: translateY(-2%);
            bottom: 0;
            top: 60%;
        }

    </style>
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
    <link rel="stylesheet" type="text/css" href="main/css/style.css">
</head>

<body class="hero-anime">

    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">

                        <a class="navbar-brand" href="/"><img
                                style="width: 200px !important; height: auto !important;" src="images/logo.png" alt=""></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/" role="button" aria-haspopup="true"
                                        aria-expanded="false">Home</a>

                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="plans">Plans and Pricing</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/designIdeas">Design Ideas</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/joinOurTeam">Join Our Team</a>
                                </li>
                                <!--
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="joint-our-team.html" role="button" aria-haspopup="true" aria-expanded="false">Join our team</a>
                                       
                                    </li>
                                    -->
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger"
                                    style="border: 0px; background: #f4b242 !important; padding: 5px !important; color: white !important;">
                                    <a style="color: white !important;" class="nav-link"
                                        href="/misc">Start Project</a>
                                </li>
                                <?php
                                if (isset($_SESSION['email'])) {
                                    echo '
                                                                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger" style="background: transparent; border: 2px solid #f4b242; padding: 5px !important; color: #f4b242 !important;">
                                                                                    <a data-toggle="dropdown" style="color: #f4b242 !important;" class="nav-link" href="#menu">' .
                                        $fname .
                                        ' ' .
                                        $lname .
                                        '</a>
                                                                                    <ul class="dropdown-menu">
                                                                                       <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                                                            <a class="nav-link" href="#' .
                                        $fname .
                                        '"><b>' .
                                        $fname .
                                        ' ' .
                                        $lname .
                                        '</b><br />' .
                                        $email .
                                        '</a>
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
                                                                            ';
                                } elseif (!isset($_SESSION['email'])) {
                                    echo '
                                                                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger" style="background: transparent; border: 2px solid #f4b242; padding: 5px !important; color: #f4b242 !important;">
                                                                                    <a style="color: #f4b242 !important;" class="nav-link" href="/login">Login</a>
                                                                                </li>
                                                                            ';
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
                                Universal Design in projects for customers<br /><br />
                                <a style="background: #f4b242;" href="/misc" class="btn btn-danger">Start
                                    Project</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="section mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div id="switch">
                                <div id="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br /><br /><br />

    <div class="container">
        <h3>Contact Us</h3><br /><br />
        <div class="row">
            <div class="col-xl-12 col-md-12 col-xs-12">
                <form action="contact.php" method="POST">

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Your Name" id="name" name="username"
                            required>
                    </div>


                    <div class="form-group">

                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email"
                            required>
                    </div>

                    <div class="form-group">

                        <input type="number" class="form-control" placeholder="Phone" id="phone" name="phone"
                            required>
                    </div>
                    <div class="form-group">

                        <textarea style="80px" class="form-control" placeholder="Your message" id="email" name="message" required></textarea>
                    </div>
                    <input
                        style="width: 250px; border-radius: 10px !important; padding: 10px !important;background: #f4b242;"
                        value="Send" type="submit" class="btn btn-danger">



                </form>
            </div>

        </div>
        <br /><br /><br />
    </div>

    <br /><br /><br />
    <div class="container-fluid" style="background: #000; text-align: center; color: #fff; padding: 40px;">
        <p style="color: #fff">Copyright 2020</p>
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
    <div style="bottom: 0; right: 0; position: fixed; z-index: 99999999999" id="google_translate_element"></div>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
</body>

</html>
