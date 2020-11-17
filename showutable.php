<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>SOSECURE Feed</title>
    <link rel="icon" href="./img/newsos.png" type="image/x-icon">

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
     <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="css/layouts/side-menu.css">
        <!--<![endif]-->
</head>
<body>
<style>
         .button-error {
            color: white;
            background: rgb(202, 60, 60); 
        }
</style>
    
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
                <li class="pure-menu-item"><a href="index.php" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="showutable.php" class="pure-menu-link">CVE Mapping</a></li>
                <li class="pure-menu-item"><a href="searchcve.php" class="pure-menu-link">Search CVE</a></li>
                <li class="pure-menu-item"><a href="domainblock.php" class="pure-menu-link">Domain Blocklist</a></li>
                <li class="pure-menu-item"><a href="ipblock.php" class="pure-menu-link">IP Blocklist</a></li>
                <li class="pure-menu-item"><a href="showthreat.php" class="pure-menu-link">Show Threat</a></li>
                <!-- <li class="pure-menu-item menu-item-divided pure-menu-selected">
                    <a href="#" class="pure-menu-link">Services</a>
                </li> -->

            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>Your Product</h1>
            <!-- <h2>A subtitle for your page goes here</h2> -->
        </div>

        <div class="content">
            
                <?php 
                    // echo $_POST["getvendor"]; 
                    // echo $_POST["gettitle"]; 
                    // echo $_POST["getversion"]; 
                    // echo $_POST["getedition"]; 

                    // $vendor = $_POST["getvendor"];
                    // $title = $_POST["gettitle"];
                    // $version = $_POST["getversion"];
                    // $edition = $_POST["getedition"];
                     include('connectdb.php');
                    $sql2 = "select * from utable";

                ?>
                <table class="pure-table pure-table-horizontal" cellpadding="8" cellspacing="1" border="1" width="100%" >
	            <tr>
    	        <!-- <th style="text-align:center; width:150px; background-color:#DCDCDC; color:#1E90FF" >CVE NAME</th> -->
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Vendor</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Title</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Version</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Edition</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Detail</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Delete</th>
                </tr>
                <?php 
                 
                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {	
                            $colvendor = $row['vendor'];
                            $coltitle = $row['title'];
                            $colversion = $row['version'];
                            $coledition = $row['edition'];

                        ?>
                            <tr>
                                <form action="detailtable.php" method="post">
                               
                                <td style="text-align:center;"><?php echo $row['vendor']; ?></td>
                                <input type="hidden" name="getvendor" value="<?php echo $colvendor ?>" > 
                                <td style="text-align:center;"><?php echo $row['title']; ?></td>
                                <input type="hidden" name="gettitle" value="<?php echo $coltitle ?>" > 
                                <td style="text-align:center;"><?php echo $row['version']; ?></td>
                                <input type="hidden" name="getversion" value="<?php echo $colversion ?>" > 
                                <td style="text-align:center;"><?php echo $row['edition']; ?></td>
                                <input type="hidden" name="getedition" value="<?php echo $coledition ?>" > 

                                <td style="text-align:center;"><input class="pure-button" type="submit" value="See"/></td>
                                </form>
                                
                                <form action="deleteutable.php" method="post">
                                <input type="hidden" name="getvendor" value="<?php echo $colvendor ?>" > 
                                <input type="hidden" name="gettitle" value="<?php echo $coltitle ?>" > 
                                <input type="hidden" name="getversion" value="<?php echo $colversion ?>" >
                                <input type="hidden" name="getedition" value="<?php echo $coledition ?>" >
                                <td style="text-align:center;"><input class="button-error pure-button" type="submit" value="Delete" 
                                onClick="return confirm('Delete this row')" /></td>
                                </form>

                            <?php }
                                }else{
                                 echo "0";
                                }
                            ?>
                            </tr>
                </table>


           

    </div>
</div>




<script src="js/ui.js"></script>

</body>
</html>
