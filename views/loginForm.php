<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <!-- link for icons -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
</head>
<body class="login-body">
    

<div class="login-container">
<form  action="handlers/login.php" method="POST">
<div class="errormsg"></div>
    <div><h2 class="lg-heading">LOGIN</h2></div>
    <div class="login-input"><i class="fas fa-user"></i><input type="text" name="user_name" placeholder="Username"></div>
    <div class="login-input"><i class="fas fa-lock"></i><input type="password" name="password" placeholder="Password"></div> 
    <div><input class="btn" type="submit" value="LOGIN"></div>
</form>
</div>
</body>
</html>