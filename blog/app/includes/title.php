<?php 
	$title = "";           			
	#check to $actual have a right path,to make a header active page
	$path = basename($_SERVER['PHP_SELF']);
      $path = basename($_SERVER['PHP_SELF']);
	if ($path == "about.php") {
		$st_bg = "About-bg";
		$heading = "aboutheading";
    	$title = "About <span class=\"orange_color\">Us</span>";
  	}elseif ($path == "marketing.php"){
  		$st_bg = "Marketing-bg";
  		$heading = "Marketingheading";
     	$title = "Marketing";
  	}elseif ($path == "blog.php") {
  		$st_bg = "Blog-bg";
  		$heading = "Blogheading";
     	$title = "Blog";
  	}elseif ($path == "contact.php"){
  		$st_bg = "contact-bg";
  		$heading = "contactheading";
     	$title = "contact Us";
  	}elseif ($path == "login.php"){
  		$st_bg = "Login-bg";
  		$heading = "Loginheading";
     	$title = "Login";
  	}elseif ($path == "register.php"){
  		$st_bg = "Register-bg";
  		$heading = "Registerheading";
     	$title = "Register";
    }
    echo "  
  	<div class=". $st_bg .">
     	<div class=\"container\">
        	<div class=\"row\">
		       	<div class=\"col-md-12\">
		          	<div class=" . $heading . ">
		             	<h3>".	$title ."</h3>
		          	</div>
		      	</div>
        	</div>
     	</div>
  	</div>";      
?>

