<?php include("star.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Landing-Page</title>
    <meta charset="utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1;" />
    <link rel="stylesheet" href="lity.min.css">
    <link rel="stylesheet" href="jquery.popVideo.css">
    <link rel="stylesheet" href="style.css">
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

<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
    <script src="lity.min.js"></script>
    <script src="jquery.popVideo.min.js"></script>
    <script>
        $(document).ready(function(){

        /**

        **/	
        window.setInterval(function(){
            $('.show').hide("fast", function(){
                $('.hide').show("fast");
            });
        },5000);//put the time interval of changing announcements here (5000 milliseconds)
        window.setInterval(function(){
            $('.hide').hide("fast", function(){
                $('.show').show("fast");
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
        var init_height = $('.main').outerHeight();
        $('.twelve.columns').css('height',(init_height/2+20));

        })
        
    </script>

	<!-- scripts   -->
	<!-- scripts   -->
</body>
</html>