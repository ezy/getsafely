<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
  
  // require a name from user
  if(trim($_POST['name']) === '') {
    $nameError =  'Forgot your name!'; 
    $hasError = true;
  } else {
    $name = trim($_POST['name']);
  }
  
  // need valid email
  if(trim($_POST['email']) === '')  {
    $emailError = 'Forgot to enter in your e-mail address.';
    $hasError = true;
  } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
    $emailError = 'You entered an invalid email address.';
    $hasError = true;
  } else {
    $email = trim($_POST['email']);
  }
    
  // we need at least some content
  if(trim($_POST['message']) === '') {
    $commentError = 'You forgot to enter a message!';
    $hasError = true;
  } else {
    if(function_exists('stripslashes')) {
      $comments = stripslashes(trim($_POST['message']));
    } else {
      $comments = trim($_POST['message']);
    }
  }
    
  // upon no failure errors let's email now!
  if(!isset($hasError)) {

    /*---------------------------------------------------------*/
    /* SET EMAIL YOUR EMAIL ADDRESS HERE                       */
    /*---------------------------------------------------------*/
    $emailTo = 'ezra@passionfruit.co.nz';
    $subject = 'Submitted message from '.$name;
    $sendCopy = trim($_POST['sendCopy']);
    $body = "Name: $name \n\nEmail: $email \n\nMessage: $comments";
    $headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

    mail($emailTo, $subject, $body, $headers);
        
        // set our boolean completion value to TRUE
    $emailSent = true;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Safely ensures your important digital documents get sent to the right people when you can't">
<meta name="keywords" content="safely, digital locker, online will">
<meta name="author" content="www.passionfruit.co.nz">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Safely | Insure your digital life</title>
<script src="js/html5shiv.js"></script>  <!-- support for HTML5 in IE8 -->
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/styleGreen.css" rel="stylesheet" type="text/css" media="all" id="styleChange" />
<link href="css/jquery.bxslider.css" rel="stylesheet" />
<link href="css/lightbox.css" type="text/css" rel="stylesheet" />
<link href="css/responsive.css" type="text/css" rel="stylesheet" />
<link href="css/custom.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>

	<!-- Header Start -->
     <header class="navbar navbar-default navbar-fixed-top">
      	<div class="container">
        	<div class="navbar-header">
          		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
          		</button>
          		<a class="navbar-brand" href="#"></a>
        	</div>
        	<div class="navbar-collapse collapse">
          		<ul class="nav navbar-nav navbar-right">
            		<li class="current"><a href="#sliderAnchor">Home</a></li>
            		<li><a href="#featuresAnchor">Features</a></li>
                <li><a href="#howItWorksAnchor">How It Works</a></li>
                <li><a href="#faqAnchor">Faq</a></li>
                <li><a href="#contactAnchor" style="padding-right:0px;">Contact</a></li>
            		<li><a href="#screenshotsAnchor">Screenshots</a></li>
                <!--  <li class="reg"><a href="http://go.getsafely.com/">Register</a></li> -->
          		</ul>
        	</div><!--/.navbar-collapse -->
      </div><!-- END Container -->
    </header><!-- END Header -->

    <!-- Slider Start -->
    <a class="anchor" id="sliderAnchor"></a>
    <section class="jumbotron">
    	<div class="container">

          <ul class="slides" style="display:none;">
            <li>
            <div class="col-lg-6">
              <img id="iphoneBlack" class="img-responsive" src="images/iphoneBlack.png" alt="iphone" />
              <img id="iphoneWhite" class="img-responsive" src="images/iphoneWhite.png" alt="iphone" />
            </div>
        		<div class="col-lg-6 slideText">
          		<h1><span>Safely</span> Insures how what's valuable to you gets passed on</h1>
          		<p>Safely gives you peace of mind about your most treasured information passing to the right people. Be Sure. Be secure. Be <span>Safely.</p><br/>
          		<a href="http://go.getsafely.com/" class="buttonSmall">Free sign up</a>
      		  </div>
          </li><!-- END Slide 1 -->
          <li>
            <div class="col-lg-6">
              <img id="ipadWhite" src="images/ipad-white.png" alt="ipad white" />
              <img id="ipadBlack" src="images/ipad.png" alt="ipad black" />
            </div>
            <div class="col-lg-5 col-lg-offset-1 slideText">
              <h1>Don't leave important info to chance</h1>
              <p>Safely makes sure that your personal files and secrets are passed onto the right people in the event that you’re unable to pass that information on yourself.</p>
              <a href="http://go.getsafely.com/" class="buttonSmall">Sign up today</a>
          </div>
          </li><!-- END Slide 2 -->
          <li style="text-align:center;">
            <h1><span>Safely</span> is essential</h1>
            <p>Know what’s happening to your most important and personal information today for tomorrow</p>
            <img id="bubbleGraphic" src="images/bubbleGraphic.png" alt="" />
            <ul id="slideThreeList">
              <li>Be sure</li>
              <li>Be secure</li>
              <li>Be Safely</li>
            </ul>
          </li>
        </ul> 

    	</div><!-- END Container -->

      <div class="sliderControls">
          <span id="slider-prev"></span>
          <span id="slider-next"></span>
        </div>

    </section><!-- END Slider -->

    <!-- sub-slider message Start -->
    <section id="subSliderMessage">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2>Safely secures your <span>important and personal</span> information and sends them on in the event of the unexpected.</h2>
            <p>Our system checks in with you over a timeframe of your choosing, and sends your loved ones your vault of files if you're unable to respond.</p>
          </div>
        </div>
      </div><!-- END container -->
    </section><!-- END Sub-slider message -->

    <!-- Features Start -->
    <a class="anchor" id="featuresAnchor"></a>
    <section id="features">
      <div class="container">
        <div class="row"><div class="col-lg-12"><h3>Features</h3></div><div class="col-lg-12"><img class="dividerWide" src="images/divider.png" alt=""></div></div>
        <div class="row">
          <div class="col-lg-4 featureItem">
            <div class="featureIcon" id="gearIcon"></div>
            <h4>Peace of mind</h4>
            <p>Rest easy knowing that if anything unexpected happens to you, the information, stories and secrets that you would like to be passed on will be securely managed and sent to the right people in your life</p>
          </div>
          <div class="col-lg-4 featureItem">
            <div class="featureIcon" id="addUserIcon"></div>
            <h4>Secure storage</h4>
            <p>Safely encrypts and securely stores your most important electronic documents ready to send on to the appropriate people in the event something unexpected occurs.</p>
          </div>
          <div class="col-lg-4 featureItem">
            <div class="featureIcon" id="cloudIcon"></div>
            <h4>Access Data Anywhere</h4>
            <p>Your files are stored securely online so you can manage their access from any device, anywhere, at any time. Pure convenience and complete control.</p>
         </div>
        </div><!-- END Row -->
        <div class="row">
          <div class="col-lg-4 featureItem">
            <div class="featureIcon" id="uploadIcon"></div>
            <h4>Quick &amp; Easy File Upload</h4>
            <p>Our systems allow you to create multiple file storage locations, which can be sent to the people you choose. Then you can upload all your important documents.</p>
          </div>
          <div class="col-lg-4 featureItem">
            <div class="featureIcon" id="messageIcon"></div>
            <h4>File Gatekeepers</h4>
            <p>This is an option for important time sensitive information. You may allow a trusted person such as a lawyer, accountant or advisor to manage sending your selected files to the people of your choice without being able to see what’s in those vaults.</p>
          </div>
          <div class="col-lg-4 featureItem">
            <div class="featureIcon" id="connectIcon"></div>
            <h4>Easy setup</h4>
            <p>Our intuitive interface ensures that you'll be up and running with just a few clicks. It's simple and uncomplicated.</p>
          </div>
        </div><!-- END Row -->
      </div><!-- END Container -->
    </section><!-- END Features -->

    <!-- Start Testimonials -->
    <!-- <section id="testimonials">
      <div class="container">
        <div class="row">
          <ul class="slides2">
            <li>
              <div class="col-lg-2"><img src="images/testimonialImage.png" alt="" /></div>
              <div class="col-lg-10">
              <h1><span>"</span>Safely is the most incredible app out there! Lorem ipsum dolor amet, consectetur adipiscing 
              elit. Aenean leo lectus sollicitudin convallis quis eget libero. Sed non risus eget dolor.</h1>
              <p><span><a href="#">John Doe</a></span> / Web Developer</p>
              </div>
            </li>
            <li>
              <div class="col-lg-2"><img src="images/testimonialImage.png" alt="" /></div>
              <div class="col-lg-10">
              <h1><span>"</span>Safely is the most incredible app out there! Lorem ipsum dolor amet, consectetur adipiscing 
              elit. Aenean leo lectus sollicitudin convallis quis eget libero. Sed non risus eget dolor.</h1>
              <p><span><a href="#">John Anderson</a></span> / Web Designer</p>
              </div>
            </li>
            <li>
              <div class="col-lg-2"><img src="images/testimonialImage.png" alt="" /></div>
              <div class="col-lg-10">
              <h1><span>"</span>Safely is the most incredible app out there! Lorem ipsum dolor amet, consectetur adipiscing 
              elit. Aenean leo lectus sollicitudin convallis quis eget libero. Sed non risus eget dolor.</h1>
              <p><span><a href="#">Peter Parker</a></span> / Web Designer</p>
              </div>
            </li>
          </ul>
        </div> **** END Row
      </div> **** END Container
    </section> **** END Testimonials -->

    <!-- Start How It Works -->
    <a class="anchor" id="howItWorksAnchor"></a>
    <section id="howItWorks">
      <div class="container">
        <div class="row"><div class="col-lg-12"><h3>How It Works</h3></div><div class="col-lg-12"><img class="dividerWide" src="images/divider.png" alt=""></div></div>
        <div class="row">
          <div class="col-lg-6 howItWorksGraphic">
            <img class="iphoneSmall" src="images/iphoneMagnify.png" alt="iphone" />
            <img class="dividerHalf" src="images/dividerHalf.png" alt="divider" />
          </div>
          <div class="col-lg-6">
            <h4>Register your account <span>anywhere, anytime.</span></h4><br/>
            <p>Register using our secure online registration form, and you'll be up and running in just 5 minutes. Safely is located 
              on the internet, so all you need to access your account is a connection to the internet
              and a web browser. We ensure that everything is secure and up to date, so you can have complete peace of mind
              that your files are safe.</p>
          </div>
        </div><!-- END Row -->
        <div class="transition1"></div>
        <div class="row">
          <div class="col-lg-6">
            <h4>Create a vault and <span>upload your important files</span></h4><br/>
            <p>Once you've registered you can create a file vault that will allow you to specify people who you would like to recieve those
              files in the event of you being unable to send them on yourself. You can also add a trusted individual to action the
              send of those files called a Gatekeeper. You can test out sending action using our simulate send option. 
              Then simply set how often you'd like the system to check in with you via email and
              Safely will take care of the rest for you.</p>
          </div>
          <div class="col-lg-6 howItWorksGraphic">
            <img class="iphoneSmall" src="images/iphoneMagnify2.png" alt="iphone" />
            <img class="dividerHalf" src="images/dividerHalf.png" alt="divider" />
          </div>
        </div><!-- END Row -->
        <div class="transition2"></div>
        <div class="row">
          <div class="col-lg-6 howItWorksGraphic">
            <img class="iphoneSmall" src="images/iphoneMagnify3.png" alt="iphone" />
            <img class="dividerHalf" src="images/dividerHalf.png" alt="divider" />
          </div>
          <div class="col-lg-6">
            <h4><span>Peace</span> of mind</h4><br/>
            <p>Once you've setup as many file vaults as you need and entered the email addresses of the people you want the files sent
              to, that's all you need to do. Safely will then check in with you by email every 1, 3, 6 or 12 months for a simple response
              which you can perform easily by clicking on a link in the email. And you can be totally secure in the knowledge that
              your digital life will be in good hands when you're no longer able to manage it yourself.</p>
          </div>
        </div><!-- END Row -->
      </div><!-- END Container -->
    </section><!-- END How It Works -->

    <!-- Start Promo box -->
    <section id="promoBox">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Sign up to our beta platform and try <span>Safely</span> for free.</h4>
            <p>We're currently letting people sign up to Safely for free to use the system and see what's in it for them.</p>
          </div>
          <div class="col-lg-6">
            <a href="http://go.getsafely.com" class="buttonLarge pull-right">Sign up today</a>
          </div>
        </div><!-- END Row -->
      </div><!-- END container -->
    </section><!-- END Promo box -->

    <!-- Start faq-->
    <section id="faq">
      <a class="anchor" id="faqAnchor"></a>
      <div class="container">
        <div class="row"><div class="col-lg-12"><h3>Faq</h3></div><div class="col-lg-12"><img class="dividerWide" src="images/divider.png" alt=""></div></div>
          <div class="row">
            <div class="col-lg-4">
              <ul class="tabs">
                <li><a href="#tab1">What do I need to use Safely?</a></li>
                <li><a href="#tab2">How do I make a payment?</a></li>
              </ul>
            </div>
            <div class="col-lg-8 tabContent">
              <div id="tab1">
                <p><span>What do I need to use Safely?</span><br/><br/> Safely will work on all your devices straight from your web browser.
                  Use Safely to upload your important electronic documents. Keep copies of your Will, passwords to your social media accounts and email,
                and anything else that you'd like to send on to people when you become unable to do so yourself.</p>
                <p>Safely is 100% secure, with all files uploaded being encrypted on our servers. This means that without our system,
                the files on the server are unreadable and wouldn't be of any use to a malicious attacker.</p>
              </div>
              <div id="tab2">
                <p><span>How do I make a payment?</span><br/><br/> Safely is currently in Beta and is completely free until our next round of development - 
                  allowing you the opportunity to check it out. The next phase of our development schedule is to implement different user access and 
                  accounts so people only have to pay for what they use. Be assured that all of our Beta account holders will get major perks though, and we'll 
                  also be looking for your feedback as to how much you'd be willing to pay. So rest easy, we want to make an outstanding product 
                  that people love to use.</p>
              </div>
              <div id="tab3">
              </div>
              <div id="tab4">
              </div>
            </div>
          </div><!-- END Row -->
      </div><!-- END Container -->
    </section><!-- END Faq -->

    <!-- Start Contact -->
    <section id="contact">
      <a class="anchor" id="contactAnchor"></a>
      <div class="container">
        <div class="row"><div class="col-lg-12"><h3>Get In Touch</h3></div></div>
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <p>Contact us using the form below.</p>
            <!-- Start contact form -->
            <form id="contactForm" method="post" action="index.php">

              <label style="display:none;" class="screen-reader-text">Name</label>
                <?php if($nameError != '') { ?>
                  <br /><span class="error"><?php echo $nameError;?></span> 
                <?php } ?>
              <input type="text" name="name" placeholder="Your name" class="contactInput requiredField" id="contactInputName" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>" />

              <label style="display:none;" class="screen-reader-text">Email</label> 
                <?php if($emailError != '') { ?>
                  <br /><span class="error"><?php echo $emailError;?></span>
                <?php } ?>
              <input type="text" name="email" placeholder="Your email" class="contactInput requiredField email" id="contactInputEmail" style="margin-right:0px" /><br/>

              <label style="display:none;" class="screen-reader-text">Message</label>
                <?php if($commentError != '') { ?>
                  <br /><span class="error"><?php echo $commentError;?></span> 
                <?php } ?>
              <textarea name="message" placeholder="Your message" class="contactMessage requiredField"></textarea>

              <input type="submit" name="submit" value="Send Message" class="buttonSmall" /><br/><br/>
              <input type="hidden" name="submitted" id="submitted" value="true" />

            </form>
            <!-- END Contact form -->
          </div>
        </div><!-- END Row -->
      </div><!-- END Container -->
    </section><!-- END Contact -->

    <!-- Start Screenshots -->
    <a class="anchor" id="screenshotsAnchor"></a>
    <section id="screenshots">
      <div class="container">
        <div class="row"><div class="col-lg-12"><h3>Screenshots</h3></div><div class="col-lg-12"><img class="dividerWide" src="images/divider.png" alt=""></div></div>
        <div class="row">
          <div class="col-lg-3">
              <div class="image">
              <img src="images/Register-thumb.png" class="screenshotImage" alt="Register" />
              <a href="images/Register.png" data-lightbox="screenshot1" title="Get registered quicklly, and easily" class="overlay"><img class="linkIcon" src="images/icons/linkIcon.png" alt="" /></a>
              </div>
            <h4>Easy registration</h4>
            <p>All you need is an email address, your mobile phone number and a password to register. So it's easy to get setup and get peace of mind.</p>
          </div>
          <div class="col-lg-3">
              <div class="image">
              <img src="images/Add-vault-thumb.png" class="screenshotImage" alt="Add vault" />
              <a href="images/Add-vault.png" data-lightbox="screenshot2" title="Then, add your vault" class="overlay"><img class="linkIcon" src="images/icons/linkIcon.png" alt="" /></a>
              </div>
            <h4>Create file vaults</h4>
            <p>You can create file vaults for specific files that need to be sent to specific people. Create as many as you need from your will, to video messages, accounts or the roll of cash hidden under your mattress.</p>
          </div>
          <div class="col-lg-3">
              <div class="image">
              <img src="images/Specify-send-thumb.png" class="screenshotImage" alt="Specify send" />
              <a href="images/Specify-send.png" data-lightbox="screenshot3" title="First, add your vault" class="overlay"><img class="linkIcon" src="images/icons/linkIcon.png" alt="" /></a>
              </div>
            <h4>Setup your vault</h4>
            <p>Once your vault is created you can choose who the files need to be sent to, who can be a gatekeeper, a brief description of the files, and how often you want the system to check in with you.</p>
          </div>
          <div class="col-lg-3">
              <div class="image">
              <img src="images/Add-files-thumb.png" class="screenshotImage" alt="Add vault" />
              <a href="images/Add-files.png" data-lightbox="screenshot4" title="First, add your vault" class="overlay"><img class="linkIcon" src="images/icons/linkIcon.png" alt="" /></a>
              </div>
            <h4>Secure your files</h4>
            <p>Upload as many files into the vault as necessary. The vault will display the file types and you'll be able to easily see which files and filetypes have been added to your vault for sending.</p>
          </div>
        </div><!-- END Row -->
      </div><!-- END Container -->
    </section><!-- END Screenshots -->

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 about">
            <a href="#" class="logoDark"></a><br/><br/>
            <p>Safely is a web service that gives you peace of mind about what happens to your most 
              important electronic information in the event that you're unable to send it on to the 
              people you love the most.<br> Be sure. Be secure. Be <span>Safely.</span>
            </p>
            <br>
            <ul class="socialIcons">
              <a href="http://go.getsafely.com/" class="buttonSmall">Free sign up</a>
            </ul>
          </div>
          <div class="col-lg-4 twitter">
            <h4>Quick links</h4>
            <ul>
              <li><a href="">Register</a></li>
              <li><a href="">Sign in</a></li>
            </ul>
          </div>
          <div class="col-lg-4 contact">
            <h4>Contact Info</h4>
            <p>Contact us any time, we're happy to assist.</p>
            <ul>
              <li><img src="images/icons/footerPhone.png" alt="phone icon" />NZ +64-21-079-7911</li>
              <li><img src="images/icons/footerPin.png" alt="pin icon" /><a href="mailto:hello@getsafely.com">hello@getsafely.com</a></li>
              <li><img src="images/icons/footerMail.png" alt="mail icon" />PO Box 345, Parnell, Auckland 1050, NZ.</li>
            </ul>
          </div>
        </div><!-- END Row -->
      </div><!-- END Container -->
    </footer><!-- END Footer -->
    
<!-- JavaScript file links -->
<script src="js/jquery.js"></script>			<!-- Jquery -->
<script src="js/bootstrap.min.js"></script>		<!-- bootstrap -->
<script src="js/jquery.bxslider.min.js"></script>  <!-- bxslider -->
<script src="js/tabs.js"></script> <!-- custom tab script -->
<script src="js/lightbox-2.6.min.js"></script>  <!-- lightbox -->
<script src="js/jquery.scrollTo.js"></script>  <!-- scollTo -->
<script src="js/jquery.nav.js"></script>  <!-- one page nav -->
<script src="js/respond.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/retina.js/1.3.0/retina.min.js"></script>

<script>
  "use strict";
  // ACTIVATE BXSLIDER (for slider section)
  $(document).ready(function(){
    $('.slides').fadeIn().bxSlider({
      auto: true,
      pager: false,
      pause: 9000,
      nextSelector: '#slider-next',
      prevSelector: '#slider-prev',
      nextText: '<img src="images/nextButton.png" alt="slider next" />',
      prevText: '<img src="images/prevButton.png" alt="slider prev" />',
      // triggers slider animations on slide change
      onSlideBefore: function(){
        $('.jumbotron img').addClass("fadeInReallyFast"); 
        $('.jumbotron h1').addClass("fadeInFast");  
        $('.jumbotron p').addClass("fadeInMed"); 
        $('.jumbotron .button').addClass("fadeInSlow"); 
        $('.jumbotron .buttonSmall').addClass("fadeInSlow"); 
        $('#emailInputSlider').addClass("fadeInSlow"); 

        setTimeout (function(){
        $('.jumbotron img').removeClass("fadeInReallyFast"); 
        $('.jumbotron h1').removeClass("fadeInFast");  
        $('.jumbotron p').removeClass("fadeInMed"); 
        $('.jumbotron .button').removeClass("fadeInSlow"); 
        $('.jumbotron .buttonSmall').removeClass("fadeInSlow"); 
        $('#emailInputSlider').removeClass("fadeInSlow"); 
        }, 1400);
      }
    });

    //Triggers slider animations on page load
    $(document).ready(function() {
        $('.jumbotron img').toggleClass("fadeInReallyFast"); 
        $('.jumbotron h1').toggleClass("fadeInFast"); 
        $('.jumbotron p').toggleClass("fadeInMed"); 
        $('.jumbotron .button').toggleClass("fadeInSlow"); 
        $('.jumbotron .buttonSmall').toggleClass("fadeInSlow"); 
        $('#emailInputSlider').toggleClass("fadeInSlow"); 

        setTimeout (function(){
        $('.jumbotron img').removeClass("fadeInReallyFast"); 
        $('.jumbotron h1').removeClass("fadeInFast");  
        $('.jumbotron p').removeClass("fadeInMed"); 
        $('.jumbotron .button').removeClass("fadeInSlow"); 
        $('.jumbotron .buttonSmall').removeClass("fadeInSlow"); 
        $('#emailInputSlider').removeClass("fadeInSlow"); 
        }, 1400);
    });

    //activate second bxslider (for testimonials section)
    $('.slides2').bxSlider({
      auto: true,
      pause: 9000,
      controls: false
    });
  });


// ACTIVATE ONE PAGE NAV 
$(document).ready(function() {
    $('.nav.navbar-nav.navbar-right').onePageNav();
});
</script>

<script>
"use strict";
// SCREENSHOT IMAGE HOVERS
$('.image').mouseover(function()
{
    $(".overlay", this).stop(true, true).fadeIn();
}); 

$('.image').mouseout(function()
{
    $(".overlay", this).stop(true, true).fadeOut();
}); 
</script>

<!-- CONTACT FORM -->
<script type="text/javascript">
  <!--//--><![CDATA[//><!--
  $(document).ready(function() {
    $('form#contactForm').submit(function() {
      $('form#contactForm .error').remove();
      var hasError = false;
      $('.requiredField').each(function() {
        if($.trim($(this).val()) == '') {
          var labelText = $(this).prev('label').text();
          $(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
          $(this).addClass('inputError');
          hasError = true;
        } else if($(this).hasClass('email')) {
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          if(!emailReg.test($.trim($(this).val()))) {
            var labelText = $(this).prev('label').text();
            $(this).parent().append('<span class="error">Sorry! You\'ve entered an invalid '+labelText+'.</span>');
            $(this).addClass('inputError');
            hasError = true;
          }
        }
      });
      if(!hasError) {
        var formInput = $(this).serialize();
        $.post($(this).attr('action'),formInput, function(data){
          $('form#contactForm').slideUp("fast", function() {          
            $(this).before('<p class="tick"><strong>Thanks!</strong> Your email has been delivered!</p>');
          });
        });
      }
      
      return false; 
    });
  });
  //-->!]]>
</script>

</body>
</html>
