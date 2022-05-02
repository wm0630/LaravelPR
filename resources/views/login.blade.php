<?php
    // require_once('includes/session.php');
    // require_once('includes/config.php');
    // if(isset($_SESSION['email'])){
    //     header("Location: account.php");
    // }else{

    // }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM profiles WHERE email='$email'";
        $Rep = $conn->query($sql);
        if($Rep->num_rows > 0){
            while($row = $Rep->fetch_assoc()){
                $dbPass = $row['password'];
                if($password === $dbPass){
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $row['phone'];
                    echo('
                        <script>
                            
                            window.location.replace("account.php");
                        </script>
                    ');
                }
            }
        }else if($Rep->num_rows <= 0){
            echo('
                <script>
                    alert("User do not exist");
                </script>
            ');
            
        }
    }else{
        
    }
     if(isset($_POST['resetemail'])){
        $email = $_POST['resetemail'];
        $sql = "SELECT * FROM profiles WHERE email='$email'";
        $response = $conn->query($sql);
        if($response->num_rows > 0){
            while($rows = $response->fetch_assoc()){
                $id = $rows['id'];
                $emails = $rows['email'];
                $token = rand(10,10000000);
                $link = "https://cdn.coinstack.com.ng/staging/dashboard/forgot-password.php?token=".$token;
                $sqlis = "INSERT INTO tokens (`id`, `token`, `email`) VALUES ('$id', '$token', '$emails')";
                $conn->query($sqlis);
                $to = $emails;
                $subject = "Password Reset";
                $message = "
                <html>
                <head>
                <title>Password Reset</title>
                </head>
                <body>
                <p>Click the link below to reset your password</p>
                <a style='background: #000; color: #fff; padding: 10px; border-radius: 10px; width: auto; height: auto;' href='".$link."'>Reset Password</a>
                <p>If the link above is not clickable, copy and paste this link into your browser</p>
                <p>".$link."</p>
                </body>
                </html>
                ";
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From: <NoReply@coinstack.com.ng>';
                
                if(mail($to,$subject,$message,$headers)){
                    echo('
                        <script>
                            alert("Confirmation email sent to your mail. Please check spam box incase you cant find it in your primary mail box.");
                            window.location.replace("/login");
                        </script>
                    ');
                }
            }
        }else if($response->num_rows <= 0){
            echo('
                <script>
                    alert("No account is associated with the email provided");
                </script>
            ');
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

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="/plans/css/style.css">
        <style>
            select{
                border-radius: 20px;
            }
        </style>
    </head>
    <body class="hero-anime">	

        <div class="navigation-wrap bg-light start-header start-style">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-md navbar-light">
                        
                            <a class="navbar-brand" href="/index"><img width="150px" src="images/logo.png" alt=""></a>	
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto py-4 py-md-0">
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link" href="/" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                                        
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link" href="/misc">Plans and Pricing</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link" href="/designIdea">Design Ideas</a>
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
                                     <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger" style="border: 0px; background: #f4b242 !important; padding: 5px !important; color: white !important;">
                                        <a style="color: white !important;" class="nav-link" href="/misc">Start Project</a>
                                    </li>
                                    <?php
                                        if(isset($_SESSION['email'])){
                                            
                                            echo('
                                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 btn btn-danger" style="background: transparent; border: 2px solid #f4b242; padding: 5px !important; color: #f4b242 !important;">
                                                    <a data-toggle="dropdown" style="color: #f4b242 !important;" class="nav-link" href="#menu">'.$fname." ".$lname.'</a>
                                                    <ul class="dropdown-menu">
                                                       <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                            <a class="nav-link" href="#'.$fname.'"><b>'.$fname." ".$lname.'</b><br />'.$email.'</a>
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
                                        }else if(!isset($_SESSION['email'])){
                                            echo('
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
        <div class="container">
          <div class="row">
          
          <div class="col-xl-3 col-md-3 col-xs-12">
          </div>
            <div class="col-xl-6 col-md-6 col-xs-12" style="padding: 20px; margin-top: 30px; border: 2px solid #eee; box-shadow: 1px 1px 11px 1px #eee;">
              <h3>Hi, welcome</h3>              
              <p>Login to your account</p>
            <form action="" method="POST">              
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" required>
                </div>
                
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd" required>
                </div>                 
                    <div style="text-align: center;">
                
                <button type="submit" class="btn btn-danger center" style="width: 100%; background: #f4b242;">Submit</button><br /><br /><br />
                <p>Don't have an account? <a href="/index">Get Started</a></p><br />
                
                </div><br />
                <center>
                <p>Forget password?</p>
                <button style="background: #f4b242;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Reset Password</button>
                </center>
            </form>
            </div>
            <div class="col-xl-3 col-md-3 col-xs-12">
            </div>
          </div>
        </div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div class="modal-body">
          <form method="POST" action="">
        <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="resetemail" class="form-control" placeholder="Enter email" id="resetemail" required>
                </div>
                 <button type="submit" class="btn btn-danger center" style="width: 100%;">Continue</button><br /><br /><br />
             
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

 <div class="container-fluid" style="background: #000; text-align: center; color: #fff; padding: 40px;">
            <p style="color: #fff">Copyright 2020</p>

          </div>
        <script src="/plans/js/app.js" type="text/javascript"></script>
        <div style="bottom: 0; right: 0; position: fixed; z-index: 99999999999" id="google_translate_element"></div>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
    </body>
</html>