<?php
  if (isset($_POST["submit"])) {
    // use actual sendgrid username and password in this section
    $url  = 'https://api.sendgrid.com/';
    $user = 'azure_73cf0d30ea2170150722bc3af384d62d@azure.com'; // place SG username here
    $pass = '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'; // place SG password here

    // grabs HTML form's post data; if you customize the form.html parameters then you will need to reference their new new names here
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];
    $from    = 'DesignMind Mobile';
    $to      = 'mobile@designmind.com';
    $subject = 'Message from DesignMind Mobile Contact Form';

    // note the above parameters now referenced in the 'subject', 'html', and 'text' sections
    // make the to email be your own address or where ever you would like the contact form info sent
    $params = array(
        'api_user'  => $user,
        'api_key'   => $pass,
        'to'        => $to, // set TO address to have the contact form's email content sent to
        'subject'   => $subject, // Either give a subject for each submission, or set to $subject
        'html'      => "<html><head><title> Contact Form</title><body>
        Name: $name\n<br>
        Email: $email\n<br>
        Subject: $subject\n<br>
        Message: $message <body></title></head></html>", // Set HTML here.  Will still need to make sure to reference post data names
        'text'      => "
        Name: $name\n
        Email: $email\n
        Subject: $subject\n
        $message",
        'from'      => "contact@burnsey.com", // set from address here, it can really be anything
      );

    curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
    $request =  $url.'api/mail.send.json';
    // Generate curl request
    $session = curl_init($request);
    // Tell curl to use HTTP POST
    curl_setopt ($session, CURLOPT_POST, true);
    // Tell curl that this is the body of the POST
    curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    // obtain response
    $response = curl_exec($session);
    curl_close($session);

    exit();

    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Please enter your message';
    }

  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DesignMind Mobile is a San Francisco based mobile development and strategy company serving complete application development including Big Data, Business Intelligence and Data Analytics." />
    <meta name="keywords" content="san francisco iPhone development, iPhone developers, iPhone apps, iOS development, iOS developers, iPad development, iPad developers, iPad apps, mobile app design, mobile app development,
          mobile app developers, mobile application development, mobile application developer, product consultants, product design, software consultants, android developers, andriod, swift, java, firebase, azure, aws, aws mobile, azure mobile apps," />
    <title>Sawyer Case Study | San Francisco Mobile Development Agency and Data Experts</title>
    <meta charset="utf-8" />
    <meta name="robots" content="noodp,noydir">

    <link rel="canonical" href="http://designmindmobile.com/leadership.php" />
    <link rel="publisher" href="https://plus.google.com/103267323369198800190/about" />
    <link rel="Shortcut Icon" href="http://c8zyre51kh-flywheel.netdna-ssl.com/wp-content/themes/designmindRWD/images/favicon.ico" type="image/x-icon" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Contact DesignMind San Francisco App Development | Custom Mobile App Developers" />
    <meta property="og:description" content="DesignMind Mobile is the thought leader in mobile application development, design and strategy." />
    <meta property='og:image' content="http://designmindmobile.com/img/DMMobileLogo.png">


    <meta property='og:url' content="https://designmindmobile.com/" />
    <meta property="og:site_name" content="designmindmobile">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="DesignMind Mobile is a San Francisco based mobile development and strategy company serving complete application development including Big Data, Business Intelligence and Data Analytics." />
    <meta name="twitter:title" content="Sawyer Case Study San Francisco App Development | Custom Mobile App Developers" />
    <meta name="twitter:site" content="@designmindmobile" />
    <meta name="twitter:creator" content="@k3street" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,700,900|Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/slick.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
  </head>

  <body id="top" data-spy="scroll" data-target="#navbar">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/index.php#top">
            <img src="img/logo.jpg" alt="DesignMind Mobile Enterprise" description="Logo for DesignMind Mobile." />
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li><a data-toggle="collapse" data-target=".navbar-collapse" href="/index.php#toolbox">Toolbox</a></li>
            <li><a data-toggle="collapse" data-target=".navbar-collapse" href="/index.php#workshops">Process</a></li>
            <li><a data-toggle="collapse" data-target=".navbar-collapse" href="/leadership.php">Leadership</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Accelerators <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/sawyer.php">Sawyer Brewing</a></li>
                <li><a href="/upmodel.php">UpModel</a></li>
              </ul>
            </li>
            <li><a data-toggle="collapse" data-target=".navbar-collapse" href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="team" id="leadership">
      <div class="container">
        <h1>Leadership</h1>
        <div class="col-sm-6 col-lg-4 team-member">
          <div class="img-circle">
            <img src="img/20160416_183419finlight.jpg">
          </div>
          <span class="title">Mobile Solutions<br/>Architect</span>
          <h2>Kimate Richards</h2>
          <p>is an expert in Android, IOS, .NET development, and technical project delivery.  He comes from the mobile app world and is passionate about mobile growth, strategy and delivery.</p>
        </div>
        <div class="col-sm-6 col-lg-4 team-member">
          <div class="img-circle">
            <img src="img/Mark-Kidwell-DesignMind-San-Francisco-260x2601.jpg">
          </div>
          <span class="title">Big<br/>Data</span>
          <h2>Mark Kidwell</h2>
          <p>specializes in Hadoop and related technologies, Data Warehousing, and Technical and Project Leadership.  He builds large-scale high performance distributed data processing systems.</p>
        </div>
        <div class="col-sm-6 col-lg-4 team-member">
          <div class="img-circle">
            <img src="img/Angel.png">
          </div>
          <span class="title">Business<br/>Intelligence</span>
          <h2>Angel Abundez</h2>
          <p>is an expert in Microsoft SQL Server BI tools, Power BI, and Tableau.  He specializes in data visualization and process-driven Data Modeling.</p>
        </div>
        <div class="col-sm-6 col-lg-4 team-member">
          <div class="img-circle">
            <img src="img/MarkG.png">
          </div>
          <span class="title">Delivery &amp;<br/>Relationship</span>
          <h2>Mark Ginnebaugh</h2>
          <p>leads the team at DesignMind and is a well-known leader in the San Francisco and Silicon Valley tech community.  He is a Microsoft Most Valuable Professional.</p>
        </div>
        <div class="col-sm-6 col-lg-4 team-member">
          <div class="img-circle">
            <img src="img/ph-dTansey.jpg">
          </div>
          <span class="title">Applications &amp;<br/>Infrasctructure</span>
          <h2>David Tansey</h2>
          <p>is an expert with Microsoft’s .NET platform, SharePoint, and SQL Server. He specializes in Object-Oriented Architecture, Design Patterns, n-Tier Applications, and Distributed Processing.</p>
        </div>
        <div class="col-sm-6 col-lg-4 team-member">
          <div class="img-circle">
            <img src="img/EricBragasDesignMind.jpg">
          </div>
          <span class="title">Project<br/>Manager</span>
          <h2>Eric Bragas</h2>
          <p>specializes in Business Intelligence solutions, including Enterprise Data Warehouses, Power BI, SQL Server, and Data Visualization.</p>
        </div>
      </div>
    </section>
    <section class="contact" id="contact">
      <div class="container">
        <div class="col-sm-4 social">
          <div class="title">
            <h1>Talk to us:</h1>
            <p>607 Market Street<br/>San Francisco, CA 94105</p>
            <p>(415) 538-8484 &middot; <a href="http://designmind.com">designmind.com</a></p>
            <p><a href="#">mobile@designmind.com</a></p>
          </div>
          <a href="https://www.facebook.com/DesignMindSoftware" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
          <a href="https://twitter.com/DesignMindData" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
          <a href="https://www.linkedin.com/company/designmind?trk=top_nav_home" target="_blank"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
        </div>
        <form class="col-sm-8" role="form" method="post" action="leadership.php">
          <div class="row">
            <div class="form-group col-xs-12">
              <?php echo $response; ?>
            </div>
  					<div class="form-group col-sm-6">
  						<label for="name">Name</label>
  						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
  						<?php echo "<p class='text-danger'>$errName</p>";?>
  					</div>
  					<div class="form-group col-sm-6">
  						<label for="email">Email</label>
  						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
  						<?php echo "<p class='text-danger'>$errEmail</p>";?>
  					</div>
  					<div class="form-group col-xs-12">
  						<label for="message">Message</label>
  						<textarea class="form-control" rows="5" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
  						<?php echo "<p class='text-danger'>$errMessage</p>";?>
  					</div>
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
          </div>
				</form>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
