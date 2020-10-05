<?php
include("functies.php");
    include('footer.php');

if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    }
?>
<html>

<head>
       <?php include('bovenkantZonderSlider.php') ?>

</head>
<body>
<div id="wrapper">
	<div id="featured-wrapper">

          
	<?php
            $mysqli = new mysqli('localhost','root','usbw','golazo');
            if(isset($_SESSION['id'])){
                $gebruikersnaamses = $_SESSION['Gebruikersnaam'];
                $mysqli = new mysqli('localhost','root','usbw','golazo');
                $id = mysqli_real_escape_string($mysqli,$gebruikersnaamses);
                $sql = "SELECT * FROM tblgebruiker WHERE Gebruikersnaam='$gebruikersnaamses'";
                $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
                $row = mysqli_fetch_array($result);
    
            
            if(isset($_POST['Update'])){
                $gebruikersnaam = $_POST['gebruikersnaam'];
                $passwoord = $_POST['passwoord'];               $voornaam= $_POST['voornaam'];
                $achternaam= $_POST['achternaam'];
                $email= $_POST['email'];
                $adres = $_POST['adres'];
                $land = $_POST['land'];
                $betaalmethode = $_POST['betaalmethode'];
                
                $s="select * from tblgebruiker where Gebruikersnaam = '$gebruikersnaam'";
                $result = mysqli_query($mysqli, $s);
                $num = mysqli_num_rows($result);
                if($num ==1){
                echo "Gebruikersnaam al in gebruik";

                    
                }else{
                    
                    $strSQL= "UPDATE `tblgebruiker` SET `voornaam`='$voornaam',`achternaam`='$achternaam',`email`='$email',`adres`='$adres',`land`='$land',`Betaalmethode`='$betaalmethode',`Gebruikersnaam`='$gebruikersnaam',`Paswoord`= '$passwoord' WHERE Gebruikersnaam = '$gebruikersnaamses';";
                $mysqli->query($strSQL);
                mysqli_close($mysqli);
                    
            
                    session_destroy();?>
                    <script>window.location.replace("http://localhost:8080/main.php")</script>
<?php
                }
             
            }
            }else
            {
                header('location:registratie.php');
            }
    
    
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstaccount WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowtekst = mysqli_fetch_array($result);
    
    
          ?>
        
            <p class="Titels"><?php echo $rowtekst['titel'] ?></p>

<form id="contact-form" method="POST" action="account.php">
               
 <input name="gebruikersnaam" type="text" class="form-control" placeholder="<?php echo $row['Gebruikersnaam'] ?>" required> <br>
                <input name="passwoord" type="password" class="form-control" placeholder="<?php echo $row['Paswoord'] ?>" required><br>
            <input name="voornaam" type="text" class="form-control" placeholder="<?php echo $row['voornaam'] ?>" required>
            <br>
                <input name="achternaam" type="text" class="form-control" placeholder="<?php echo $row['achternaam'] ?>" required><br>
            <input name="email" type="email" class="form-control" placeholder="<?php echo $row['email'] ?>" required>
            <br>
                <input name="adres" type="text" class="form-control" placeholder="<?php echo $row['adres'] ?>" required><br>
                <br>
                <br>
                <div class="selectbox">
                <select name="land" required>
                <option value="" selected disabled hidden><?php echo $row['land'] ?></option>

        <option value="Belgie">Belgie</option>
        <option value="France">France</option>
        <option value="England">England</option>
        </select>
                    
                </div>
                <br>
                <div class="selectbox">
                <select  name="betaalmethode" required>
            <option value="" selected disabled hidden><?php echo $row['Betaalmethode'] ?></option>

            <option value="Paypal">Paypal</option>
            <option value="mastercard">Mastercard</option>
            <option value="Visa">Visa</option>
            <option value="Bancontact"> Bancontact</option>

        </select>
                
                </div>                
                
                <input type="submit" name="Update" class="form-control submit" value="<?php echo $rowtekst['knop'] ?>">

            </form>
        
    <a class="a-kleur" href="account.php?afmelden=1"><?php echo $rowtekst['afmelden'] ?></a> <?php
            if(isset($_GET['afmelden'])){
                if($_GET['afmelden']== 1){
                    session_destroy();?>
                    <script>window.location.replace("http://localhost:8080/main.php")</script>
<?php
                    
                }
            } ?>
        
        </div>
 
    </div>
        
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.min.js"></script>
<script src="js/main.js"></script> 

        
        <script>$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

});</script>
<?php 
     $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstfooter WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowfooter = mysqli_fetch_array($result);
    
    echo footer($rowfooter['Contact'],$rowfooter['Account'],$rowfooter['acctitel1'],$rowfooter['acctitel2'],$rowfooter['copyright1'],$rowfooter['copyright2']);
    ?>
</body>
    
</html>