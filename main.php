<html>
<?php 
    include('Bovenkant.php');
    include('functies.php');
    include('footer.php');
    if(isset($_GET["taal"])){
            $_SESSION['taal']= $_GET["taal"];

    }else{
        if(isset($_SESSION['taal'])){
            $_SESSION['taal']=$_SESSION['taal'];
        }else{
                    $_SESSION['taal']='nl';

        }
    }
    $taal = $_SESSION['taal'];
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tblteksthoofdpagina WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
        
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
	   
        <p class="Titels"><?php echo $row['Populair'] ?></p>
	<ul class="cd-gallery">
		<?php
            echo shirts("58015343.jpg","58015351_1.jpg","58015357.jpg","Club Brugge","85","clubpagina.php?id=2");
            echo shirts("2f040da32f4e.jpg" , "14e330846758.jpg","17b3e0e1ee99.jpg","Liverpool FC","74","clubpagina.php?id=1");
            echo eenshirt("RodeDuivels.jpg","Belgie","60","89","true","clubpagina.php?id=3");
            echo shirts("47582.jpg" , "49130.jpg","48716.jpg"," Dortmund","70","clubpagina.php?id=4");
            echo shirts("FCB_MENS_HS_1905_v3.jpg" , "FCB_MENS_AS_1907_v3.jpg","FCB_MENS_3S_1909_v3.jpg","FC Barcelona","90","clubpagina.php?id=5");
            echo shirts("in19001.jpg" , "in19002_1.jpg","img/in19003.jpg","Inter Milaan","80","clubpagina.php?id=6");
        ?>       
        </ul>      
        
    <p class="Titels"><?php echo $row['PopulairCat'] ?></p>
    <?php 
        echo categorieboxen( $row['TitelCat1'] ,  $row['TitelCat2'] ,  $row['TekstCat1'],  $row['TekstCat2']);
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