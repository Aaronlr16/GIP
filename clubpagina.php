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
    
    <?php if(isset($_GET['id'])){
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $id = mysqli_real_escape_string($mysqli,$_GET['id']);
    $sql = "SELECT * FROM tblclubs WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
    ?>
    
    <img src="<?php echo $row['banner'] ?>" width="700" style="width:100%" >
    
</head>
<body>
    
    
    
    
    
    
    
<?php    
}else{
    header('location:main.php');
}
    ?>
<div id="wrapper">
	<div id="featured-wrapper">
	   
        <p class="Titels"><?php echo $row['clubnaam'] ?></p>
	<ul class="cd-gallery">
		
            <?php
        if($_SESSION['taal']=='nl'){
            $shirtnaam1= $row['shirt1naam'];
            $shirtnaam2= $row['shirt2naam'];
            $shirtnaam3= $row['shirt3naam'];
        }else if($_SESSION['taal']=='en'){
            $shirtnaam1= $row['shirtnaam1en'];
            $shirtnaam2= $row['shirtnaam2en'];
            $shirtnaam3= $row['shirtnaam3en'];
        }else{
            $shirtnaam1= $row['shirtnaam1fr'];
            $shirtnaam2= $row['shirtnaam2fr'];
            $shirtnaam3=  $row['shirtnaam3fr'];
        }
            echo enkelshirt($row['shirt1'], $shirtnaam1 , $row['shirt1prijs'] ,$row['shirt1link']);
             echo enkelshirt( $row['shirt2'] ,  $shirtnaam2, $row['shirt2prijs'] ,$row['shirt2link']);
             echo enkelshirt( $row['shirt3'], $shirtnaam3,  $row['shirt3prijs'] ,$row['shirt3link']);
            

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