<?php 
echo(isset($_GET['err']) && $_GET['err']==true ? "<h2> Hoppsan! Något gick fel! </h2>" : "");
echo(isset($_GET['reg']) && $_GET['reg'] == 'exists' ? "<h2> Hoppsan! Användarnamn eller epost finns redan! </h2>" : "");
?>

<h1>Register here!</h1>

<form action="handlers/signup.php" method="POST">
<div><h3>Firstname:</h3></div>
<div><input type="text" name="create_first_Name" id="" placeholder="Fisrtname" required> </div>
<div><h3>Lastname:</h3></div>
<div><input type="text" name="create_last_Name" id="" placeholder="Lastname" required> </div>
    <div><h3>Username:</h3></div>
    <div><input type="text" name="create_user_name" id="" placeholder="Username" required> </div>
    <div><h3>Password:</h3></div>
    <div><input type="password" name="create_password" id="" placeholder="Password" required> </div>
    <div><h3>Email:</h3></div>
    <div><input type="text" name="create_user_Email" id="" placeholder="Email" required> </div>
    <br>
    <input type="submit" value="SIGN UP!!"> <br>
</form>

<br>

<a href="index.php?page=login">Home</a>