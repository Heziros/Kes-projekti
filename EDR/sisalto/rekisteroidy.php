<?php 
$ok=false; 
if(!empty($_POST['ktunnus']) && !empty($_POST['salasana1']) && !empty($_POST['salasana2'])) { 
    $ok=TRUE; 
    $ktunnus=$_POST['ktunnus']; 
    require "./tietokanta/yhteys.php"; 
    if($_POST['salasana1'] != $_POST['salasana2'] || tunnusta_ei_kannassa($yhteys,$ktunnus)== FALSE) $ok=FALSE; 
    else { 
        $ktunnus=putsaa($ktunnus); 

        $salasana=$_POST['salasana1']; 
        $salasana = muunna_salasana($salasana);//suojataan salasana 

        $sql="INSERT INTO kayttaja (ktunnus,salasana) VALUES (?,?,?,?)"; 
        $kysely = $yhteys->prepare($sql); 
        $kysely->execute(array($ktunnus,$salasana)); 
        if($kysely!=FALSE) echo "Registration complete, Welcome!"; 
    } 
} 
if(!$_POST || $ok==FALSE) { 
    if(!empty($_POST))     { 
        if(empty($_POST['ktunnus'])) echo "Username missing!"; 
        if(empty($_POST['salasana1'])) echo "Password missing!"; 
        if(empty($_POST['salasana2'])) echo "Password missing!"; 
        if(!empty($_POST['salasana1']) && !empty($_POST['salasana2']))     { 
            if($_POST['salasana1'] != ($_POST['salasana2']) )echo "Passwords don't match"; 
        } 
        if(tunnusta_ei_kannassa($yhteys,$ktunnus)==TRUE) echo "Usename is already in use pick another one."; 
    } 

    ?> 
    <form method="post" action = "index.php?sivu=rekisteroidy"> 

    <p> 
    <label for="ktunnus">Username </label><br> 
    <input type="text" name="ktunnus" value="<?php if(isset($_POST['ktunnus'])) echo $_POST['ktunnus'];?>"> 
    </p> 

    <p> 
    <label for="salasana1">Password</label><br> 
    <input type="password" name="salasana1" value="<?php if(isset($_POST['salasana1'])) echo $_POST['salasana1'];?>"></p> 

    <p><label for="salasana2">Re enter password </label><br> 
    <input type="password" name="salasana2" value="<?php if(isset($_POST['salasana2'])) echo $_POST['salasana2'];?>"> 
    </p> 

    <p> 
    <input class="button" type="submit" value="Rekisteröidy"> 
    </p> 
     
    </form>  
<?php 
} 
?>