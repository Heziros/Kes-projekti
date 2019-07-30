<?php  
if(isset($_GET["puuttuu"])) echo "<p>Täytä molemmat kentät!</p>"; 
if(isset($_GET["vaarin"])) echo "<p>Käyttäjätunnus ja salasana eivät vastaa toisiaan</p>"; 
?> 
<div>
    <form action="./tarkista_kirjautuminen.php" method="post"> 
    <h2>Login</h2> 

    <p> 
    <label for="ktunnus">Username</label><br> 
    <input type="text" name="ktunnus"><br> 
    </p> 

    <p> 
    <label for="salasana">Password</label><br> 
    <input type="password" name="salasana"><br> 
    </p> 

    <p> 
    <input class="button" type="submit" value="Kirjaudu"> 
    </p> 
</div>
</form>