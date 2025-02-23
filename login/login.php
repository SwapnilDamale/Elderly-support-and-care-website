<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	/* General Reset */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Header */
.headerr {
    width: 50%;
    margin: 50px auto 0;
    color: white;
    /* background: #5f9ea0; */
    text-align: center;
    border: 1px solid #b0c4de;
    border-bottom: none;
    border-radius: 10px 10px 0 0;
    padding: 20px;
}

/* Form Container */
form {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #b0c4de;
    background: white;
    border-radius: 0 0 10px 10px;
}

/* Input Group */
.input-group {
    margin: 10px 0 20px 0;
}

.input-group label {
    display: block;
    margin: 3px 0 5px;
    color: #333;
}

.input-group input {
    height: 30px;
    width: 95%;
    padding: 5px 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Button */
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5f9ea0;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

.btn:hover {
    background: #4682b4;
}

/* Additional Styles */
p {
    text-align: center;
}

a {
    color: #5f9ea0;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<body>
<div id="head_content"></div>
<!-- <div id="body_content"></div> -->
  <div class="headerr">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
<script>
    // Load the header into the #head_content div
    $('#head_content').load('/health/common/views/header.html');
    $('#body_content').load('/health/common/views/body.html');

    // Load the footer into the #footer_content div
    $('#footer_content').load('/health/common/views/footer.html');
</script>