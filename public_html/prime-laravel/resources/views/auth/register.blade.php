@extends('layouts.app')

@section('content')
<?php
  //  session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{asset('css/semantic/semantic.css')}}">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
        <title>Job Finder | Sign Up</title>
        <style>
            * { 
                box-sizing: border-box;
                font-size: 1.0em;
                font-weight: 100;
                margin: 0;
            }
            .bgimage{
	    	background: url('images/bg2.jpg') no-repeat center center ; 
	        -webkit-background-size: cover;
	        -moz-background-size: cover;
	        -o-background-size: cover;
	        background-size: cover;
		    }
			html, body {
				width: 100%;
				font-family: GillSans, Calibri, Trebuchet, sans-serif;
			}
            .pull-down { margin-top: 5% !important; }
            button.verify { display: inline !important; }
		</style>
		
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
    <body>
        
        <div class="ui container">
        <div class="ui bgimage vertical masthead aligned segment">
            <br>
            <h1>Candidate Sign Up</h1>
            <!-- steps -->
            <div class="ui tablet stackable fluid steps pull-down">
              <div class="active step" data-step="1">
                <i class="user icon"></i>
                <div class="content">
                  <div class="title">Account</div>
                  <div class="description">Set up account credentials</div>
                </div>
              </div>
              <div class="disabled step" data-step="2">
                <i class="info circle icon"></i>
                <div class="content">
                  <div class="title">Information</div>
                  <div class="description">Enter account details</div>
                </div>
              </div>
              <div class="disabled step" data-step="3">
                <i class="mail icon"></i>
                <div class="content">
                  <div class="title">Confirm Email</div>
                  <div class="description">Verify your account</div>
                </div>
              </div>
            </div>
            <!-- steps' content -->
            <div class="ui segment">
              <div class="ui stackable grid">
                <!-- space -->
                <div class="three wide column"></div>
                <!-- form -->
                <div class="ten wide column">
                  <!-- sign up form -->
                  <form id = "candidate_form" name = "signup" class="ui form" method="post" action="db.php" onsubmit="return false">
                    <!-- step 1 -->
                    <div data-content="1">
                      <div class="field">
                        <label>Name</label>
                        <div class="two fields">
                          <div class="field">
                            <input type="text" id="fname" name="candidate[first-name]" placeholder="First Name" maxlength="25">
                          </div>
                          <div class="field">
                            <input type="text" id="lname" name="candidate[last-name]" placeholder="Last Name" maxlength="25" >
                          </div>
                        </div>
                      </div>
                      <div class="field">
                        <label>Mobile Number</label>
                        +63 <input type="text" id="mobnum" name="candidate[contact]" pattern="[0-9]{10}" maxlength = "10" name="signup[mob1]" placeholder="Mobile Number" maxlength="10" >
                      </div>
                        
                    <div class="field">
                        <label>Telephone number</label>
                        <input type="text" id="telnum" name="candidate[tel]" placeholder="Telephone number" pattern="[0-9]{7}" maxlength="7" >
                      </div>
                        
                      <div class="field">
						<label>Location</label>
                        <!--<input type="text" name="candidate[location]" placeholder="Location" required>-->
						<div class="ui labeled input">
                                                <div class="ui label">
                                                    <i class="location arrow icon"></i>
                                                </div>
                     
                                              <!--<div class="ui fluid search selection dropdown" id="comp_loc_store">
                                                <input type="hidden" name="comp_loc" value="" id="comp_loc">
                                              <i class="dropdown icon"></i>
                                              <div class="default text">Select location</div>
                                                <div class="menu">-->
												<select name="candidate[location]">
                                                <?php
                                                   /* include 'db.php';
                                                    $db_new = new Database();
                                                    $result = $db_new->get_location();
                                                    foreach($result as $row){ ?>
													<option value="<?php echo $row[1].", ".$row[2]; ?>"><?php echo $row[1].", ".$row[2]; ?></option>
                                                        <!--<div class="item" data-value="<?php echo $row[0]; ?>"><?php echo $row[1].", ".$row[2]; */?></div>-->
                                                <?php //} ?>
												</select>
                                                <!--</div>
                                              </div>-->
                                          </div>
                      </div>
                         <div class="field">
                        <label>Expected Salary</label>
                        <input type="text" id="expected_salary" name="candidate[expected_salary]" placeholder="Php XXXXXXX" maxlength="7">
                      </div>
                        
                       
                      
                      <div class="field">
                          <label>Latest Position:</label>
                          <input type="text" name="candidate[latest_position]" id="default"  maxlength="50" list="languages" placeholder="Search for Position">
  
                          <datalist id="languages">
                            <?php
                               /* $result1 = $db_new->get_position();
                                     foreach($result1 as $row1):
                                         echo "<option value='".$row1[1]."'>";
                                
                                     endforeach;*/
                            ?>
                          </datalist>
  
                      </div>
                      
                      <div class="field">
						<label>Highest Educational Attainment</label>
                        <!--<input type="text" name="candidate[location]" placeholder="Location" required>-->
						<div class="ui labeled input">
							<select name="candidate[educ_attain]">
                         <?php
                               /* $result = $db_new->get_educ_attain();
                                   foreach($result as $row){ ?>
									<option value="<?php echo $row[0];?>"><?php echo $row[1]; */?></option>
                          <?php// } ?>
								</select>
                                </div>
                      </div>
                    </div>
                    <!-- end step 1-->
                    <!-- step 2 -->
                    <div data-content="2">
                      <div class="field">
                        <label>Email</label>
                        <input onkeyup="check_email()" name="candidate[email]" id="email" placeholder="Email" type="email" pattern = "[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{1,}[.]{1}[a-zA-Z0-9]{2,}" maxlength="55">
                        <div id="email_exists" style="display: none;"></div>                      
                      </div>
                      <div class="field">
                        <label>Password</label>
                        <input type="password" id="pass" name="candidate[pass]" placeholder="Password" minlength="8" >
                      </div>
                      <div class="field">
                        <label>Confirm Password</label>
                        <input type="password" id="confirm_pass" name="confirm" placeholder="Confirm" minlength="8" >
                      </div>
                    </div>
                    <!-- end step 2 -->
                    <!-- step 3 -->
                    <div data-content="3">
                      <br>
                      <h2 class="ui icon center aligned header">
                        <!--<i class="check circle green icon"></i>-->
                        <div class="content">
                          <!--Success-->
                          <div class="sub header">
                              Click the button below to register and verify your email.
                          </div><br>
                          
                          
                          <center><div class="g-recaptcha" data-sitekey="6LdJLSoUAAAAAAEXDKulj1bgrVpKCX_iwMwxwRZ_"></div></center>
                          
                          <br>
                          <button class="ui primary button verify" type="submit">Sign me up</button>
                        </div>
                      </h2>
                      
                    </div>
                    <!-- end step 3 -->
                    <br>
                    <button class="ui primary button disabled previous">Previous</button>
                    <button class="ui green button next">Next</button>
                      
                  </form>
                </div>
                <!-- space -->
                <div class="three wide column"></div>
              </div>
            </div>
            </div>
        </div>

        <script src="{{asset('js/jquery.js')}}"></script>
        
      <script src="{{asset('semantic2/semantic.js')}}"></script>
        <script>
            $(document).ready(function(){
                //Hides all step contents except first
                $("form > div[data-content]:not(div[data-content]:eq(0))").hide();
                //Displays next step
                $("button.next").on("click", function(){
					
					//if(document.getElementById("candidate_form").checkValidity()){
                    var step = $(".active").attr("data-step");
                    var next_step = eval(step)+1;
                    var ver_chk = false;
                    if(next_step === 2){
                        $("#candidate_form").form({
                            inline: true,
                            fields: {
                                fname: {
                                identifier: 'candidate[first-name]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  }    
                                ]},
                                lname: {
                                identifier: 'candidate[last-name]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  }    
                                ]},
                                expected_salary: {
                                identifier: 'candidate[expected_salary]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  }    
                                ]},
                                mob: {
                                identifier: 'candidate[contact]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  },
                                  {
                                    type   : 'exactLength[10]',
                                    prompt : 'Enter a valid mobile number.'
                                  },
                                  {
                                    type   : 'regExp[/^[0-9]{10}$/]',
                                    prompt : 'Enter a valid mobile number.'
                                  }
                                ]},
                                tel: {
                                identifier: 'candidate[tel]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  },
                                  {
                                    type   : 'exactLength[7]',
                                    prompt : 'Enter a valid telephone number.'
                                  },
                                  {
                                    type   : 'regExp[/^[0-9]{7}$/]',
                                    prompt : 'Enter a valid telephone number.'
                                  }
                                ]},
                                expected_salary: {
                                identifier: 'candidate[expected_salary]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  },
                                  {
                                    type   : 'regExp[/^[0-9]{7}$/]',
                                    prompt : 'Enter a valid salary.'
                                  }
                                ]},
                                latest_position: {
                                identifier: 'candidate[latest_position]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  }
                                ]}
                            }
                        });
                        
                        var fname = document.getElementById("fname").value;
                        var lname = document.getElementById("lname").value;
                        var mob = document.getElementById("mobnum").value;
                        var tel = document.getElementById("telnum").value;
                        
                        if(fname.length > 0 && lname.length > 0 && /^([0-9]{10})$/.test(mob) && /^([0-9]{7})$/.test(tel)){
                            ver_chk = true;
                        }
                    } else {
                        $("#candidate_form").form({
                            inline: true,
                            fields: {
                                email: {
                                identifier: 'candidate[email]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Field required.'
                                  },
                                  {
                                    type   : 'regExp[/^[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{1,}[.]{1}[a-zA-Z0-9]{2,}$/]',
                                    prompt : 'Please enter a valid email.'
                                  }
                                ]},
                            pass: {
                                identifier: 'candidate[pass]',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Please enter a password.'
                                  },
                                  {
                                    type   : 'length[8]',
                                    prompt : 'Password must be at least 8 characters.'
                                  }    
                                ]},
                            c_pass: {
                                identifier: 'confirm',
                                rules: [
                                  {
                                    type   : 'empty',
                                    prompt : 'Please re-type your password.'
                                  },
                                  {
                                    type   : 'match[candidate[pass]]',
                                    prompt : 'Password did not match.'
                                  }    
                                ]}
                            }
                        });
                        
                        var email = document.getElementById("email").value;
                        var pass = document.getElementById("pass").value;
                        var confirm = document.getElementById("confirm_pass").value;
                        
                        if(email.length > 0 && /^[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{1,}[.]{1}[a-zA-Z0-9]{2,}$/.test(email) && pass.length >= 8 && confirm.length >= 8 && pass === confirm){
                            ver_chk = true;
                        }
                    }
                    
                    if(ver_chk){
						//Enables previous button
						if(next_step === 3) $("button").hide();
						else if(next_step > 1) $("button.previous").removeClass("disabled");
						else $("button.previous").addClass("disabled");
						//Disables current step and moves to next step
						$(".active").removeClass("active").addClass("disabled");
						$(".step[data-step='"+next_step+"']").removeClass("disabled").addClass("active");
						//Changes visible content
						$("div[data-content]").hide();
						$("div[data-content='"+next_step+"']").show();
						//Sets email
						$("#email").html($("input[name='candidate[email]']").val());
                    }
					//}
                });
                //Displays previous step
                $("button.previous").on("click", function(){
                    $(".active").removeClass("active").addClass("disabled");
                    $(".step[data-step='1']").removeClass("disabled").addClass("active");
                    //Change visible content
                    $("div[data-content]").hide();
                    $("div[data-content='1']").show();
                    //Disable previous button
                    $("button.previous").addClass("disabled");
                });
                //Submit form
		        $("button.verify").on("click", function(){
                    document.getElementById("candidate_form").submit(); 
                });
            });
            
            
            
       /*     function check_email(){
              var email = document.getElementById("email").value;
              $.ajax({
                    type: "get",    
                    url: "db.php",
                    data: {t: true, a: "check-email", email: email}
                }).success(function(data) {
                    if(data == 1){
                        $("#email_exists").text("");
                        //return true;
                    } else if(data == ""){ 
                        $("#email_exists").text("Email already exists.");
                        $("#email_exists").fadeIn("slow");
                        $("button.next").addClass("disabled");
                        //return false;
                    }
                });
              if(document.getElementById("email_exists").innerText === ""){
                  return true;
              }
              return false;
          }*/
          
        </script>
    </body>
</html> 
@endsection
