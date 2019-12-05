
<?php
/* Displays user information and some useful messages */
session_start();
require '../Business_Logins/db.php';
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: ../Business_Logins/error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
$result = "SELECT * from users where email='$email'";
$info=mysqli_query($mysqli,$result);
?>
<!DOCTYPE html>
<html>
<head>
   <!-- Compiled and minified CSS -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <title>Business</title>
   <style>
      body 
    {
      background: linear-gradient(110deg, #809fff 70%, #99b3ff 70%);
      background-repeat: no-repeat;
      font-family: 'Cabin', sans-serif;
    }
     .logo{
     font-family: 'Pacifico', cursive;
   }
   .context{
     background: linear-gradient(60deg, #809fff 70%, #99b3ff 70%);
      background-repeat: no-repeat;
   }
   .docs{
    font: Pacifico;
     font-size: 20px;
      color: white;
   }
   </style>
</head>
<body>
     
     <!--Nav bar start-->
    <div class="navbar-fixed">

        <nav class="indigo">
             
            
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo logo">Business Bash</a>
                    <a href="#" class="right hide-on-small-only"></a>
                    <a href="" data-target="mobile-nav" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                    <!--  username diplay -->
                     <ul class="right hide-on-med-and-down">

                         <li>
                            <a class='dropdown-trigger3' href='#' data-target='dropdown3'><i class="fa fa-user"></i> <span class="white-text">Hello <?php  echo $first_name;?> </span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown3' class='dropdown-content' >

                              
                              <li><a href="#!" style="color: indigo"> <?php  echo $email  ?> </a></li>
                              <li class="divider" tabindex="-1"></li>
                              <li><a href="../Business_Logins/logout.php" style="color: indigo">Logout</a></li>
                              <li class="divider" tabindex="-1"></li>
                          </ul>
                        </li>
                    </ul>
                    <ul class="right hide-on-med-and-down">

                         <li>
                            <a class='dropdown-trigger1' href='#' data-target='dropdown1'><i class="fa fa-shopping-cart"></i> <span class="white-text">Set up company page</span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown1' class='dropdown-content' >

                              <li><a href="../Operators/Operator_company_setup_license/business_operator.php" style="color: indigo">Tour Operators</a></li>
                              <li class="divider" tabindex="-1"></li>
                              
                          </ul>
                        </li>
                    </ul>
                </div>
            
        </nav>
    </div>
    
    <ul class="sidenav red darken-2" id="mobile-nav">
        <li>
            <a href="dashboard.php"><i class="fa fa-home"></i><span class="white-text"> Home </span></a>
        </li>
        <li>
                            <a class='dropdown-trigger4' href='#' data-target='dropdown4'><i class="fa fa-user"></i> <span class="white-text">Hello <?php  echo $first_name;?> </span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown4' class='dropdown-content' >

                              
                              <li><a href="#!" style="color: indigo"> <?php  echo $email  ?> </a></li>
                              <li class="divider" tabindex="-1"></li>
                              <li><a href="../Business_Logins/logout.php" style="color: indigo">Logout</a></li>
                              <li class="divider" tabindex="-1"></li>
                          </ul>
                        </li>
        <li>
            <a class='dropdown-trigger2' href='#' data-target='dropdown2'><i class="fa fa-shopping-cart"></i> <span class="white-text"> Build Company Page</span><i class="material-icons right">arrow_drop_down</i></a>

            <!-- Dropdown Structure -->
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="../Operators/Operator_company_setup_license/business_operator.php">Tour Operators</a></li>
                <li class="divider" tabindex="-1"></li>
                
           </ul>
        </li>



       
        </ul>
    <!--Nav bar End-->
   <div class="row">
    <div class="col s12 m6">
      <div class="card indigo darken-1">
        <div class="card-content white-text">
          <span class="card-title">Company page</span>
          <p>Manage your Company Page</p>
        </div>
        <?php while($row=mysqli_fetch_assoc($info)){
           if($row['page']=='1'){?>
            <div class="card-action">
          <a class="tooltipped1" data-position="top" data-tooltip="TL for Business Page is LIVE !" href="../Operators/Operator_company_page_build/user.php">View page</a>
          <a class= "modal-trigger" data-target="modal1" href="#modal1"><i class="fa fa-share-alt"></i></a>
          <a href="../Operators/Operator_company_page_build/update_operator.php" class="tooltipped2" data-position="top" data-tooltip="Update your page" ><i class="fa fa-edit"></i></a>
          </div>
           <?php }
         }?>
        
      </div>
    </div>
 
  </div>
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Share your page!!!</h4>
      <p>https://www.tourlancers.com/beta/business/Operators/Operator_company_page_build/user.php?email=<?php echo $_SESSION['email']; ?></p>
    </div>
  </div>
   <div class="context" style="background: linear-gradient(70deg, #ff6666 70%, #ff8080 70%);
      background-repeat: no-repeat;">
     <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">business_center</i>Why TL for Business ?</div>
      <div class="collapsible-body"><span class="docs">Tourlancers ties up with the best Travel services of India and helps them to grow. We understand that your company needs a platform to showcase the works and how the company stands out in the real-world. Join the community. Build the company pages and you are all done. Tourlancers provides you with the best in class deals for your business. We provide you with the most verified and simplified system to manage your business online.Our system is designed in an user friendly way so that you experience a smoother flow. You can scale up your online exposure with our rich platform. Your business is expected to grow 3X faster with our unique features. Tourlancers comes up with easy finances. We have secure payment gateways and fully automated booking system to name a few. Here at Tourlancers, we ensure you with our motto, "Let's travel together</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">live_help</i>How it works ?</div>
      <div class="collapsible-body"><span class="docs">Once you signup with us for your business account, you can customize your business profile with all the details you wish to put in it. Followed by that we will have a telephonic conversation . Once done, you can set up your payment methods. You can monitor your customers and their ratings. Also you can communicate with your customers easily with our dashboard. Last with not the list our team support is always online for you 24x7.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">live_help</i>How do I build a Company page ?</div>
      
          <section class="section section-icons center collapsible-body">
     <div class="container">
 <div class="row" style=" background-color: transparent">

      <div class="col s12 m4">
        <!-- Promo Content 1 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%); ">
          <i class="fa fa-mouse-pointer large red-text"></i>
                        <h4><a style="color:black;"  href="">Click "Create Company Page"</a></h4>
                        <p> If you wish to build our own company page, go on. we will guide you in each and every step.
                       </p>
                        </div>
      </div>
      <div class="col s12 m4">
        <!-- Promo Content 2 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);"><i class="material-icons large red-text">done</i>
                        <h4><a style="color:black;"  href="">Verify your account</a></h4>
                        <p>We assure your security. Be secured. Feel Secured. Build your company with us.
                       </p>
                        </div>
      </div>
      <div class="col s12 m4">
        <!-- Promo Content 3 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);"><i class="material-icons large red-text">contact_mail</i>
                        <h4><a style="color:black;"  href="">Add details</a></h4>
                        <p>It's free and will be. You are one step to become successful.
                       </p>
                        </div>
      </div>

    </div>
</div>
</section>
     
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">check_circle</i>Terms and conditions</div>
      <div class="collapsible-body"><span class="docs">Your use of the Website and/or Application is an acknowledgment that you have reviewed the Terms and Conditions, agree to comply with and be legally bound thereby. These terms and conditions govern your access to and use of the Website and/or Application and the Services. If you do not agree to these terms and conditions, you must refrain from using the Website and/or Application and Services. Tourlancers reserves the right to modify these Terms at any time in accordance with this provision. If we make changes to these Terms, we will post the revised Terms on the Tourlancers Platform. <br>By using this website or partners you hereby acknowledge and agree that Tourlancers is not a hotel/tour operator owner and has no control over the conduct or behaviour of the channel partners or the quality,  fitness or the suitability of the services provided by the channel partners. Tourlancers disclaims any and all liablities in this regard.</span></div>
    </li>
  </ul>
   </div>
          <footer class="section grey darken-1 white-text center" 
          style="background: url('../img/tourlancers.png') center no-repeat   ; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
     <section class="section section-follow white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h4>Follow Tourlancers</h4>
                        <p>Follow us on social media for special offers</p>

                          <a href="https://www.linkedin.com/company/tourlancers" class="white-text">
                                  <i class="fab fa-linkedin fa-4x"></i>
                          </a>

                    </div>
                </div>
            </div>

           </section>

          <!--Social Media follow End-->
          <!--footer-->
      <section class="section  white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12 m4">
                      <h5>Information</h5>
                      <p>About us | Our products | Press Release</p>
                      <p>Customer Testimonial | Partner with Us </p>
                     </div>
                   <div class="col s12 m4">
                       <h5>Customer Care</h5>
                       <p>Support & FAQ | Term & Condition | Privacy Policy</p>
                       <p>User Agreement | Travel Agents</p>
                   </div>
                    <div class="col s12 m4">
                       <h5>Headquarters</h5>
                       <p>Kolkata, India</p>

                    </div>
                </div>
            </div>
        </section>


      <!--footer End-->
      <!--footer-->
    
            <p class="flow-text">Tourlancers &copy;2017-2018</p>
        </footer>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
         const sideNav=document.querySelector('.sidenav');
            M.Sidenav.init(sideNav,{});
           $('.dropdown-trigger1').dropdown();
       $('.dropdown-trigger2').dropdown();
       $('.dropdown-trigger3').dropdown();
       $('.dropdown-trigger4').dropdown();
        $('.collapsible').collapsible();
        $('.tooltipped1').tooltip();
        $('.tooltipped2').tooltip();
        $('.modal').modal();
  </script>
 
</body>
</html>