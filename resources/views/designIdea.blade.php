<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <nav class="navbar navbar-expand-md navbar-light">

                        <a class="navbar-brand" href="/" target="_blank"><img
                                style="width: 200px !important; height: auto !important;" src="/images/logo.png" alt=""></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link dropdown-toggle" href="/" role="button"
                                        aria-haspopup="true" aria-expanded="false">Home</a>

                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/plan">Plans and Pricing</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link" href="/designIdea">Design Ideas</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="joinOurTeam">Join Our Team</a>
                                </li>
                                <!--
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="joint-our-team.html" role="button" aria-haspopup="true" aria-expanded="false">Join our team</a>
                                       
                                    </li>
                                    -->
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger"
                                    style="border: 0px; background: #f4b242 !important; padding: 5px !important; color: white !important;">
                                    <a style="color: white !important;" class="nav-link"
                                        href="dashboard/misc">Start Project</a>
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
    <div style="display: none" class="section full-height">
        <div class="absolute-center">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1>Online interior design services for any space on any budget</h1>
                            <p>InDeCore offers innovative and luxury interior design for commercial and residential
                                spaces.

                                We believe in creating exciting and wonderful spaces according to the client’s tastes
                                and demands. From online interior design
                                to 3D renderings, we aim to provide complete interior solutions online, no matter where
                                you are.
                                Aside from this, we provide a healthy and safe lifestyle by incorporating the concept of
                                Universal Design in projects for customers<br /><br />
                                <a href="dashboard/misc" style="background: #f4b242;" class="btn btn-danger">Start
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
        <h3>Design Ideas</h3><br /><br />
    </div>
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <div class="scrolling-wrapper">
                <div class="card">
                    <a href="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp"
                        data-lightbox="image-1">
                        <img width="300px" height="auto" style="margin: 20px;"
                            src="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp" />
                    </a>
                </div>
                <div class="card">
                    <a href="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp"
                        data-lightbox="image-1">
                        <img width="300px" height="auto" style="margin: 20px;" width="400px" height="auto"
                            src="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp" />
                    </a>
                </div>
                <div class="card">
                    <a href="https://static.wixstatic.com/media/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.webp"
                        data-lightbox="image-1">
                        <img width="300px" height="auto" style="margin: 20px;" width="400px" height="auto"
                            src="https://static.wixstatic.com/media/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.webp" />
                    </a>
                </div>
                <div class="card">
                    <a href="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp"
                        data-lightbox="image-1">
                        <img width="300px" height="auto" style="margin: 20px;"
                            src="https://static.wixstatic.com/media/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_ee527659a44c4abc9b98430a549e1f54~mv2.webp" />
                    </a>
                </div>
                <div class="card">
                    <a href="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp"
                        data-lightbox="image-1">
                        <img width="300px" height="auto" style="500px; margin: 20px;" width="400px" height="auto"
                            src="https://static.wixstatic.com/media/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_fb87079d4eab4942a5f2e57e4f76c22d~mv2.webp" />
                    </a>
                </div>
                <div class="card">
                    <a href="https://static.wixstatic.com/media/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.jpg/v1/fill/w_882,h_882,al_c,q_85,usm_0.66_1.00_0.01/0ce01b_6b191b30de024acebac9f370ec20fd93~mv2.webp"
                        data-lightbox="image-1">
                        <img width="300px" height="auto" style="margin: 20px;" width="400px" height="auto"
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
            <h2>Closet</h2><br />
            <p style="margin-bottom: 80px;">Having a <u>small walk-in closet</u> in your bedroom can feel like a curse,
                especially if there is not enough room for all your stuff. From racks to rods, and drawers to bins, the
                following ideas will help you optimize every square inch of your closet with purposeful storage
                solutions.</p>
            <br />
        </div>
        <div class="col-2">

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Subscribe for Update</h2>
                <br /><br />
                <div class="row">
                    <form action="dashboard/subscribe.php">
                        <div class="col-xl-12 col-md-12 col-xs-12">
                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Your Name" id="name"
                                    name="username" required>
                            </div>

                        </div>
                        <div class="col-xl-12 col-md-12 col-xs-12">
                            <div class="form-group">

                                <input type="email" class="form-control" placeholder="Enter email" id="email"
                                    name="email" required>
                            </div>

                        </div>
                        <div class="col-xl-12 col-md-12 col-xs-12">

                            <button type="submit" class="btn btn-danger">Submit</button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br />
    <div class="container-fluid" style="background: #000; text-align: center; color: #fff; padding: 40px;">
        <p style="color: #fff">Copyright 2020</p>
        <!--
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

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

.fa-pinterest {
  background: #cb2027;
  color: white;
}

.fa-snapchat-ghost {
  background: #fffc00;
  color: white;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}

.fa-skype {
  background: #00aff0;
  color: white;
}

.fa-android {
  background: #a4c639;
  color: white;
}

.fa-dribbble {
  background: #ea4c89;
  color: white;
}

.fa-vimeo {
  background: #45bbff;
  color: white;
}

.fa-tumblr {
  background: #2c4762;
  color: white;
}

.fa-vine {
  background: #00b489;
  color: white;
}

.fa-foursquare {
  background: #45bbff;
  color: white;
}

.fa-stumbleupon {
  background: #eb4924;
  color: white;
}

.fa-flickr {
  background: #f40083;
  color: white;
}

.fa-yahoo {
  background: #430297;
  color: white;
}

.fa-soundcloud {
  background: #ff5500;
  color: white;
}

.fa-reddit {
  background: #ff5700;
  color: white;
}

.fa-rss {
  background: #ff6600;
  color: white;
}
</style>
<h5>Social Media</h5>


<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
-->
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

</body>

</html>
