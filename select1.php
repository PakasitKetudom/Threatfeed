<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>SOSECURE &ndash; Layout Examples &ndash; Pure</title>
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     -->
     <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="css/layouts/side-menu.css">
        <!--<![endif]-->
        
</head>
<body>

    
<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
        <p class="pure-menu-heading" href="index.php" style="font-family:impact;"><img src="img/SOS_w-01.png" width="40px">SOSECURE</p>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">About</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Services</a></li>

                <!-- <li class="pure-menu-item menu-item-divided pure-menu-selected">
                    <a href="#" class="pure-menu-link">Services</a>
                </li> -->

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Contact</a></li>
            </ul>
        </div>
    </div>

    <div id="main">
        <!-- <div class="header">
            <h1>Page Title</h1>
            <h2>A subtitle for your page goes here</h2>
        </div> -->

        <!-- <div class="content"> -->
            <?php 
                // $conn = mysqli_connect("localhost", "root","", "cvedb");
                include('connectdb.php');
                //session_start();
                //$gettitle = $_REQUEST["title"];
                
                //$sql = "select DISTINCT title from cveven where vendor LIKE '%juniper%'"; 
                //$sql = "select DISTINCT version,edition from cveven where title LIKE '%junos%'";
                //$sql = "select DISTINCT namecve,title from cveven where title ='junos' AND vendor='juniper' AND version='12.1x46' AND edition='d10' "; 
                // $sql = "select * from utable UNION select DISTINCT namecve,vendor,title,version,edition from cveven where title ='windows_10'
                // AND vendor='microsoft' AND version='3.0' ";
                $sql = "SELECT count(*) from testcsv where timestamp LIKE '2018-09-13'";
                
            ?>

            <table class="pure-table pure-table-horizontal" cellpadding="8" cellspacing="1" border="1">
	        <tr>
    	        <th style="text-align:center; width:150px; background-color:#DCDCDC; color:#1E90FF" >Title</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Description</th>
                <!-- <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Cvss Score</th>  -->
            </tr>
            <?php 
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {	
            ?>
            <tr>
            <td style="text-align:center;"><?php echo $row['namecve'] ?></td>
            <td style="text-align:center;"><?php echo $row['title'] ?></td>
            
            <?php }
                
                
            }else{
                echo "0";
            }
            ?>
            </tr>

        <!-- </div> -->
        <!-- $row['cvss_score'] >= "4" && $row['cvss_score'] <= "6"  -->
        </div>




<script src="js/ui.js"></script>

</body>
</html>
