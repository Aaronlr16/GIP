<html>
<?php include('footer.php')   
    ?>
    <?php
    if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    } 
    ?>
<head>
       <?php include('bovenkantZonderSlider.php') ?>

</head>
<body> 
    
<?php 
 
if(isset($_POST['submit'])){
    //omzetten variabelen
    $name = $_POST['name'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    
    $mysqli = new mysqli('localhost','root','usbw','golazo');

    $stmt = $mysqli->prepare("INSERT INTO tblContact(`naam`,`message`,`email`) VALUES(?,?,?)");
    $stmt->bind_param('sss',$name,$message,$email); //sss = string
    $stmt->execute();
    header('Location: main.php');

}else{
    ?>

<?php
    
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstcontact WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
    
    
    ?>
    
    <div id="wrapper">
	<div id="featured-wrapper">
	   
        <p class="Titels"><?php echo $row['titel'] ?></p>
	<ul class="cd-gallery">
		<div class="contact-form">
            <form id="contact-form" method="post" action="Klantenservice.php">
            <input name="name" type="text" class="form-control" placeholder="<?php echo $row['naam'] ?>" required>
            <br>
            <input name="email" type="email" class="form-control" placeholder="<?php echo $row['email'] ?>" required>
            <br>
                <textarea name="message" class="form-control" placeholder="<?php echo $row['beschrijving'] ?>" rows="4" required></textarea><br>
                <input type="submit" name="submit" class="form-control submit" value="<?php echo $row['verstuur'] ?>">
            </form>
        </div>
         
	</ul>
       </div>
 
    </div>
    
    </body>


<?php
}
?>  
        
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

    
</html>