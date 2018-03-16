<?php include("star.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Landing-Page</title>
    <meta charset="utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1;" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="first-half">
            <div class="row">
                <div class="seven columns main">
                    <h1>Main</h1>
                </div>
                <div class="five columns">
                    <div class="row main-2">
                        <div class="twelve columns main-2a">
                            <?php echo post("Office of the Student Affair and Service(OSAS)"); ?>
                            <?php echo post("Registrar Office"); ?>
                        </div>
                        <div class="twelve columns main-2b">
                            <?php echo post("College of Engineering (COE)"); ?>
                            <?php echo post("College of Industrial Technology (CIT)"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="first-half"> -->
        <div class="second-half">
            <div class="row">
                <div class="four columns main-3">
                    <?php echo post("College of Business Management and Accountancy (CBMA)"); ?>
                    <?php echo post("College of Arts and Sciences (CAS)"); ?>
                </div>
                <div class="four columns main-4">
                    <?php echo post("College of Teacher Education (CTE)"); ?>
                    <?php echo post("College of Criminal Justice Education (CCJE)"); ?>
                </div>
                <div class="four columns main-5">
                   <?php echo post("College of Hotel Management and Tourism (CHMT)"); ?>
                   <?php echo post("College of Computer Studies (CCS)"); ?>
                </div>
            </div>
        </div>
        <!-- <div class="second-half"> -->
        <!-- <div class="main-wrapper"> -->
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script>
    $(document).ready(function(){ $('.main-2a, .main-2b, .main-3, .main-4, .main-5').slick({ 
    	arrows: false, 
    	autoplay: true, 
    	autoplaySpeed: 10000,
    }); })
    </script>
</body>

</html>