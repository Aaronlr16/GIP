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
	   
        <p class="Titels"><?php
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstploegkiezen WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
    
    echo $row['kiesploeg'] ?></p>
	<ul class="cd-gallery"> 
            <?php
            echo clubs("LogoFCB.png","Club Brugge","clubpagina.php?id=2");
            echo clubs("LogoLFC.png","Liverpool FC","clubpagina.php?id=1");
            echo clubs("LogoInternational.png","Internationaal","clubpagina.php?id=3");
            echo clubs("LogoDortmund.png","Borussia Dortmund","clubpagina.php?id=4");
            echo clubs("LogoBarca.png","FC Barcelona","clubpagina.php?id=5");
            echo clubs("LogoInter.png","Inter Milan","clubpagina.php?id=6");
    
    
            echo clubs("LogoReal.png","Real Madrid","clubpagina.php?id=7");
    
            echo clubs("LogoBayern.png","Bayern Munchen","clubpagina.php?id=8");
            echo clubs("LogoChelsea.png","Chelsea","clubpagina.php?id=9");
    
            echo clubs("LogoAtelti.png","Atletico Madrid","clubpagina.php?id=10");
    
            echo clubs("LogoAjax.png","Ajax","clubpagina.php?id=11");
    
            echo clubs("LogoJuve.png","Juventus","clubpagina.php?id=12");
            ?>	 
	</ul>    
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