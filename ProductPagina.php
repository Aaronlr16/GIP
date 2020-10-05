<html>
<?php     include('footer.php');

    if(isset($_SESSION['taal'])){
                        $taal = $_SESSION['taal'];
                    }
?>
<head>
        <link rel="stylesheet" href="css/default.css?<?= time();?>">
    
      <?php include('bovenkantZonderSlider.php') ?> 
    
    <style>
* {box-sizing: border-box;}

.img-magnifier-container {
  position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 100px;
  height: 100px;
}
</style>
<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
    
    
    
    

</head>
<body>
<?php if(isset($_GET['id'])){
    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $id = mysqli_real_escape_string($mysqli,$_GET['id']);
    $sql = "SELECT * FROM tblproducten WHERE id='$id'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
    ?>
    
    
    
    
    
<?php    
}
  if(isset($_POST['toevoegenwinkelmand']))  {
      if(isset($_SESSION['id'])){
         $mysqli = new mysqli('localhost','root','usbw','golazo');

                $gebruikersnaam =  $_SESSION['Gebruikersnaam'] ;

                $productid = $_GET['id'];               
                $Productnaam = $_POST['hidden_naam'];
                $aantal = $_POST['aantal'];
                $maat= $_POST['maat'];
                $prijs = $_POST['hidden_prijs'];
                $foto = $_POST['hidden_foto'];
                
                


                
        
                $strSQL= "INSERT INTO `tblbestelling`(`ProductID`, `prijs`, `Productnaam`, `aantal`, `maat`, `Gebruikersnaam`,`foto`) VALUES ('$productid','$prijs','$Productnaam','$aantal','$maat','$gebruikersnaam','$foto');";
                $mysqli->query($strSQL);
                mysqli_close($mysqli);
         ?> <script>window.location.replace("http://localhost:8080/winkelmandje.php")</script><?php
      }else{    $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstproductpagina WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowtekst = mysqli_fetch_array($result); ?>  
            <p class='titels'> <?php echo $rowtekst['eerstinloggen'] ?> 
<a href='login.php'>here</a></p>
<?php
      }
      
  }
?>	
    <?php 
    
    
        $mysqli = new mysqli('localhost','root','usbw','golazo');
    $sql = "SELECT * FROM tbltekstproductpagina WHERE taal='$taal'";
    $result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
    $rowtekst = mysqli_fetch_array($result);
    
    if($_SESSION['taal']=='nl'){
            $shirtnaam= $row['Titel'];
            $Beschrijving= $row['Beschrijving'];
            $categorie = $row['Categorie'];
            
        }else if($_SESSION['taal']=='en'){
            $shirtnaam= $row['Titelen'];
            $Beschrijving= $row['Beschrijvingen'];
            $categorie = $row['Categorieen'];
            
        }else{
            $shirtnaam= $row['Titelfr'];
            $Beschrijving = $row['Beschrijvingfr'];
            $categorie = $row['Categoriefr'];
            
            
        }
    
    
    ?>
    
    
    <p class="TitelsProduct"><?php echo $shirtnaam ?></p>
	<main >
    

      <!--Grid row-->

<div class="img-magnifier-container">
  <img id="myimage" src="<?php echo $row['Foto'] ?>" width="500px">
        </div>
    
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage", 3);
</script>
          <!--Content-->
          <div class="productinformatie">

            <div>
              <a href="">
                <span class="categorie"><?php echo $categorie ?></span>
              </a>
              
            </div>

            <p class="prijs">
              
              <span ><?php echo $row['Prijs'] ?> Euro</span>
            </p>

            <p><?php echo $rowtekst['beschrijvingtitel'] ?></p>

            <p><?php echo $Beschrijving ?></p>

            <form method="post" action="Productpagina.php?id=<?php echo $row['id'] ?>.php" >
              <input type="number" value="1" aria-label="Search" name="aantal"class="form-control" style="width: 100px" required>
                <br>
             <div class="selectbox">
                <select name="maat" required>
                <option value="" selected disabled hidden><?php echo $rowtekst['kiesmaat'] ?></option>

        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="2XL">2XL</option>
        <option value="3XL">3XL</option>
        </select>
                </div>
              <button class="form-control submit" type="submit" name="toevoegenwinkelmand"><?php echo $rowtekst['winkelmandtoevoegen'] ?>
            
              </button>
               <input type="hidden" name="hidden_naam"value="<?php echo $row['Titel'] ?>" >
                <input type="hidden" name="hidden_foto"value="<?php echo $row['Foto'] ?>" >

            <input type="hidden" name="hidden_prijs"value="<?php echo $row['Prijs'] ?>" >
            </form>
        </div> 
    
  </main>
        
      
        
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