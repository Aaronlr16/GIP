<?php
include("functies.php");
    include('footer.php');

if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    }


?>
<html>

<head>
    <?php
   include('bovenkantZonderSlider.php');
    ?>
</head>
<body>
<div id="wrapper">
	<div id="featured-wrapper">
<?php
        if(!isset($_SESSION['id'])){
        
        if(isset($_POST['Nieuwaccount'])){
        header('location:Registratie.php')
  
        ?>
          <?php
        }
            
             
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstlogin WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
            
            
        ?>
        <p class="Titels"><?php echo $row['titel'] ?></p>
        <form id="contact-form" method="post" action="Login.php">
                <input name="gebruikersnaam" type="text" class="form-control" placeholder="<?php echo $row['gebruikersnaam'] ?>" > <br>
                <input name="passwoord" type="password" class="form-control" placeholder="<?php echo $row['passwoord'] ?>" ><br>
            <input type="submit" name="Login" class="form-control submit" value="<?php echo $row['login'] ?>"> <br>
            <input type="submit" name="Nieuwaccount" class="form-control-Nieuw submit" value="<?php echo $row['nieuwacc'] ?>">
        </form>
        
        <?php
            $mysqli = new mysqli('localhost','root','usbw','golazo');
        
            if(isset($_POST['Login'])){
                $gebruikersnaam = $_POST['gebruikersnaam'];
                $passwoord = $_POST['passwoord'];
                
                $strSQL = "SELECT Gebruikersnaam,Paswoord FROM tblgebruiker WHERE Gebruikersnaam = '$gebruikersnaam' AND Paswoord = '$passwoord'";

                $strResult = $mysqli->query($strSQL);
                $aantalRijen = $strResult->num_rows;

            if($aantalRijen==1)
            {
            $strRij = $strResult->fetch_array();
            $_SESSION['id'] = $gebruikersnaam;
            $_SESSION['Gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['Paswoord'] = $passwoord;
            mysqli_close($mysqli);
            header('location:main.php');
            
        ?>
        <?php
        }else{echo $row['loginfout'];
             }
            }
        
        
        
        }
        
        
        ?>
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

}); $('.like-btn').on('click', function() {
   $(this).toggleClass('is-active');
}); $('.minus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());
 
    if (value &amp;gt; 1) {
        value = value - 1;
    } else {
        value = 0;
    }
 
  $input.val(value);
 
});
 
$('.plus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());
 
    if (value &amp;lt; 100) {
        value = value + 1;
    } else {
        value =100;
    }
 
    $input.val(value);
}); </script>
<?php 
     $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstfooter WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowfooter = mysqli_fetch_array($result);
    
    echo footer($rowfooter['Contact'],$rowfooter['Account'],$rowfooter['acctitel1'],$rowfooter['acctitel2'],$rowfooter['copyright1'],$rowfooter['copyright2']);
    ?>
</body>
    
</html>