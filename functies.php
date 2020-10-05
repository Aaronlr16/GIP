<?php
function shirts($eersteshirt , $tweedeshirt ,$derdeshirt,$clubnaam,$prijs,$url){
    return <<<HTML
    <li>
			<a href="$url">
				<ul class="cd-item-wrapper">
					<li class="selected">
						<img src= "img/$eersteshirt" alt="Preview image">
					</li>

					<li class="move-right" data-sale="false">
						<img src="img/$tweedeshirt" alt="Preview image">
					</li>

					<li>
						<img  src="img/$derdeshirt" alt="Preview image">
					</li>
				</ul> 
			</a>

			<div class="cd-item-info">
				<b><a href="$url">$clubnaam</a></b>

				<em class="cd-price">$prijs Euro</em>
			</div> 
		</li>
HTML;
}

function clubs($logo,$clubnaam,$url){
    return <<<HTML
    <li>
    <a href="$url">
				<ul class="cd-item-wrapper">
					<li class="selected">
						<img src="img/$logo" alt="Preview image">
					</li>
				</ul> 
			</a>

			<div class="cd-item-info-logo">
				<b><a>$clubnaam</a></b>
			</div> 
        </li>
HTML;
}

function eenshirt($logo,$clubnaam,$kortingprijs,$normaleprijs,$korting,$url){
    return <<<HTML
    <li>
			<a href="$url">
				<ul class="cd-item-wrapper">
					<li class="selected" data-sale="$korting" data-price="$kortingprijs">
						<img src="img/$logo" alt="Preview image">
					</li>

				
				</ul> 
			</a>

			<div class="cd-item-info">
				<b><a href="$url">$clubnaam</a></b>

				<em class="cd-price">$normaleprijs Euro</em>
			</div> 
		</li>
HTML;
}

function categorieboxen($titel1,$titel2,$tekst1,$tekst2){
    return <<<HTML
    
    <div class="Box">
        
        <div class="Homebox">
        <a href="Voetbalshirts.php">
            <div class="title"><h3>$titel1</h3>
                <i class="fa fa-edit"><img src="img/icoontruitje.png" width="130"></i>
                <div class="des"><p>$tekst1</p></div>
            </div></a></div>
            
    
        
        <div class="Homebox">
        <a href="Sale.php">
            <div class="title"><h3>$titel2</h3>
                <i class="fa fa-money"><img src="img/saless.png" width="130"></i>
                <div class="des"><p>$tekst2</p></div>
            </div></a></div>
        
       
        </div>
HTML;
}
function enkelshirt($shirtlogo,$shirtnaam,$prijs,$url){
    return <<<HTML
    <li>
    <a href="$url">
				<ul class="cd-item-wrapper">
					<li class="selected">
						<img src="img/$shirtlogo" alt="Preview image">
					</li>
				</ul> 
			</a>

			<div class="cd-item-info-logo">
				<b><a href="$url">$shirtnaam</a></b>
                <em class="cd-price">$prijs Euro</em>

			</div> 
        </li>
HTML;
}
function ReturnText($taal){
    $mysqli = new mysqli('localhost','root','usbw','website');
    $strSql = "SELECT tekst FROM tbltekst where taal='" . $taal ."'";
    // je vangt het resultaat van de query op in de variabele strResult
    $strResult  = $mysqli->query($strSql);
    //op die $strResult vfaag je het aantal rijen en het aantal kolommen op!
    $strOutput ='';
    while($strRij=$strResult->fetch_array()){
        //elke rij overlopen
        $strOutput .=$strRij[0] . "<br>";
    }
    return $strOutput;
}


?>