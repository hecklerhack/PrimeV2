

<style>
input[name="name_cont"], input[name="email_cont"], textarea[name="message_cont"], input[name="subject_cont"] {
 /* Full width */
	width: 100%;
    padding: 12px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[name="fruitcake"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[name="fruitcake"]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.fruitcake {
	width: 40%;
    background-color: #f2f2f2;
	overflow:hidden;
	margin: 60px auto;
	
}

form[name="fruitcake"]{
	margin: auto;
	width: 100%;
	padding: 40px;
}

.contact_us_mod {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.contact_us_mod2 {
    position: fixed; /* Stay in place */
    margin:10px;
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.contact_us_mod-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

.pang_sara, .closeicon {
    background-color: red;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin: 10px;
    padding: 10px;
    color: white;
}

.closeicon{
    margin: 5px;
}

.pang_sara:hover,
.pang_sara:focus,
.closeicon:hover,
.closeicon:focus{
    background-color: #aaa;
    text-decoration: none;
    cursor: pointer;
    color:black;
}

.contact_us_btn {
	background-color:#2184d0;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
	margin-bottom: 50px;
}
.contact_us_btn:hover {
	background-color:#476e9e;
}
.contact_us_btn:active {
	position:relative;
	top:1px;
}

.taga_gitna {
    text-align: center;
}

</style>

<div class="taga_gitna">
<button class="contact_us_btn" id="cont_btn" >Contact Us</button>
</div>

<div id="cont_mod" class="contact_us_mod">

<div class="fruitcake">	
  <span class="pang_sara">&times;</span>
  <form action="../../../contact_us.php" name="fruitcake" method="post">
	<h1 align="center">CONTACT US</h1>
    <label for="name">Name</label>
	<br>
    <input type="text" id="name_cont" name="name_cont" placeholder="Your name.." required>
	<br>
    <label for="email">Email</label>
	<br>
    <input type="text" id="email_cont" name="email_cont" placeholder="Your email..." required>
	<br>
	<label for="subject">Subject</label>
	<br>
    <input type="text" id="subject_cont" name="subject_cont" placeholder="Subject" required>
	<br>
    <label for="message">Message</label>
	<br>
    <textarea id="message_cont" name="message_cont" placeholder="Write something.." style="height:200px" required></textarea>
	<br>
    <input type="submit" value="Submit" name="fruitcake">

  </form>
</div>

</div>
 <!-- Displays a message box -->
    <?php if(isset($_SESSION["cont_msg"]) && $_SESSION["cont_msg"]) { ?>
        <!-- The Modal -->
        <div id="Cont_Result_Modal" class="contact_us_mod2">

            <!-- Modal content -->
            <div class="fruitcake" style = "padding: 20px; border: 3px solid #14DA2A;">
                <span class="closeicon">&times;</span>    
                <div class="header">
                    <?php echo $_SESSION["cont_msg_header"]; ?>
                </div>
            <p><?php echo $_SESSION["cont_msg_content"]; ?></p>
            </div>
        </div>
    <?php 
            unset($_SESSION["cont_msg"]);
            unset($_SESSION["cont_msg_header"]);
            unset($_SESSION["cont_msg_content"]);
        }
    ?>



<script>
// Get the modal
var modal_cont = document.getElementById('cont_mod');
var result_modal_cont = document.getElementById('Cont_Result_Modal');

// Get the button that opens the modal
var btn_cont = document.getElementById("cont_btn");

// Get the <span> element that closes the modal
var span_cont = document.getElementsByClassName("pang_sara")[0];
var span_cont2 = document.getElementsByClassName("closeicon")[0];

// When the user clicks on the button, open the modal 
btn_cont.onclick = function() {
    modal_cont.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span_cont.onclick = function() {
    modal_cont.style.display = "none";
}
span_cont2.onclick = function() {
    result_modal_cont.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_cont) {
        modal_cont.style.display = "none";
    }
    else if (event.target == result_modal_cont) {
        result_modal_cont.style.display = "none";
    }
}



</script>