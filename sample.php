<?php include("star.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Landing-Page</title>
    <meta charset="utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1;" />
    <link rel="stylesheet" href="css/lity.min.css">
    <link rel="stylesheet" href="css/jquery.popVideo.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

</head>

<body>

<div class="sub">
                        <?php echo new_templater(OSAS) ?>
                        <?php echo new_templater(REG) ?>
                    </div>


    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script src="js/lity.min.js"></script>
    <script src="js/jquery.popVideo.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script>
     $(document).ready(function () {


            $('.sub').slick({ 
                autoplay: true, 
                dots: true, 
                autoplaySpeed: 1000, 
            });
     });        
    </script>

</body>

</html>