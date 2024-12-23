<?php

		$showPopup = true;

if ($showPopup) {
    echo "<script type='text/javascript'>
            window.onload = function() {
                document.getElementById('successModal').style.display = 'block';
            }
          </script>";
}
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      #booking {
        text-align: center;
		padding: 50px 50px;
		margin-top:70px;
		margin-left:320px;
		margin-right:320px;
		margin-bottom:70px;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;

      }
	.btn {
		min-height: 40px;
	border-radius: 3px; 
	color: #fff;
	border-radius: 4px;
	background: #ffc001;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
	width: 50px;
}
 .btn:hover, .btn:focus {
	background: #ffc001;
	outline: none;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}

body {
	font-family: 'Montserrat', sans-serif;
	background-image: url('img/pickleball.jpg');
	background-size: cover;
	background-position: center;

}
    </style>
    <body>
	<div id="booking">
	<form action="index.php">
	<div class="section">
      <div class="card" id="successModal">
      <div style="border-radius:200px; height:150px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success!</h1> 
        <p>    We received your booking request   <br/> we'll be in touch shortly!</p>
			  			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
      </div>
	</div>
	</form>
	</div>
    </body>
</html>
<script>
    // Function to close the modal
    function closeModal() {
        document.getElementById('successModal').style.display = 'none';
    }
</script>