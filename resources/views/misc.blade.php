<html>
{{-- @include('dashboard.includes.session') --}}
{{-- @include('dashboard.includes.config') --}}

<?php
$_SESSION = array();
$_SESSION['email'] = '';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $pass = md5($_POST['password']);
    $phone = $_POST['phone'];
    $datestamp = date('Y-m-d');
    $checkDB = "SELECT * FROM profiles WHERE email='$email'";
    // $DBcheckresult = $conn->query($checkDB);

    if ($DBcheckresult->num_rows > 0) {
    } elseif ($DBcheckresult->num_rows <= 0) {
        $sessionID = rand(10, 10000);
        echo '
                    <script>
                        localStorage.setItem("sessionID", "' .
            $sessionID .
            '");
                        localStorage.setItem("userID", "' .
            $email .
            '");
                    </script>
                ';
        $insert = "INSERT INTO profiles (`firstname`, `lastname`, `email`, `phone`, `password`, `joindate`, `gender`) VALUES ('$fname', '$lname', '$email', '$phone', '$pass', '$datestamp', '$gender')";
        // $conn->query($insert);
        // $misc = "INSERT INTO misc (`sessionid`, `userid`, `room`, `roomtwo`, `bedroom`, `pilllow`, `livingroom`, `material`, `office`, `light`, `chair`, `dimension`, `others`, `subscription`, `roompic`, `amount`, `datestamp`, `packagedetails`, `status`) 
        //         VALUES ('$sessionID', '$email', 'No Data', 'No Data','No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', '0', '$datestamp', 'No Data', 'Not Paid')";
        // $conn->query($misc);
        $_SESSION['email'] = $email;
        $_SESSION['sessionid'] = $sessionID;
        $_SESSION['phone'] = $phone;
    }
} elseif (isset($_GET['email'])) {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $fname = $_GET['firstname'];
        $lname = $_GET['lastname'];
        $gender = $_GET['gender'];
        $pass = md5($_GET['password']);
        $phone = $_GET['phone'];
        $datestamp = date('Y-m-d');
        $checkDB = "SELECT * FROM profiles WHERE email='$email'";
        // $DBcheckresult = $conn->query($checkDB);

        if ($DBcheckresult->num_rows > 0) {
        } elseif ($DBcheckresult->num_rows <= 0) {
            $sessionID = rand(10, 10000);
            echo '
                    <script>
                        localStorage.setItem("sessionID", "' .
                $sessionID .
                '");
                    </script>
                ';
            $insert = "INSERT INTO profiles (`firstname`, `lastname`, `email`, `phone`, `password`, `joindate`, `gender`) VALUES ('$fname', '$lname', '$email', '$phone', '$pass', '$datestamp', '$gender')";
            // $conn->query($insert);
            $misc = "INSERT INTO misc (`sessionid`, `userid`, `room`, `roomtwo`, `bedroom`, `pilllow`, `livingroom`, `material`, `office`, `light`, `chair`, `dimension`, `others`, `subscription`, `roompic`, `amount`, `datestamp`, `packagedetails`, `status`) 
                VALUES ('$sessionID', '$email', 'No Data', 'No Data','No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', '0', '$datestamp', 'No Data', 'Not Paid')";
            // $conn->query($misc);
            $_SESSION['email'] = $email;
            $_SESSION['sessionid'] = $sessionID;
            $_SESSION['phone'] = $phone;
        }
    } else {
        echo '
                    <script>
                        window.location.replace("/index");
                    </script>
                ';
    }
} elseif (isset($_SESSION['email'])) {
    $sessionID = rand(10, 10000);
    $email = $_SESSION['email'];
    $datestamp = date('Y-m-d');
    $misc = "INSERT INTO misc (`sessionid`, `userid`, `room`, `roomtwo`, `bedroom`, `pilllow`, `livingroom`, `material`, `office`, `light`, `chair`, `dimension`, `others`, `subscription`, `roompic`, `amount`, `datestamp`, `packagedetails`, `status`) 
                VALUES ('$sessionID', '$email', 'No Data', 'No Data','No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', 'No Data', '0', '$datestamp', 'No Data', 'Not Paid')";
    // $conn->query($misc);
    echo '
                    <script>
                        localStorage.setItem("sessionID", "' .
        $sessionID .
        '");
                        localStorage.setItem("userID", "' .
        $email .
        '");
                    </script>
                ';
}
?>

<head>
    <style>
        li {
            display: block;
            padding: 10px;
            border-bottom: 2px solid #eee;
            text-align: center;
        }

        .steps img {
            width: auto;
            height: 250px;
            padding: 10px;
        }

        .col-4 {
            height: 200px;
        }

        .steps {
            padding-top: 120px;
        }

    </style>
    <title>Get Started</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link type="text/css" rel="stylesheet" href="/plans/css/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script
        src="https://www.paypal.com/sdk/js?client-id=Abss9oDMfs47CrEgfdxoCC9rGunYouthGqVGhUSvNr3atCd-M-uAdshIwrPt8DEJ7HcBSwYXJriGVNld">
    </script>
    <link rel="stylesheet" type="text/css" href="/main/css/style.css">
</head>

<body class="hero-anime">
    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">

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
                                    <a class="nav-link" href="/" role="button" aria-haspopup="true"
                                        aria-expanded="false">Home</a>

                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/plans">Plans and Pricing</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/designIdeas">Design Ideas</a>
                                </li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/joinOurTeam">Join Our Team</a>
                                </li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger"
                                    style="border: 0px; background: #f4b242 !important; padding: 5px !important; color: white !important;">
                                    <a style="color: white !important;" class="nav-link"
                                        href="/misc">Start Project</a>
                                </li>
                                <?php
                                if (isset($_POST['email'])) {
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
                                } elseif (isset($_SESSION['email'])) {
                                    $email = $_SESSION['email'];
                                    $sql = "SELECT * FROM profiles WHERE email='$email'";
                                    // $Result = $conn->query($sql);
                                    // if ($Result->num_rows > 0) {
                                    //     while ($row = $Result->fetch_assoc()) {
                                    //         $fname = $row['firstname'];
                                    //         $lname = $row['lastname'];
                                    //         $gender = $row['gender'];
                                    //         $phone = $row['phone'];
                                    //         $joinDate = $row['joindate'];
                                    //         $userid = $row['id'];
                                    //     }
                                    // }
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
                                } elseif (!isset($_POST['email']) && !isset($_SESSION['email'])) {
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


    <div class="container">
    </div>




    <div id="package"
        style="text-align: center; position: fixed; top: 0; z-index: 999; background: #fff; padding: 40px; left: 0; height: 100%; width: 100%; bottom: 0; overflow-y: auto;">
        <h3>Select your pricing plan</h3>
        <p style="color: #fff;" id="emailid"><?php echo $_SESSION['email']; ?></p>
        <br /><br />
        <div class="row">
            <div class="col-xl-4 col-md-4 col-xs-12">
                <div class="card">
                    <div class="card-header center">
                        <h4>Premium</h4>
                        <h1><sup>$</sup> 75</h1>
                        <button style="background: #f4b242;" class="btn btn-primary" style="width: 80%" id="premium"
                            onclick="package(this)">Select Premium</button>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>One design concept for the room</li>
                            <li>Two design revisions</li>
                            <li>Five days to design delivery</li>
                            <li>Two 3D shots of your space design</li>
                            <li>Work 1:1 with a design expert</li>
                            <li>View your design in 3D</li>
                            <li>Ultra-Real 3D renders</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <h2>Premium Package</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-xs-12">
                <div class="card">
                    <div class="card-header center">
                        <h4>Multi-Room</h4>
                        <h1><sup>$</sup> 130</h1>
                        <button style="background: #f4b242;" id="multi-room" onclick="package(this)"
                            class="btn btn-primary" style="width: 80%">Select Multi-Room</button>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Two design concepts for the room</li>
                            <li>Unlimited design revisions</li>
                            <li>Eight days to design delivery</li>
                            <li>Five 3D shots of your space design</li>
                            <li>Work 1:1 with a design expert</li>
                            <li>View your design in 3D</li>
                            <li>Ultra-Real 3D renders</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <h2>Multi-Room</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-xs-12">
                <div class="card">
                    <div class="card-header center">
                        <h4>Customized</h4><br />
                        <h1><sup>Special</sup> Price</h1>
                        <button id="customized" style="background: #f4b242;" onclick="package(this)"
                            class="btn btn-primary" style="width: 80%">Select Customized</button>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>A full-service experience with a top-tier designer accordings</li>

                        </ul>
                    </div>
                    <div class="card-footer">
                        <h2>Customized Package</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container steps" id="stepOne">
        <h4>Tell us which room? Let's transform it</h4><br />
        <p>Give our designer an idea of your requirement</p>
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <div onclick="room(this)" id="1" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Living Room</p>
                        <img src="images/plans/6.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="room(this)" id="2" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Bedroom</p>
                        <img src="images/plans/1.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="room(this)" id="3" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Entry Way</p>
                        <img src="images/plans/3.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="room(this)" id="4" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Kid's Bedroom</p>
                        <img src="images/plans/4.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="room(this)" id="5" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Kitchen</p>
                        <img src="images/plans/5.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="room(this)" id="6" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Nursery</p>
                        <img src="images/plans/7.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="room(this)" id="7" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Dining Room</p>
                        <img src="images/plans/2.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="room(this)" id="8" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Home Office</p>
                        <img src="images/plans/8.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="room(this)" id="9" class="col-xl-4 col-md-4 col-xs-6 item-div">
                        <p>Others</p>
                        <img src="images/plans/9.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="showSub()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepTwo()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container steps" id="stepTwo">
        <div class="row">
            <h4>Which Bedroom are you most drawn to?</h4>
            <div class="col-12">
                <div class="row">
                    <div onclick="bedroom(this)" id="10" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/10.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="bedroom(this)" id="11" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/11.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="bedroom(this)" id="12" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/12.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="bedroom(this)" id="13" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/13.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="bedroom(this)" id="14" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/14.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="bedroom(this)" id="15" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/15.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="bedroom(this)" id="16" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/16.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="bedroom(this)" id="17" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/17.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="bedroom(this)" id="18" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/18.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="previousTwo()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepThree()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pillow -->
    <div style="display: none;" class="container steps" id="stepThree">
        <div class="row">
            <h4>Pick a pattern you will like on a throw pillow</h4>
            <div class="col-12">
                <div class="row">
                    <div onclick="pillow(this)" id="19" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/19.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="pillow(this)" id="20" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/20.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="pillow(this)" id="21" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/21.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="pillow(this)" id="22" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/22.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="pillow(this)" id="23" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/23.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="pillow(this)" id="24" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/24.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="pillow(this)" id="25" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/25.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="pillow(this)" id="26" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/26.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="pillow(this)" id="27" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/27.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="previousThree()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepFour()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Living Room -->
    <div style="display: none;" class="container steps" id="stepFour">
        <div class="row">
            <h4>Which living room do you like the most?</h4>
            <div class="col-12">
                <div class="row">
                    <div onclick="livingroom(this)" id="28" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/28.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="livingroom(this)" id="29" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/29.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="livingroom(this)" id="30" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/30.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="livingroom(this)" id="31" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/31.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="livingroom(this)" id="32" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/32.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="livingroom(this)" id="33" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/33.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="livingroom(this)" id="34" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/34.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="livingroom(this)" id="35" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/35.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="livingroom(this)" id="36" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/36.webp" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="previousFour()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepFive()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Materials -->
    <div style="display: none;" class="container steps" id="stepFive">
        <div class="row">
            <h4>Pick your favourite material</h4>
            <div class="col-12">
                <div class="row">
                    <div onclick="material(this)" id="brick" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Brick</p>
                        <img src="images/plans/brick.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="material(this)" id="marble" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Marble</p>
                        <img src="images/plans/marble.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="material(this)" id="concrete" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Concrete</p>
                        <img src="images/plans/concrete.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="material(this)" id="leather" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Leather</p>
                        <img src="images/plans/leather.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="material(this)" id="white-marble" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>White Marble</p>
                        <img src="images/plans/white-marble.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="material(this)" id="wood" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Wood</p>
                        <img src="images/plans/wood.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="material(this)" id="stone" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Stone</p>
                        <img src="images/plans/stone.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="material(this)" id="fabric" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Fabric</p>
                        <img src="images/plans/fabric.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="material(this)" id="stainless-steel" class="col-xl-4 col-md-4 col-xs-6 item-divs">
                        <p>Stainless Steel</p>
                        <img src="images/plans/stainless-steel.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="previousFive()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepSix()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Office -->
    <div style="display: none;" class="container steps" id="stepSix">
        <div class="row">
            <h4>Which office could you see yourself getting work done?</h4>
            <div class="col-12">
                <div class="row">
                    <div onclick="office(this)" id="37" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/37.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="office(this)" id="38" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/38.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="office(this)" id="39" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/39.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="office(this)" id="40" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/40.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="office(this)" id="41" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/41.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="office(this)" id="42" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/42.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="office(this)" id="43" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/43.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="office(this)" id="44" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/44.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="office(this)" id="45" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/45.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="previousSix()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepSeven()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Light -->
    <div style="display: none;" class="container steps" id="stepSeven">
        <div class="row">
            <h4>Which light fixture speaks to you?</h4>
            <div class="col-12">
                <div class="row">
                    <div onclick="light(this)" id="46" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/46.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="light(this)" id="47" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/47.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="light(this)" id="48" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/48.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="light(this)" id="49" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/49.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="light(this)" id="50" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/50.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="light(this)" id="51" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/51.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="light(this)" id="52" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/52.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="light(this)" id="53" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/53.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="light(this)" id="54" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/54.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="previousSeven()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepEight()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Chair -->
    <div style="display: none;" class="container steps" id="stepEight">
        <div class="row">
            <h4>If you had to pick a chair, which chair would you choose?</h4>
            <div class="col-12">
                <div class="row">
                    <div onclick="chair(this)" id="55" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/55.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="chair(this)" id="56" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/56.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="chair(this)" id="57" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/57.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="chair(this)" id="58" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/58.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="chair(this)" id="59" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/59.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="chair(this)" id="60" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/60.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div class="row">
                    <div onclick="chair(this)" id="61" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/61.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="chair(this)" id="62" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/62.jpg" width="100%" height="auto" />
                    </div>
                    <div onclick="chair(this)" id="63" class="col-xl-4 col-md-4 col-xs-6 item-divs">

                        <img src="images/plans/63.jpg" width="100%" height="auto" />
                    </div>
                </div>
                <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
                    class="row">
                    <div class="col-6">

                        <button onclick="previousEight()" style="float: left;" class="btn btn-secondary">
                            << Previous</button>

                    </div>
                    <div class="col-6">

                        <button onclick="stepNine()" style="float: right;background: #f4b242;"
                            class="btn btn-primary">Next >></button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Room details -->
    <div style="display: none; padding-top: 200px;" class="container steps" id="stepNine">
        <form method="post" action="#upload" enctype="multipart/form-data" id="myform">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-xs-12">
                    <p>Room Dimension's</p>
                    <input class="form-control" id="lenght" name="lenght" type="number" placeholder="Lenght">
                    <input class="form-control" id="width" name="width" type="number" placeholder="Width">
                    <p>Other Requirements</p>
                    <textarea id="otherrequirements" class="form-control" style="height: 100px"></textarea>
                </div>
                <div class="col-xl-6 col-md-6 col-xs-12">
                    <p>Room Picture/Layout</p>
                    <input type="file" id="roompic" accept="image/*" multiple>
                    <i>Upload supported file (Max - 15mb)</i>

                </div>
            </div>
        </form>
        <div style="position: fixed; z-index: 998; bottom: 0; background: rgb(225, 225, 225, 0.8); left: 0; width: 100%; height: auto; padding: 10px;"
            class="row">
            <div class="col-6">
                <button onclick="previousNine()" style="float: left;" class="btn btn-secondary">
                    << Previous</button>
            </div>
            <div class="col-6">
                <button onclick="checkoutDiv()" style="float: right;" class="btn btn-primary">Proceed to Checkout
                    >></button>
            </div>
        </div>

    </div>
    <br /><br /><br />
    <div class="container-fluid" style="background: #000; text-align: center; color: #fff; padding: 40px;">
        <p style="color: #fff">Copyright 2020</p>

    </div>
    <div id="loading"
        style="background: rgb(225, 225, 225, 0.8); position: fixed; top: 0; left: 0; width: 100%; height: 100%; padding-top: 120px; text-align: center; display: none; z-index: 999999999999;">
        <span class=" fa fa-spinner fa-spin" style="font-size: 100px;"></span>
    </div>
    <script type="text/javascript">
        sessionStorage.setItem("res", "no");
        var sessionid = sessionStorage.getItem("sessionID");

        function package(element) {
            $("#loading").fadeIn(300);
            var id = element.id;
            sessionStorage.setItem("package", id);
            $("#" + id).css("transform", "scale(0.8)");
            var email = document.getElementById("emailid").innerText;
            if (id === "premium") {
                sessionStorage.setItem("Max", "1");
                sessionStorage.setItem("Selected", "0");
                sessionStorage.setItem("startamount", "75");
            } else if (id === "multi-room") {
                sessionStorage.setItem("Max", "2");
                sessionStorage.setItem("Selected", "0");
                sessionStorage.setItem("startamount", "130");
            }
            if (id === "customized") {
                sessionStorage.setItem("Max", "2");
                sessionStorage.setItem("Selected", "0");
                sessionStorage.setItem("startamount", "500");
            }
            obj = {
                userid: sessionid,
                package: id,
                amount: sessionStorage.getItem("startamount")
            }
            $.ajax({
                type: "GET",
                url: "apis/update.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data) {
                    //alert("Success");
                    if (id === "customized") {
                        $("#package").fadeOut(300);
                        $("#stepOne").fadeOut(300);
                        $("#quoteDiv").fadeIn(400);
                        $("#loading").fadeOut(300);
                    } else {
                        $("#package").fadeOut(300);
                        $("#stepOne").fadeIn(300);
                        $("#loading").fadeOut(300);
                    }

                },
                error: function(error) {
                    //alert("An error occured");
                    if (id === "customized") {
                        $("#package").fadeOut(300);
                        $("#stepOne").fadeOut(300);
                        $("#quoteDiv").fadeIn(400);
                        $("#loading").fadeOut(300);
                    } else {
                        $("#package").fadeOut(300);
                        $("#stepOne").fadeIn(300);
                        $("#loading").fadeOut(300);
                    }
                }
            })
        }

        function stepTwo() {
            $("#stepOne").fadeOut(300);
            $("#stepTwo").fadeIn(300);
        }

        function previousTwo() {
            $("#stepTwo").fadeOut(300);
            $("#stepOne").fadeIn(300);
        }

        function stepThree() {
            $("#stepTwo").fadeOut(300);
            $("#stepThree").fadeIn(300);
        }

        function previousThree() {
            $("#stepThree").fadeOut(300);
            $("#stepTwo").fadeIn(300);
        }

        function stepFour() {
            $("#stepThree").fadeOut(300);
            $("#stepFour").fadeIn(300);
        }

        function previousFour() {
            $("#stepFour").fadeOut(300);
            $("#stepThree").fadeIn(300);
        }

        function stepFive() {
            $("#stepFour").fadeOut(300);
            $("#stepFive").fadeIn(300);
        }

        function previousFive() {
            $("#stepFive").fadeOut(300);
            $("#stepFour").fadeIn(300);
        }

        function stepSix() {
            $("#stepFive").fadeOut(300);
            $("#stepSix").fadeIn(300);
        }

        function previousSix() {
            $("#stepSix").fadeOut(300);
            $("#stepFive").fadeIn(300);
        }

        function stepSeven() {
            $("#stepSix").fadeOut(300);
            $("#stepSeven").fadeIn(300);
        }

        function stepEight() {
            $("#stepSeven").fadeOut(300);
            $("#stepEight").fadeIn(300);
        }

        function previousSeven() {
            $("#stepSeven").fadeOut(300);
            $("#stepSix").fadeIn(300);
        }

        function stepNine() {
            $("#stepEight").fadeOut(300);
            $("#stepNine").fadeIn(300);
        }

        function previousEight() {
            $("#stepEight").fadeOut(300);
            $("#stepSeven").fadeIn(300);
        }

        function previousNine() {
            $("#stepNine").fadeOut(300);
            $("#stepEight").fadeIn(300);
        }


        function room(element) {
            var Max = parseFloat(sessionStorage.getItem("Max"));
            var Selected = parseFloat(sessionStorage.getItem("Selected"));
            if (Selected >= Max) {
                alert("Sorry you can only choose maximum of " + Max + " design(s)");
                sessionStorage.setItem("res", "no");
                return false;
            } else if (Selected < Max) {
                sessionStorage.setItem("res", "yes");
                if (Selected == 0) {
                    var Selected = parseFloat(sessionStorage.getItem("Selected")) + parseFloat(1);
                    sessionStorage.setItem("Selected", Selected);
                    $("#loading").fadeIn(300);
                    var id = element.id;
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        room: id,
                        place: 1
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                            var getPackage = sessionStorage.getItem("package");
                            if (getPackage === "premium") {
                                return stepThree();
                            } else {

                            }
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);

                        }
                    })
                } else if (Selected == 1) {
                    var Selected = parseFloat(sessionStorage.getItem("Selected")) + parseFloat(1);
                    sessionStorage.setItem("Selected", Selected);
                    $("#loading").fadeIn(300);
                    var id = element.id;
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        room: id,
                        place: 2
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                            return stepThree();
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);

                        }
                    })
                }
            } else {
                alert("Sorry you can only choose maximum of " + Max + " design(s)");
                return false;
            }
        }



















        function bedroom(element) {
            var id = element.id;

            var item = sessionStorage.getItem(id);
            var bedroom = sessionStorage.getItem("bedroom");
            if (item === null) {
                if (bedroom === null) {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("bedroom", "1");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        bedroom: id + ".jpg",
                        position: "1"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "1") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("bedroom", "2");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        bedroom: id,
                        position: "2"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "2") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("bedroom", "3");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        bedroom: id,
                        position: "3"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "3") {
                    alert("Maximum of three can be selected");
                    $("#loading").fadeOut(300);

                    sessionStorage.setItem("res", "no");
                    return false;
                }
            } else if (item === "1") {
                var selected = parseFloat(sessionStorage.getItem("bedroom")) - parseFloat(1);
                $("#loading").fadeOut(300);
                if (selected <= 0) {
                    sessionStorage.setItem("bedroom", "null");
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                } else if (selected > 0) {
                    sessionStorage.setItem("bedroom", selected);
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                }

            }

        }





        function livingroom(element) {
            var id = element.id;

            var item = sessionStorage.getItem(id);
            var livingroom = sessionStorage.getItem("livingroom");
            if (item === null) {
                if (livingroom === null) {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("livingroom", "1");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        livingroom: id + ".jpg",
                        position: "1"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (livingroom === "1") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("livingroom", "2");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        livingroom: id,
                        position: "2"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (livingroom === "2") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("livingroom", "3");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        livingroom: id,
                        position: "3"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (livingroom === "3") {
                    alert("Maximum of three can be selected");
                    $("#loading").fadeOut(300);

                    sessionStorage.setItem("res", "no");
                    return false;
                }
            } else if (item === "1") {
                var selected = parseFloat(sessionStorage.getItem("livingroom")) - parseFloat(1);
                $("#loading").fadeOut(300);
                if (selected <= 0) {
                    sessionStorage.setItem("livingroom", "null");
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.1)");
                } else if (selected > 0) {
                    sessionStorage.setItem("livingroom", selected);
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                }

            }

        }













        /*
        
        function livingroom(element){
            $("#loading").fadeIn(300);
            var id = element.id;
            $("#" + id).attr("style", "transform: scale(0.8)");
            var email = document.getElementById("emailid").innerText;
            obj = {
                userid: sessionid,
                livingroom: id
            }
            $.ajax({
                type: "GET",
                url: "apis/update.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data){
                    //alert("Success");
                    $("#loading").fadeOut(300);
                },
                error: function(error){
                    //alert("An error occured");
                    $("#loading").fadeOut(300);
                }
            })
        }
        */
        /*
        function pillow(element){
            $("#loading").fadeIn(300);
            var id = element.id;
            $("#" + id).attr("style", "transform: scale(0.8)");
            var email = document.getElementById("emailid").innerText;
            obj = {
                userid: sessionid,
                pillow: id
            }
            $.ajax({
                type: "GET",
                url: "apis/update.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data){
                    //alert("Success");
                    $("#loading").fadeOut(300);
                },
                error: function(error){
                    //alert("An error occured");
                    $("#loading").fadeOut(300);
                }
            })
        }
        
        */





        function pillow(element) {
            var id = element.id;

            var item = sessionStorage.getItem(id);
            var pillow = sessionStorage.getItem("pillow");
            if (item === null) {
                if (pillow === null) {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("pillow", "1");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        pillow: id + ".jpg",
                        position: "1"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (pillow === "1") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("pillow", "2");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        pillow: id,
                        position: "2"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (pillow === "2") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("pillow", "3");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        pillow: id,
                        position: "3"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (pillow === "3") {
                    alert("Maximum of three can be selected");
                    $("#loading").fadeOut(300);

                    sessionStorage.setItem("res", "no");
                    return false;
                }
            } else if (item === "1") {
                var selected = parseFloat(sessionStorage.getItem("pillow")) - parseFloat(1);
                $("#loading").fadeOut(300);
                if (selected <= 0) {
                    sessionStorage.setItem("pillow", "null");
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                } else if (selected > 0) {
                    sessionStorage.setItem("pillow", selected);
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                }

            }

        }





        /*
        
        
        function material(element){
            $("#loading").fadeIn(300);
            var id = element.id;
            $("#" + id).attr("style", "transform: scale(0.8)");
            var email = document.getElementById("emailid").innerText;
            obj = {
                userid: sessionid,
                material: id
            }
            $.ajax({
                type: "GET",
                url: "apis/update.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data){
                    //alert("Success");
                    $("#loading").fadeOut(300);
                },
                error: function(error){
                    //alert("An error occured");
                    $("#loading").fadeOut(300);
                }
            })
        }
        */










        function material(element) {
            var id = element.id;

            var item = sessionStorage.getItem(id);
            var material = sessionStorage.getItem("material");
            if (item === null) {
                if (material === null) {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("material", "1");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        material: id + ".jpg",
                        position: "1"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (material === "1") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("material", "2");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        material: id,
                        position: "2"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (material === "2") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("material", "3");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        material: id,
                        position: "3"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (material === "3") {
                    alert("Maximum of three can be selected");
                    $("#loading").fadeOut(300);

                    sessionStorage.setItem("res", "no");
                    return false;
                }
            } else if (item === "1") {
                var selected = parseFloat(sessionStorage.getItem("material")) - parseFloat(1);
                $("#loading").fadeOut(300);
                if (selected <= 0) {
                    sessionStorage.setItem("material", "null");
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                } else if (selected > 0) {
                    sessionStorage.setItem("material", selected);
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                }

            }

        }













        /*
        
        function office(element){
            $("#loading").fadeIn(300);
            var id = element.id;
            $("#" + id).attr("style", "transform: scale(0.8)");
            var email = document.getElementById("emailid").innerText;
            obj = {
                userid: sessionid,
                office: id
            }
            $.ajax({
                type: "GET",
                url: "apis/update.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data){
                    //alert("Success");
                    $("#loading").fadeOut(300);
                },
                error: function(error){
                    //alert("An error occured");
                    $("#loading").fadeOut(300);
                }
            })
        }
        */








        function office(element) {
            var id = element.id;

            var item = sessionStorage.getItem(id);
            var office = sessionStorage.getItem("office");
            if (item === null) {
                if (office === null) {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("office", "1");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        office: id + ".jpg",
                        position: "1"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (office === "1") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("office", "2");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        office: id,
                        position: "2"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (office === "2") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("office", "3");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        office: id,
                        position: "3"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (office === "3") {
                    alert("Maximum of three can be selected");
                    $("#loading").fadeOut(300);

                    sessionStorage.setItem("res", "no");
                    return false;
                }
            } else if (item === "1") {
                var selected = parseFloat(sessionStorage.getItem("office")) - parseFloat(1);
                $("#loading").fadeOut(300);
                if (selected <= 0) {
                    sessionStorage.setItem("office", "null");
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                } else if (selected > 0) {
                    sessionStorage.setItem("office", selected);
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                }

            }

        }





        /*
        
        function light(element){
            $("#loading").fadeIn(300);
            var id = element.id;
            $("#" + id).attr("style", "transform: scale(0.8)");
            var email = document.getElementById("emailid").innerText;
            obj = {
                userid: sessionid,
                light: id
            }
            $.ajax({
                type: "GET",
                url: "apis/update.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data){
                    //alert("Success");
                    $("#loading").fadeOut(300);
                },
                error: function(error){
                    //alert("An error occured");
                    $("#loading").fadeOut(300);
                }
            })
        }
        */











        function light(element) {
            var id = element.id;
            var item = sessionStorage.getItem(id);
            var bedroom = sessionStorage.getItem("light");
            if (item === null) {
                if (bedroom === null) {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("light", "1");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        light: id + ".jpg",
                        position: "1"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "1") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("light", "2");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        light: id,
                        position: "2"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "2") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("light", "3");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        light: id,
                        position: "3"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "3") {
                    alert("Maximum of three can be selected");
                    $("#loading").fadeOut(300);

                    sessionStorage.setItem("res", "no");
                    return false;
                }
            } else if (item === "1") {
                var selected = parseFloat(sessionStorage.getItem("light")) - parseFloat(1);
                $("#loading").fadeOut(300);
                if (selected <= 0) {
                    sessionStorage.setItem("light", "null");
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                } else if (selected > 0) {
                    sessionStorage.setItem("light", selected);
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                }

            }

        }
















        /*
        function chair(element){
            $("#loading").fadeIn(300);
            var id = element.id;
            $("#" + id).attr("style", "transform: scale(0.8)");
            var email = document.getElementById("emailid").innerText;
            obj = {
                userid: sessionid,
                chair: id
            }
            $.ajax({
                type: "GET",
                url: "apis/update.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data){
                    //alert("Success");
                    $("#loading").fadeOut(300);
                },
                error: function(error){
                    //alert("An error occured");
                    $("#loading").fadeOut(300);
                }
            })
        }
        */






        function chair(element) {
            var id = element.id;
            var item = sessionStorage.getItem(id);
            var bedroom = sessionStorage.getItem("chair");
            if (item === null) {
                if (bedroom === null) {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("chair", "1");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        chair: id + ".jpg",
                        position: "1"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "1") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("chair", "2");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        chair: id,
                        position: "2"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "2") {
                    $("#" + id).css("transform", "scale(0.8)");
                    $("#" + id).css("border", "2px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(0.8)");
                    sessionStorage.setItem("chair", "3");
                    sessionStorage.setItem(id, "1");
                    sessionStorage.setItem("res", "yes");
                    $("#" + id).attr("style", "transform: scale(0.8)");
                    var email = document.getElementById("emailid").innerText;
                    obj = {
                        userid: sessionid,
                        chair: id,
                        position: "3"
                    }
                    $.ajax({
                        type: "GET",
                        url: "apis/update.php",
                        data: obj,
                        dataType: "json",
                        contentType: "application/x-json",
                        success: function(data) {
                            //alert("Success");
                            $("#loading").fadeOut(300);
                        },
                        error: function(error) {
                            //alert("An error occured");
                            $("#loading").fadeOut(300);
                        }
                    })
                } else if (bedroom === "3") {
                    alert("Maximum of three can be selected");
                    $("#loading").fadeOut(300);
                    sessionStorage.setItem("res", "no");
                    return false;
                }
            } else if (item === "1") {
                var selected = parseFloat(sessionStorage.getItem("chair")) - parseFloat(1);
                $("#loading").fadeOut(300);
                if (selected <= 0) {
                    sessionStorage.setItem("chair", "null");
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                } else if (selected > 0) {
                    sessionStorage.setItem("chair", selected);
                    $("#" + id).css("transform", "scale(1)");
                    $("#" + id).css("border", "0px solid #f4b242");
                    $("#" + id + " > img").css("transform", "scale(1)");
                }

            }

        }















        /*
        $( ".item-divs" ).click(function() {
                
                var res = sessionStorage.getItem("res");
                if(res === "no"){
                    
                }else if(res === "yes"){
                    $( this ).css("transform", "scale(0.6)");
                    $( this ).css("opacity", "0.6");
                    $( this ).css("border", "2px solid #000");
                }
           
        });
        
        $( ".item-divs > img" ).click(function() {
           
                var res = sessionStorage.getItem("res");
                
                if(res === "no"){
                    
                }else if(res === "yes"){
                    $( this ).css("transform", "scale(0.6)");
                    $( this ).css("opacity", "0.6");
                    $( this ).css("border", "2px solid #000");
                }
           
        });
        $( ".item-div > img" ).click(function() {
           
                var res = sessionStorage.getItem("res");
                
                if(res === "no"){
                    
                }else if(res === "yes"){
                    
                    $( this ).css("transform", "scale(0.6)");
                    $( this ).css("opacity", "0.6");
                    $( this ).css("border", "2px solid #000");
                }
            
        
        });
        */

        function showSub() {
            $("#package").fadeIn(500);
        }

        function checkoutDiv() {
            var lenght = document.getElementById("lenght").value;
            var width = document.getElementById("width").value;
            if (lenght === "" || width === "") {
                alert("Please input room dimension");
                return false
            }
            var fd = new FormData();
            $("#loading").fadeIn(300);
            var files = $('#roompic')[0].files;
            // Check file selected or not
            if (files.length > 0) {
                fd.append('file', files[0]);
                $.ajax({
                    url: 'apis/update.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        //Send new Ajax
                        $("#loading").fadeIn(300);
                        //var id = element.id;
                        //$("#" + id).attr("style", "transform: scale(0.8)");
                        var email = document.getElementById("emailid").innerText;
                        obj = {
                            userid: sessionid,
                            lenght: document.getElementById("lenght").value,
                            width: document.getElementById("width").value,
                            otherrequirements: document.getElementById("otherrequirements").value
                        }
                        $.ajax({
                            type: "GET",
                            url: "apis/update.php",
                            data: obj,
                            dataType: "json",
                            contentType: "application/x-json",
                            success: function(data) {

                                $("#loading").fadeOut(300);
                                $("#paynow").fadeIn(300);
                                $("#stepNine").fadeOut(300);

                            },
                            error: function(error) {
                                //alert("An error occured");
                                $("#loading").fadeOut(300);
                                $("#paynow").fadeIn(300);
                                $("#stepNine").fadeOut(300);
                            }
                        })
                        //End of new Ajax
                    },
                });
                //alert("Success");
                $("#loading").fadeOut(300);
                $("#paynow").fadeIn(300);
                $("#stepNine").fadeOut(300);
                document.getElementById("attachPack").innerText = sessionStorage.getItem("package");
                document.getElementById("attachAmount").innerText = sessionStorage.getItem("startamount");
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        // alert("HEllo");
                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: sessionStorage.getItem("startamount")
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        // This function captures the funds from the transaction.
                        return actions.order.capture().then(function(details) {
                            // This function shows a transaction success message to your buyer.
                            //alert('Transaction completed by ' + details.payer.name.given_name);
                            obj = {
                                userid: sessionid,
                                status: "paid"
                            }
                            $.ajax({
                                type: "GET",
                                url: "apis/update.php",
                                data: obj,
                                dataType: "json",
                                contentType: "application/x-json",
                                success: function(data) {

                                },
                                error: function(error) {
                                    //alert("An error occured");
                                    $("#loading").fadeOut(300);
                                }
                            });
                            var getPack = sessionStorage.getItem("package");
                            if (getPack === "customized") {
                                $("#quoteDiv").fadeIn(400);
                            } else {
                                window.location.replace("account.php");
                            }
                        });
                    }
                }).render('#paypal-button-container');
                //This function displays Smart Payment Buttons on your web page.

            } else {
                alert("Please select a file.");
                $("#loading").fadeOut(300);
            }


        }

        function getCoupon() {
            var code = document.getElementById("couponcode").value;
            var userid = localStorage.getItem("userID");
            var obj = {
                code: code,
                user: userid
            };
            $.ajax({
                type: "GET",
                url: "apis/coupon.php",
                data: obj,
                dataType: "json",
                contentType: "application/x-json",
                success: function(data) {
                    var Data = data.Result[0];
                    var Message = Data.message;
                    if (Message === "None") {
                        alert("Coupon not valid")
                    } else if (Message === "Used") {
                        alert("You have used this coupon");
                    } else {
                        var amount = parseFloat(sessionStorage.getItem("startamount"));
                        var newAmount = parseFloat(Message);
                        var setAmount = (amount) - (newAmount);
                        sessionStorage.setItem("startamount", setAmount);
                        document.getElementById("attachPack").innerText = sessionStorage.getItem("package");
                        document.getElementById("attachAmount").innerText = sessionStorage.getItem(
                            "startamount");
                        alert("$ " + Message + " coupon validated");
                    }
                },
                error: function(error) {
                    //alert("An error occured");
                    $("#loading").fadeOut(300);
                }
            });
        }
    </script>

    <script src="/main/js/app.js" type="text/javascript"></script>
    <style>
        .goog-te-combo {
            width: 250px;
            border-radius: 10px;
            padding: 10px;
            background: #fff;
            color: #000;
        }

        option {
            width: 250px;
            border-radius: 10px;
            padding: 10px;
            background: #fff;
            color: #000;
        }

    </style>
    <div id="paynow"
        style="background: rgb(225, 225, 225, 1); position: fixed; top: 0; left: 0; width: 100%; height: 100%; padding-top: 120px; text-align: center; display: none; z-index: 999999; overflow-y: auto;">
        <div class="container">
            <div class="row">
                <div class="col-6" id="paypal-button-container"></div>
                <div class="col-6">
                    <div
                        style="border: 2px solid #e2e3e5; padding: 10px; border-radius: 10px; box-shadow: 1px 1px 11px 1px #333">
                        <h4>Your package -<span id="attachPack"></span></h4>
                        <h4>Amount - $ <span id="attachAmount"></span></h4>
                        <p>Have a coupon code?</p>
                        <input class="form-control" id="couponcode" placeholder="Enter Coupon code"><br /><br />
                        <button class="btn btn-danger" onclick="getCoupon()">Validate</button><br />
                        <div class="card">
                            <div class="card-header center">
                                <h4>Package Details</h4>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Two design concepts for the room</li>
                                    <li>Unlimited design revisions</li>
                                    <li>Eight days to design delivery</li>
                                    <li>Five 3D shots of your space design</li>
                                    <li>Work 1:1 with a design expert</li>
                                    <li>View your design in 3D</li>
                                    <li>Ultra-Real 3D renders</li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <h2>Multi-Room</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="quoteDiv"
        style="display: none !important; background: #fff; position: fixed; top: 0; left: 0; width: 100%; height: 100%; padding-top: 90px; text-align: center; z-index: 99999999; overflow-y: auto;"
        class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4 col-xs-12">
                <br /><br /><br /><br /><br /><br />
                <h3>Request a quote</h3>
                <h5>For customized plan</h5>
            </div>
            <div class="col-xl-8 col-md-8 col-xs-12">
                <div style="padding: 10px;">
                    <form action="account.php" method="POST" enctype="multipart/form-data">
                        <h3>Get a Quote</h3>
                        <br />
                        <div class="row">
                            <div class="form-group col-xl-6 col-md-6 col-xs-12">

                                <input
                                    style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red;"
                                    value="<?php echo $fname; ?>" type="text" class="form-control"
                                    placeholder="First Name" name="qfirstname" id="email" required>
                            </div>
                            <div class="form-group col-xl-6 col-md-6 col-xs-12">

                                <input
                                    style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red;"
                                    value="<?php echo $lname; ?>" type="text" class="form-control" name="qlastname"
                                    placeholder="Last Name" id="email" required>
                            </div>
                        </div>
                        <br /><br />
                        <div class="row">
                            <div class="form-group col-xl-6 col-md-6 col-xs-12">

                                <input
                                    style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red;"
                                    value="<?php echo $email; ?>" type="email" name="qemail" class="form-control"
                                    placeholder="Enter email" id="email" required>
                            </div>
                            <div class="form-group col-xl-6 col-md-6 col-xs-12">

                                <input
                                    style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red;"
                                    value="<?php echo $phone; ?>" type="number" name="qphone" class="form-control"
                                    placeholder="Phone" id="email" required>
                            </div>
                        </div>
                        <br /><br />
                        <div class="row">
                            <div class="form-group col-xl-6 col-md-6 col-xs-12">

                                <input
                                    style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red;"
                                    type="text" name="space" class="form-control" placeholder="What is your space"
                                    id="email" required>
                            </div>
                            <div class="form-group col-xl-6 col-md-6 col-xs-12">

                                <input
                                    style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red;"
                                    type="text" name="area" class="form-control" placeholder="Area" id="email"
                                    required>
                            </div>
                        </div>
                        <br /><br />
                        <div class="form-group col-xl-12 col-md-12 col-xs-12">

                            <textarea style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red; height: 90px;"
                                type="text" name="need" class="form-control" placeholder="What is your need"
                                id="email" required></textarea>
                        </div>
                        <br /><br />
                        <div class="form-group col-xl-12 col-md-12 col-xs-12">

                            <input
                                style="border: 0px; border-bottom: 2px solid #000; padding: 5px; border-radius: 0px; color: red;"
                                type="file" name="quotefile" class="form-control" placeholder="Area" id="quotefile"
                                required>
                        </div>
                        <br /><br />
                        <div class="form-group">
                            <input type="submit" value="Request Quote" name="area" class="form-control"
                                placeholder="Area" id="email" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
