<html>
<?php     include('footer.php');
    include('functies.php');
    if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    }
?>
<head>
       <?php include('bovenkantZonderSlider.php') ?>

    
</head>
<body>
<div id="wrapper">
	<div id="featured-wrapper">
	   
        <?php
    
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstkorting WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
    
    
    ?>
        
        <p class="Titels"><?php echo $row['korting'] ?></p>
        <ul class="cd-gallery">
       <?php echo eenshirt("RodeDuivels.jpg"," Belgie","60","89","true","ProductPagina.php?id=7");
   
        
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