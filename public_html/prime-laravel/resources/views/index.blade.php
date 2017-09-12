<?php 
   /* session_start();
    include 'db.php';
    $db = new Database();
    preg_match("/[^\/]+$/", $_SERVER['REQUEST_URI'], $url);
    if(isset($url[0])){
        $userURL = $url[0];
    if($userURL != 'index.php'){
        header('Location: '.$db->get_user_info_using_url(1,$userURL).$userURL);
    }
    } else if(isset($_SESSION["email"])) {
        if(($db->get_user_type(4, $_SESSION["email"]) == 0) && ($db->get_user_type(5, $_SESSION["email"]) == 1)){
            header("Location: http://prime.stratworth.com/pages/candidates/index.php");
        } else if(($db->get_user_type(4, $_SESSION["email"]) == 1) && ($db->get_user_type(5, $_SESSION["email"]) == 1)){
            header("Location: http://prime.stratworth.com/pages/employer/index.php");
        }
    }*/
        
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>{{$title1}}</title>

    
    <!--CSS[Custom]-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <!--CSS[Semantic]-->
    <link rel="stylesheet" type="text/css" href="{{asset('semantic/dist/semantic.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <style type="text/css">
	    body{
	       	font-family: 'Montserrat', sans-serif !important;
	    }
	    fieldset{
			border-color: white;
			border-width: 3px;
			padding-bottom: 190px;
			margin-left: 18px;
			margin-right: 18px;
		}
		.masthead.segment {
	      	min-height: 620px;
	      	padding: 1em 0em;
	    }
	    .masthead .logo.item img {
	      	margin-right: 1em;
	    }
	    .masthead .ui.menu .ui.button {
	      	margin-left: 0.5em;
	    }
	    .masthead h2.ui.header {
		    margin-top: 2em;
		    margin-bottom: 0em;
		    font-size: 3em;
		    font-weight: normal;
	    }
	    .masthead h3 {
		      font-size: 1.2em;
		      font-weight: normal;
	    }
	    .bgimage{
	    	background: url('images/bg2.jpg') no-repeat center center ; 
	        -webkit-background-size: cover;
	        -moz-background-size: cover;
	        -o-background-size: cover;
	        background-size: cover;
		}
		.newFontInv{
			font-family: 'Montserrat', sans-serif !important;
		}
		.newFont{
			font-family: 'Montserrat', sans-serif !important;
			color: #a4a4a5 !important;
		}
		.newSize{
			font-size: 25px;
		}
		.ui.vertical.stripe {
	      	padding: 8em 0em;
	    }
	    .ultra{
	    	font-size: 10em !important;
	    	padding-top: 70px !important;
	    	padding-left: 70px !important;
	    }

    </style>

  </head>

<body onload="startTime()">

	<!--Page Contents-->
		<div class="pusher">
		   
			<!--Masthead-->
			<div class="ui bgimage vertical masthead center aligned segment">



				<div class="ui container">
					<div class="ui large secondary menu">
						
					

						<!--Right Menu-->
						<div class="right item">
							<a class="ui inverted button newFontInv" href="/clogin">For Candidates</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a class="ui inverted button newFontInv" href="pages/elogin.php">For Employer</a>
						</div>

					</div>
				</div>

				<br>

				<fieldset>

					<div class="ui text container">

						<br>
						<h2 class="ui inverted header newFontInv">Looking for a Job?</h2>
						<h3 class="ui inverted header newFontInv">FIND YOUR IDEAL JOB NOW.	
						</h3>

						<br>

						<!--Search-->
						<div class="search-bar">
          <div class="ui container">
            <form class="ui form" method="get" action="pages/jobs/results.php">
              <div class="ui stackable grid">
                <div class="sixteen wide column">
                  <div class="field">
                    <div class="ui action input">
                        <input class="five wide field" type="text" name="q" placeholder="Search Jobs">
                      <button class="ui icon blue button" data-tooltip="Search">
                        <i class="search icon"></i>
                      </button>
                        
                    </div> 
                  </div>
                </div>
              </div>
            </form>
              
          </div>
        </div>

						<!--//Ending Search-->
						

					</div>

				</fieldset>

			<!--Ending Masthead-->
			</div>

			<div class="ui vertical stripe segment">

				<div class="ui middle aligned stackable grid container">
					<div class="row">
						
						<!--Eight Wide Column-->
						<div class="eight wide column">
							<h1 class="newFont">Why choose us?</h1>
							<p class="newFont newSize">
								We can give your company superpowers to do things that they never thought possible. Let us delight your customers and empower your needs through pure data analytics.
							</p>
						<!--Ending Eight Wide Column-->
						</div>

						<div class="six wide right floated column">
							<i class="ultra cubes icon"></i>
						</div>

					</div>
				</div>

			</div>


		<!--Ending Page Contents-->	
		</div>
   

  <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
  <!--JS[Semantic]-->
  <script type="text/javascript" src="{{asset('semantic/dist/semantic.js')}}"></script>
    <script>
      $(document).ready(function(){
          
    $("#reset").on("click", function(){
                    window.location.reload();
                });
          
     });
</script>

     <?php //include($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>
     @include('footer')
    
</body>
</html>