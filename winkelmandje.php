
<html>
<?php 
    
    include('bovenkantZonderSlider.php');
    include('functies.php');
    include('footer.php');

    if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    }
    ?>
    
<head>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/default.css?<?= time(); ?>" rel="stylesheet" type="text/css" media="all" />
  

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<script src="js/modernizr.js"></script>
    
</head>
<body>
<div id="wrapper">
	<div id="featured-wrapper">
	   <?php
       
        $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstwinkelmand WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowtekst = mysqli_fetch_array($result);
?>       
        <p class="Titels"><?php echo $rowtekst['titel'] ?> - <?php echo $rowaantal[0] ?></p>
        
        
        <?php
        
        
        
         $gebruiker = $_SESSION['Gebruikersnaam'];
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $aantalproducten = "SELECT COUNT( `Gebruikersnaam` )
    FROM `tblbestelling`
    WHERE `Gebruikersnaam` = '$gebruiker' ";
        
    $producten = "SELECT * FROM tblbestelling WHERE `Gebruikersnaam` =  '$gebruiker'";
    $result = mysqli_query($mysqli, $producten) or die("Bad Query: $sql");
        $aantal = mysqli_query($mysqli, $aantalproducten) or die("Bad Query: $sql");
        $resultaantal = mysqli_query($mysqli, $aantalproducten) or die("Bad Query: $sql");
$rowaantal = $resultaantal->fetch_row();
        

       $Productnaamweergaven="";
        $prijsweerg ="";
        $maatweerg="";
        $aantalweerg="";
            $tussenplus="+";
        
    while($row = mysqli_fetch_array($result)){ ?>

       <table class="winkelmand">
        <thead >
           <tr >
            <th class="winkelmandfoto"><img src="<?php echo $row['foto'] ?>" width="50px"></th>
            <th class="winkelmandtekst"><?php echo $row['Productnaam'] ?> </th>
            <th><?php echo $row['prijs'] ?> Euro/<?php echo $rowtekst['stuk'] ?> </th>
            <th><?php echo $rowtekst['maat'] ?> <?php echo $row['maat'] ?> </th>
            <th><?php echo $rowtekst['aantal'] ?> <?php echo $row['aantal'] ?> </th>
            <th><form method="POST" action="winkelmandje.php">
            <input type="hidden" name="wagen_id" value="<?php echo $row['bestellingid']?>">    <input type="submit" class="form-control-Nieuw-winkelmand submit" name="verwijderen" value="X"></form></th> <?php
        
                                              
            $Productnaamweergaven .=  $row['Productnaam']  .$tussenplus;
            $prijsweerg .=   $row['prijs'] .$tussenplus;
               $maatweerg .=  $row['maat']  .$tussenplus;
               $aantalweerg .=   $row['aantal'] .$tussenplus ;   
               
               ?>
               
            </tr>
           
           </thead>
        
        
        </table>
       <?php } ?>
        <form method="POST" action="winkelmandje.php"><input type="submit" class="submit" name="BestellingPlaatsen" value="<?php echo $rowtekst['BestellingP'] ?>"></form>
    <?php 
      

                   

    if(isset($_POST['BestellingPlaatsen']))  {
     
         $mysqlii = new mysqli('localhost','root','usbw','golazo');
         $Gebruikeraankoop =  $_SESSION['Gebruikersnaam'];
         
        
        
        
        
           
        
        $strSQL= "INSERT INTO `tblvoltooidebestelling`( `prijs`, `Productnaam`, `aantal`, `maat`, `Gebruikersnaam`) VALUES ('$prijsweerg','$Productnaamweergaven','$aantalweerg','$maatweerg','$Gebruikeraankoop');";
        $mysqlii->query($strSQL);
              mysqli_close($mysqlii);   
         $mysqli = new mysqli('localhost','root','usbw','golazo');    
        $sql = "DELETE FROM `tblbestelling` WHERE `Gebruikersnaam`='$Gebruikeraankoop'";
             $mysqli->query($sql);
        mysqli_close($mysqli);
           ?> 
        <script>window.location.replace("http://localhost:8080/main.php")</script>;<?php
             }
                                                             
        
    
         if(isset($_POST['verwijderen'])){
             if(isset($_POST['wagen_id'])){
                $id = $_POST['wagen_id'];

                 $mysqli = new mysqli('localhost','root','usbw','golazo');
             
        $sql = "DELETE FROM `tblbestelling` WHERE `bestellingid`=".$id."";
             $mysqli->query($sql);

             header("location:winkelmandje.php");
             } 
        
       
    }
    
    ?>
        
        
        
        
                
            <a class="a-kleur" href="winkelmandje.php?afmelden=1"><?php echo $rowtekst['afmelden'] ?></a> <?php
            if(isset($_GET['afmelden'])){
                if($_GET['afmelden']== 1){
                    session_destroy();?>
                    <script>window.location.replace("http://localhost:8080/main.php")</script>
<?php
                    
                }
            }
               

?>
    </div>
        </div>       
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.min.js"></script>
<script src="js/main.js"></script> 
<?php 
     $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstfooter WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowfooter = mysqli_fetch_array($result);
    
    echo footer($rowfooter['Contact'],$rowfooter['Account'],$rowfooter['acctitel1'],$rowfooter['acctitel2'],$rowfooter['copyright1'],$rowfooter['copyright2']);
    ?>
</body>
</html>