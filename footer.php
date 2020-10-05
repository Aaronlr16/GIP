<?php
function footer($contact,$Account,$acctitel1,$acctitel2,$copyright1,$copyright2){
    
    return <<<HTML
    
    <div id="stamp" class="container">
	<div class="hexagon"><img src="img/fotogol.png" width="80"></div>
</div>
<div id="copyright" class="container">
	<section class="Contact-Info"> 
        <b>$contact</b>
    <br>
        <br>
    Tel.<a href="tel:0494262626"> (0)4 94 26 26 26</a>
    <br>
    <br>
    <a href="mailto:Support@Golazoshirts.be">Support@Golazoshirts.be</a>
    </section>
    <section class="Bedrijf-Info">
    <b>Golazo Shirts</b>
        <br>
        <br>
    <a>Hagewindestraat 38</a>
    <br>
    <br>
    <a>9940 Evergem</a>
    <br>
        <br>
    <a>Belgie</a>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section class="Account-Info"> 
        <b>$Account</b>
    <br>
        <br>
    <a href="account.php">$acctitel1</a>
    <br>
    <br>
    <a href="Registratie.php">$acctitel2</a>
    <br>
    <br>
    <form methode="GET" action="main.php">
    <select name="taal">
    <option value="nl">Nederlands</option>
    <option value="en">English</option>
    <option value="fr">Frans</option>
    <br>
    <br>
    <input class="taalknop" name"verstuurtaal" type="submit" value="OK">
    </form>
    

                        

    </section>
    
    
    
</div>
<div id="copyright" class="container">
    <p><a href="###"><img  src="img/Facebook_Logo_(2019).png"  width="30"></a>
    
    <a href="###"><img src="img/instagram-logos-png-images-free-download-2.png" width="30"></a></p>
    <p><img src="img/paypall.png" width="37"> 
    <img src="img/MasterCard_Logo.svg_.png" width="40">
    <img src="img/Visa-logo.png" width="50">
    <img src="img/1200px-Bancontact_logo.svg.png" width="40"></p>
    
    <p>$copyright1</p>
	<p>$copyright2</p>
</div>
HTML;
}
        ?>