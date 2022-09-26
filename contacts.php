
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/rectangle.css">
    <link rel="stylesheet" href="css/styleicoo.css">
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./css/logstyle.css">
    
  <link rel="stylesheet" href="./css/footerstyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
       html, body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, Sans-serif;
        background-color: #1F2739;
    }
  .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
      background-color: #041E42;
    }

    .navbar-inverse {
    		background-color: #FB667A;
			  border-color: #d15465;
		}
		.navbar-inverse .navbar-nav>li>a {
    		color: #ffeba7;
		}
		.navbar .nav {
    		font-family: 'Fira Sans', sans-serif;
    		text-transform: uppercase;
    		letter-spacing: 1px;
    		font-size: 1.5rem;
		}
		.navbar-inverse .navbar-brand {
    		color: #ffeba7;
		}
		.navbar-brand {
			font-family: 'Fira Sans', sans-serif;
    		float: left;
    		height: 50px;
    		padding: 15px 15px;
    		font-size: 19px;
    		line-height: 20px;
		}
    form, .content {
      height: 645px;
    }
    .btn {
      background-color: #FB667A;
      color: #ffeba7;
  }
  p {
    text-align: center;
    margin: 3px;
  }
  .input-group input {
    height: 32px;
    width: 70%;
  }
  .input-group label {
    display: block;
    text-align: center;
  }
  button, input, select, textarea {
    height: 89.5px;
    width: 72%;
  }
  .header{
      border-radius: 10px 10px 10px 10px;
  }
  .title_paragraph a{
        color: #0c418d;
        text-align: center;
        text-shadow: 0 0 12px rgba(178, 11, 216, 0.79);
        font-family: 'Buda', cursive;
        font-weight: 100;
        font-size: 26px;
        z-index: 0;
        position: relative;
    }
    #title:link {text-decoration:none;} 
    #title:visited {text-decoration:none;} 
    #title:hover {text-decoration:none;}   
    #title:active {text-decoration:none;}
  </style>
</head>
<body>

        <center>
		<form id="myForm" class="header">
			<h2 style= color:black>Send Email</h2>
            <h4 class="sent-notification"></h4>

            <div class="input-group">
			<label style= color:black>Name</label>
			<input id="name" type="text" placeholder="Name">
            
			<br><br>
            </div>

            <div class="input-group">
			<label style= color:black>Email</label>
			<input id="email" type="text" placeholder="Email">
			<br><br>
            </div>

            <div class="input-group">
			<label style= color:black>Subject</label>
			<input id="subject" type="text" placeholder="Subject"> 
			  <br><br>
            </div>
               
			<p style= color:black>Message</p>
			<textarea id="body" rows="5" cols="46" placeholder="Message"></textarea>
      <br></br>
            <button type="button" class="btn mt-4" onclick="sendEmail()" value="Send Email">Submit</button>
            
        <br><br>
        <p class="title_paragraph"><a id="title" href="login.php">Signup</a></p>
		</form>
        
        </center>

        <div>	
			<br>
			<br>
		</div>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>
</html>