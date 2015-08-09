<!DOCTYPE HTML>
<html>
<head>
<title>WHATSONCLOUD</title>
<meta name="description" content="website description">
<meta name="keywords" content="website keywords, website keywords">
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" id="theme" href="css/style.css">
<!-- modernizr enables HTML5 elements and feature detects --><script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>
<body>
  <div id="main">
    <header><div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">WhatsOn<span class="logo_colour">Cloud</span></a></h1>
          <h2>Come. Learn. Grow with Cloud.</h2>
        </div>
      </div>
      <nav><div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="aboutus.html">About US</a></li>
            <li><a href="ourclients.html">Our Clients</a></li>
            <li><a href="Learning.html">Learning</a></li>
            <li>
<a href="#">Services</a>
              <ul>
<li><a href="#">Introduction</a></li>
                <li>
<a href="#">AWS</a>
                  <ul>
<li><a href="#">Documentation</a></li>
                    <li><a href="#">How-To</a></li>
                    <li><a href="#">Use-Cases</a></li>
                    <li><a href="#">WhitePapers</a></li>
                    <li><a href="#">Innovations</a></li>
                  </ul>
</li>
                <li><a href="#">Downloads</a></li>
                <li><a href="#">Summits</a></li>
                <li><a href="#">Q&A</a></li>
              </ul>
</li>
                <li><a href="contact.php">Careers</a></li>
                <li><a href="contact.php">Contact Us</a></li>
          </ul>
</div>
      </nav></header><div id="site_content">
      <div id="sidebar_container">
        <img class="paperclip" src="images/paperclip.png" alt="paperclip"><div class="sidebar">
          <h3>Latest News</h3>
          <h4>Our StartUp</h4>
          <h5>Auggust 1st, 2015</h5>
          <p>Take a look around and let us know what you think.<br><a href="#">Read more</a></p>
        </div>
        <img class="paperclip" src="images/paperclip.png" alt="paperclip"><div class="sidebar">
          <h3>Useful Links</h3>
          <ul>
            <li><a href="#">AWS Wiki</a></li>
            <li><a href="#">AWS Summit</a></li>
            <li><a href="#">AWS Console</a></li>
            <li><a href="#">Our Blog</a></li>
          </ul>
</div>
        <img class="paperclip" src="images/paperclip.png" alt="paperclip"><div class="sidebar">
          <h3>Recent Posts</h3>
          <ul>
            <li><a href="#">Post--1</a></li>
            <li><a href="#">Post--2</a></li>
            <li><a href="#">Post--3</a></li>
            <li><a href="#">Post--4</a></li>
          </ul>
        </div>
      </div>
      <div class="content">
        <img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="images/contact.png" alt="contact" /><h1 style="margin: 15px 0 0 0;">Contact Us</h1>
        <p>Say hello, using this contact form.</p>
        <?php
          // Set-up these 3 parameters
          // 1. Enter the email address you would like the enquiry sent to
          // 2. Enter the subject of the email you will receive, when someone contacts you
          // 3. Enter the text that you would like the user to see once they submit the contact form
          $to = 'enter email address here';
          $subject = 'Enquiry from the website';
          $contact_submitted = 'Your message has been sent.';

          // Do not amend anything below here, unless you know PHP
          function email_is_valid($email) {
            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
          }
          if (!email_is_valid($to)) {
            echo '<p style="color: red;">You must set-up a valid (to) email address before this contact page will work.</p>';
          }
          if (isset($_POST['contact_submitted'])) {
            $return = "\r";
            $youremail = trim(htmlspecialchars($_POST['your_email']));
            $yourname = stripslashes(strip_tags($_POST['your_name']));
            $yourmessage = stripslashes(strip_tags($_POST['your_message']));
            $contact_name = "Name: ".$yourname;
            $message_text = "Message: ".$yourmessage;
            $user_answer = trim(htmlspecialchars($_POST['user_answer']));
            $answer = trim(htmlspecialchars($_POST['answer']));
            $message = $contact_name . $return . $message_text;
            $headers = "From: ".$youremail;
            if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer) {
              mail($to,$subject,$message,$headers);
              $yourname = '';
              $youremail = '';
              $yourmessage = '';
              echo '<p style="color: blue;">'.$contact_submitted.'</p>';
            }
            else echo '<p style="color: red;">Please enter your name, a valid email address, your message and the answer to the simple maths question before sending your message.</p>';
          }
          $number_1 = rand(1, 9);
          $number_2 = rand(1, 9);
          $answer = substr(md5($number_1+$number_2),5,10);
        ?>
        <form id="contact" action="contact.php" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="<?php echo $yourname; ?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="<?php echo $youremail; ?>" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message"><?php echo $yourmessage; ?></textarea></p>
            <p style="line-height: 1.7em;">To help prevent spam, please enter the answer to this question:</p>
            <p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><input type="text" name="user_answer" /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="send" /></p>
          </div>
        </form>
      </div>
    </div>
    <div id="scroll">
      <a title="Scroll to the top" class="top" href="#"><img src="images/top.png" alt="top"></a>
    </div>
    <footer><p><a href="index.html">Home</a> | <a href="aboutus.html">About Us</a> | <a href="page.html">News</a> | <a href="another_page.html">Careers</a> | <a href="contact.php">Contact Us</a></p>
      <p>Copyright &copy; WHATSONCLOUD | <a href="http://www.whatsoncloud.com">WhatsOnCloud</a>
</p>
    </footer>
</div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script><script type="text/javascript" src="js/jquery.easing-sooper.js"></script><script type="text/javascript" src="js/jquery.sooperfish.js"></script><script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
      $('.top').click(function() {$('html, body').animate({scrollTop:0}, 'fast'); return false;});
    });
  </script>
</body>
</html>

