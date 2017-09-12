
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Candidate Login | Job Finder</title>
    
    <!--CSS[Custom]-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <!--CSS[Bootstrap]-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <!--CSS[Semantic]-->
    <link rel="stylesheet" type="text/css" href="{{asset('semantic/dist/semantic.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
      .ultra{
          font-size: 12em !important;
          padding-top: 70px;
          padding-left: 60px;
      }
      .sizeNormal{
          font-size: 15px !important;
      }
      .stepsAlign{
          margin-top: 70px !important;
      }
      .inputSize{
          width: 50% !important;
      }
      .defColor{
          font-family: 'Montserrat', sans-serif !important;
      }
      .buttonSize{
          width: 100px;
      }
      #logIn{
          margin-top: 50px;
      }
      #logo{
          height: 150px;
          width: 180px;
          margin-left: auto;
          margin-right: auto;
          display: block;
      }
      .alignment{
          text-align: center;
      }
      .sign-up:hover{
          text-decoration:underline;
      }

    </style>

	<script src='https://www.google.com/recaptcha/api.js'></script>

  </head>

<body>

  <!--Page Contents-->
  <div class="pusher">
    
    <!--Container-->
    <div class="container">
        
      <div class="row">
          <br>
        <!-- Displays a message box -->
        <br>
        <!--col-md-4-->
        <div id="logIn" class="col-md-4" style="margin-left: auto;margin-right: auto; float: none; margin-top:0;">

          <div class="panel panel-info">

            <div class="panel-heading">
              <h3 class="panel-title">
                <i class="circular unlock icon">
                </i>
              </h3>
            </div>

            <!--Login-->
            <form method="post" action="{{route('login')}}">
                {{ csrf_field() }}
                <div class="panel-body">

                <img class="ui fluid image" id="logo" src="{{asset('images/logo.png')}}">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="mail icon"></i>
                  </div>
                  <input autofocus class="form-control" name="email" type="text" placeholder="Email" style = "z-index: 1;"/>
                    
                </div>
                @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                <!--Password-->
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="lock icon"></i>
                  </div>
                  <input class="form-control" name="password" type="password" placeholder="Password" style = "z-index: 1;"/>
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <br><br>
      <!--          <center><div class="g-recaptcha" data-sitekey="6LdJLSoUAAAAAAEXDKulj1bgrVpKCX_iwMwxwRZ_"></div></center>-->
            	
            	<br><br>
            	
                <input class="ui inverted fluid blue button" type="submit" name="submit" value="Log In">
                <br><br>
                <p class="newFont alignment">Don't have an account? <a href="{{route('register')}}" class = "sign-up">Sign Up</a></p>
                <p class="newFont alignment">
                  <a href="{{ route('password.request')}}" class = "sign-up">Forgot Password</a>
                </p>
                <br>

              </div>
            </form>
             

                <!--Error Message-->
                <div class="ui error form">
                    <?php //if(isset($_SESSION["success"])): ?>
                        <div class="ui <?php //echo ($_SESSION["success"]) ? "positive" : "negative"; ?> alignment message">
	                  	    <div class="defColor header"><?php //echo $_SESSION["header"]; ?></div>
	                  	    <p><?php //print_r($_SESSION["msg"]); ?></p>
	                    </div>
                    <?php //endif; unset($_SESSION["success"]); ?>
                <!--Ending Error Message-->
                </div>

                <br>

          </div>

        <!--Ending col-md-4-->
        </div>
      </div>

    <!--Ending Container-->
    </div>

  <!--Ending Page Contents--> 
  </div>
  

  <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
  <!--JS[Semantic]-->
  <script type="text/javascript" src="{{asset('semantic/dist/semantic.js')}}"></script>

  <script type="text/javascript">
    $('.ui.basic.sent.modal')
      .modal('show')
    ;
  </script>

  <script type="text/javascript">
    $('.ui.basic.notSent.modal')
      .modal('show')
    ;
  </script>
    @include('footer')
</body>
</html>