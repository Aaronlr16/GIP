
<!DOCTYPE html>
<html>
<head>
    <?php     session_start();

    
    if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    } ?>
    
     <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="css/default.css?<?= time(); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<script src="js/modernizr.js"></script>
    <link rel="icon" href="img/fotogol.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/default.css?<?= time();?>">
    
    
    
<link rel="icon" href="img/fotogol.png">
    
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/default.css?<?= time();?>">
    
<nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="http://localhost:8080/main.php"><img src=img/fotogol.png width="50px"></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                
                    <?php 
                    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstnavbar WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowtekst = mysqli_fetch_array($result);
                    
                    ?>
                    
                    <li><a href="main.php"><?php echo $rowtekst['hoofdpagina'] ?></a></li>

                    <li><a href="clubs.php"><?php echo $rowtekst['Voetbalshirts'] ?></a></li>
                    <li><a href="Sale.php"><?php echo $rowtekst['Korting'] ?></a></li>
                    <li><a href="Klantenservice.php"><?php echo $rowtekst['Klantenservice'] ?></a></li>
                    <?php
                    
                     if(!isset($_SESSION['id'])){?>
                    <li><a href="Login.php"><img src="img/usericooon.png" width="30px"></a></li>
                    <?php
                        }else{
                        
                           
                         $gebruiker = $_SESSION['Gebruikersnaam'];
                        $mysqli = new mysqli('localhost','root','usbw','golazo');
                         $aantalproducten = "SELECT COUNT( `Gebruikersnaam` )
                            FROM `tblbestelling`
                            WHERE `Gebruikersnaam` = '$gebruiker' ";
    
                         $resultaantal = mysqli_query($mysqli, $aantalproducten) or die("Bad Query: $sql");
                         $rowaantal = $resultaantal->fetch_row();
                        ?>
                        <li><a href="winkelmandje.php"><img src="img/icon-cart.png" width="30px"><?php echo $rowaantal[0] ?></a></li>
                        
                        <?php
                         
                    }
                    ?>

                    
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>
    </head>
</html>