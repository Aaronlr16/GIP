<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/fotogol.png">
    <?php
    session_start();
if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    }else{
    $_SESSION['taal'] = 'nl';
    $taal = $_SESSION['taal'];
}
    ?>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/default.css?<?= time();?>">
    
    
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="http://localhost:8080/main.php"><img src=img/fotogol.png></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                
                    <?php 
                    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstnavbar WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowtekst = mysqli_fetch_array($result);
                    
                    ?>
                    
                    
                    <li><a href="clubs.php"><?php  echo $rowtekst['Voetbalshirts'] ?></a></li>
                    <li><a href="Sale.php"><?php  echo $rowtekst['Korting'] ?></a></li>
                    <li><a href="Klantenservice.php"><?php  echo $rowtekst['Klantenservice'] ?></a></li>
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

<!-- krimp navbar -->
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

<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img/BannerFCB.jpg" width="700"   style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img/BannerLFC.jpg" width="700"   style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="img/BannerUCL.jpg" width="700"  style="width:100%">
  <div class="text"></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
<script>$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

});</script>

</body>
</html> 
