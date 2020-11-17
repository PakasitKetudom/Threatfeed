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

        <!--Chart-->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        
</head>
<body>

    
<div id="layout">
    <!-- Menu toggle -->
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
     

            </ul>
        </div>
    </div>

        <div id="main">
        <div class="header">
            <h1>CVE Mapping</h1>
            <h2></h2>
        </div>

        <!-- <div class="content"> -->
            
                <?php 
                    // echo $_POST["getvendor"]; 
                    // echo $_POST["gettitle"]; 
                    // echo $_POST["getversion"]; 
                    // echo $_POST["getedition"]; 

                    $vendor = $_POST["getvendor"];
                    $title = $_POST["gettitle"];
                    $version = $_POST["getversion"];
                    $edition = $_POST["getedition"];

                     include('connectdb.php');
                    if(empty($edition)){
                        $sqlname = "select DISTINCT namecve,vendor,title,version,edition from cveven where title ='".$title."'
                        AND vendor='".$vendor."' AND version='".$version."' "; 
                    }else{
                        $sqlname = "select DISTINCT namecve,vendor,title,version,edition from cveven where title ='".$title."'
                        AND vendor='".$vendor."' AND version='".$version."' AND edition='".$edition."' "; 
                    }
                    $resultname = $conn->query($sqlname);
                    //$rowname=mysqli_fetch_assoc($resultname);


                    //$namecheck = $rowname['namecve'];
                    // $sqlcheck = "select name from datacve where title ='".$title."'
                    // AND vendor='".$vendor."' AND version='".$version."' AND edition='".$edition."' ";
                    // $resultcheck = $conn->query($sqlcheck);
                    // $rowcheck=mysqli_fetch_assoc($resultcheck);
                    // echo $rowname['namecve'];
                ?>

            <?php
           if ($resultname->num_rows > 0) {?>
            <table class="pure-table pure-table-horizontal" cellpadding="8" cellspacing="1" border="1" width="100%">
	        <tr>
    	        <th style="text-align:center; width:150px; background-color:#DCDCDC; color:#1E90FF" >Name CVE</th>
                <th style="text-align:center; width:150px; background-color:#DCDCDC;color:#1E90FF">Published</th>
                <th style="text-align:center; width:150px; background-color:#DCDCDC;color:#1E90FF">Modified</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Description</th>
                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Cvss Score</th>
            </tr>

            <?php
            while($rowname = $resultname->fetch_assoc()) {
                $namecve = $rowname['namecve'];
                $sql = "select * from datacve where namecve LIKE '%".$namecve."%'";
                $result = $conn->query($sql);
                $row=mysqli_fetch_assoc($result);
            ?>
            
            <tr>
            <td style="text-align:center;"><?php echo $namecve; ?></td>
            <td style="text-align:center;" ><?php echo $row['published'];?></td>
            <td style="text-align:center;" ><?php echo $row['modified'];?></td>
            <td style="text-align:left;" ><?php echo $row['description'];?></td>
            <?php 
            if($row['cvss_score'] >= "10"){?>
                <td style="text-align:center; background-color:#FF0000; color:#000000;"><?php echo $row['cvss_score'];?></td>

            <?php }elseif($row['cvss_score'] > "8" ){?>
                        <td style="text-align:center; background-color:#ff6600;color:#000000;"><?php echo $row['cvss_score'];?></td>

            <?php }elseif($row['cvss_score'] > "6" ){?>
                        <td style="text-align:center; background-color:#FFA500;color:#000000;"><?php echo $row['cvss_score'];?></td>
                <?php }elseif($row['cvss_score'] > "0"){?>
                        <td style="text-align:center; background-color:#00FF00;color:#000000;"><?php echo $row['cvss_score'];?></td>
                <?php }elseif(empty($row['cvss_score'])){?>
                        <td style="text-align:center; background-color:#f0f0f0;color:#000000;"><?php echo $row['cvss_score'];?></td>
                     <?php }
                }    
            ?>
            </tr>
            </table>
           <?php }else{ ?>
               <div align="center">No data</div>
            <?php } ?>
    </div>

        
            
    </div>

        




<script src="js/ui.js"></script>

</body>
</html>
