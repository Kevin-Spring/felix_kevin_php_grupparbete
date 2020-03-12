<?php
// Navbar
 echo "<nav>\n";
 echo "<ul>\n";
 echo "  <li><a class=\"active\" href=\"index.php?page=user&userId=". $_SESSION['id']."\">Home</a></li>\n";
 echo "  <li><a href=\"index.php?page=adminAbout&userId=". $_SESSION['id']."\">About</a></li>\n";
 echo "  <li><a href=\"index.php?page=adminContact&userId=". $_SESSION['id']."\">Contact</a></li>\n";
 echo "</ul>\n";
 echo'<div class="btn-signOut">' . '<i class="fas fa-sign-out-alt">' . '</i>' . '<a href="index.php?page=logout">Sign out</a>' . '</div>' . '</nav>'; 
 echo "</nav>\n";
 ?>