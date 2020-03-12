

<body class="login-body">
<?php 
echo(isset($_GET['err']) && $_GET['err']==true ? "<h2> Hoppsan! Något gick fel! </h2>" : "");
echo(isset($_GET['reg']) && $_GET['reg'] == 'exists' ? "<h2> Hoppsan! Användarnamn eller epost finns redan! </h2>" : "");
?>

<div class="login-container">
<form action="handlers/signup.php" method="POST">

<h2 class="lg-heading">REGISTER</h2>

    <div class="login-input"><i class="fas fa-user"></i><input type="text" name="create_first_Name" id="" placeholder="Fisrtname" required> </div>
    <div class="login-input"><i class="fas fa-user"></i><input type="text" name="create_last_Name" id="" placeholder="Lastname" required> </div>
    <div class="login-input"><i class="fas fa-user"></i><input type="text" name="create_user_name" id="" placeholder="Username" required> </div>
    <div class="login-input"><i class="fas fa-lock"></i><input type="password" name="create_password" id="" placeholder="Password" minlength="6" required> </div>
    <div class="login-input"><i class="fas fa-envelope"></i><input type="email" name="create_user_Email" id="" placeholder="Email" required> </div>
    <input class="btn" type="submit" value="SIGN UP"> 

    <a href="index.php?page=login" id="back">Home</a>
</form>
</div>
</body>