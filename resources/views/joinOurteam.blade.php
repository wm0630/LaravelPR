<?php
    if(isset($_FILES['cvupload']['name'])){
        
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $jobopening = $_POST['jobopening'];
        $experience = $_POST['experience'];
        $status = $_POST['status'];
        /* Getting file name */
        $filename = $_FILES['cvupload']['name'];
     
        /* Location */
        $location = "dashboard/upload/".$filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
     
        /* Valid extensions */
        $valid_extensions = array("jpg","jpeg","png", "pdf", "doc", "docx", "ppt", "pptx");
     
        $response = 0;
        /* Check file extension */
        if(in_array(strtolower($imageFileType), $valid_extensions)) {
           /* Upload file */
           if(move_uploaded_file($_FILES['cvupload']['tmp_name'],$location)){
              $cvlink = "http://localhost/quiz/".$location;
              $msg = "Fullname - ".$fullname." | Email - ".$email." | Experience - ".$experience." | Job Opening - ".$jobopening." | Status - ".$status." | CV Download link - ".$cvlink;

                // use wordwrap() if lines are longer than 70 characters
                
                
                // send email
                if(mail("omonicksonowoeye@gmail.com","New Join Request",$msg)){
                    echo('
                        <script>alert("Request sent");</script>
                    ');
                }
           }
        }
     
        echo $response;
       // exit;
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
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="/main/css/style.css">
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
                        
                            <a class="navbar-brand" href="/"><img style="width: 200px !important; height: auto !important;" src="/images/logo.png" alt=""></a>	
                            
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto py-4 py-md-0">
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link" href="/" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                                        
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
       
        
          <br /><br /><br /><br /><br /><br />
          
          <div class="container">
            <h3>Join Our Team</h3><br /><br />
              <div class="row">                 
                  <div class="col-xl-12 col-md-12 col-xs-12">
                  <form action="" method="POST" enctype="multipart/form-data">
                                                            
                                    <div class="form-group">
                                     <label>Choose relevant job opening</label>
                                      <select type="text" class="form-control" placeholder="Your Name" id="name" name="jobopening" required>
                                          <option value="Interior Design">Interior Design</option>
                                          <option value="Architect">Architect</option>
                                      </select>
                                    </div>  
                                    <div class="form-group">
                                     <label>What’s your employment status?</label>
                                      <select type="text" class="form-control" placeholder="Your Name" id="name" name="status" required>
                                          <option value="Student">Student</option>
                                          <option value="Employed">Employed</option>
                                          <option value="Unemployed">Unemployed</option>
                                          <option value="Other">Other</option>
                                      </select>
                                    </div>  
                                    <div class="form-group">
                                     <label>Do you have previous experience?</label>
                                      <select type="text" class="form-control" placeholder="Your Name" id="name" name="experience" required>
                                          <option value="Yes">Yes</option>
                                          <option value="No">No</option>
                                      </select>
                                    </div>  
                                 
                                <div class="form-group">
                                    <label>Full Name</label>
                                  <input type="text" class="form-control" placeholder="Full Name" id="phone" name="fullname" required>
                                </div>                      
                                <div class="form-group">
                                 <label>Email</label>
                                  <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required>
                                </div>                             
                             
                                           
                                <div class="form-group">
                                    <label>Upload CV</label>
                                  <input type="file" class="form-control" placeholder="Phone" id="phone" name="cvupload" required>
                                </div>    
                                <input style="width: 250px; border-radius: 10px !important; padding: 10px !important;background: #f4b242;" value="Send" type="submit" class="btn btn-danger">
                                                        
                         
                    
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
      
    </body>
</html>