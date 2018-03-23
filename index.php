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
				<?php echo main_generator(); ?>
			</div>
			<div class="five columns">
				<div class="twelve columns">
					 <?php echo div_generator(OSAS,REG) ?>
				</div>
				<div class="twelve columns">
					<?php echo div_generator(COE,CIT) ?>
				</div>
			</div>
		</div>
	</div><!-- <div class="first"> -->
	<div class="second">
			<div class="row">
				<div class="four columns">
					<?php echo div_generator(CBMA,CAS) ?>
				</div>
				<div class="four columns">
					<?php echo div_generator(CTE,CCJE) ?>
				</div>
				<div class="four columns">
					<?php echo div_generator(CHMT,CCS) ?>
				</div>
			</div>
	</div><!-- <div class="second"> -->  



	<!-- scripts   -->
	<!-- scripts   -->

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script src="js/lity.min.js"></script>
    <script src="js/jquery.popVideo.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script>
        $(document).ready(function(){
        $('.all').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            arrows: false,
            adaptiveHeight:true,
        });

        /**
    
        **/	
        window.setInterval(function(){
            $('.show').hide("fast", function(){
                $('.hide').show("slow");
            });
        },5000);//put the time interval of changing announcements here (5000 milliseconds)
        window.setInterval(function(){
            $('.hide').hide("fast", function(){
                $('.show').show("slow");
            });
        },10000);//double the time interval here (10000 milliseconds)
        /**

        **/
        $('.video').click(function(){
           $('.video').popVideo({
            playOnOpen: true,
           }).open();
        });
        /**

        **/
        // var init_height = $('.main').outerHeight();
        // $('.twelve.columns').css('height',(init_height/2+20));

        $('.all').resize(function(){
            console.log("test")
        });

        })
        
    </script>

	<!-- scripts   -->
	<!-- scripts   -->
</body>
</html>