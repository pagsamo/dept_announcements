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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="first">
        <div class="row">
            <div class="seven columns main">
                <div><?php echo main_generator(); ?></div>
            </div>
            <div class="five columns">
                <div class="twelve columns">
                    <div class="sub">
                        <?php echo new_templater(OSAS) ?>
                        <?php echo new_templater(REG) ?>
                    </div>
                </div>
                <div class="twelve columns">
                    <div class="sub">
                        <?php echo new_templater(COE) ?>
                        <?php echo new_templater(CIT) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="first"> -->

    <div class="second">
        <div class="row">
            <div class="four columns">
                <div class="sub">
                    <?php echo new_templater(CBMA) ?>
                    <?php echo new_templater(CAS) ?>
                </div>
            </div>
            <div class="four columns">
                <div class="sub">
                    <?php echo new_templater(CTE) ?>
                    <?php echo new_templater(CCJE) ?>
                </div>
            </div>
            <div class="four columns">
                <div class="sub">
                    <?php echo new_templater(CHMT) ?>
                    <?php echo new_templater(CCS) ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="second"> -->



    <!-- scripts   -->
    <!-- scripts   -->

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script src="js/lity.min.js"></script>
    <script src="js/jquery.popVideo.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.all').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                arrows: false,
                adaptiveHeight: true,
            });

            $('.sub').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                arrows: false,
            });

        })

    </script>

    <!-- scripts   -->
    <!-- scripts   -->
</body>

</html>