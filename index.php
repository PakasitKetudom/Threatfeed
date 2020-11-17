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
    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link rel="stylesheet" href="css/layouts/res.css">
        
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
        <!-- <a class="pure-menu-heading" href="index.php" style="font-family:impact;"><img src="img/SOS_w-01.png" width="40px">SOSECURE</a> -->
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
                <img src="./img/newsos.png" heigth="150" width="150">
                
                    <h1 style="font-family:impact; color:#0093d2;"><span style="font-family:impact; color:#1765a1;">SO</span>SECURE</h1>
                <!-- <h2>Select ...</h2> -->    
            </div>

        <div class="content">
        <?php 
        include('connectdb.php');   
        $sql = "select DISTINCT vendor from cveven order by vendor"; 
        $sql2 = "select DISTINCT title from cveven "; 
        $sql3 = "select DISTINCT version,edition from cveven "; 
        

        
        ?>
        <form class="pure-form pure-form-stacked"  medthod="post" action="">
        

        <table class="pure-table" >
            <tr><!-- row 1-->
                <td>Vendor</td>
                <td>
                    <select name="vendor"  style="width:100%;height:50px;text-align: center;"  onchange="this.form.submit();" >
                    <?php 
      
                    ?>
                     <?php if($_REQUEST['vendor']=="")
                     { ?>
                        <option  value="" selected="selected" >Select Vendor</option>
                        <?php
                     }else{
                         ?>
                        <option  value="<?php echo $_REQUEST['vendor']; ?>"><?php echo $_REQUEST['vendor']; ?></option>
                        
                        <?php 
                     }

                         $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {	
                                ?>                                
                                <option name="<?php echo $row['vendor'];?>" value="<?php echo $row['vendor'];?>"><?php echo $row['vendor'];?></option>
                                <?php
                                     $selected_val = $_REQUEST['vendor'];
                                     
                                ?>
                                    
                                 <?php } 
                            }else{
                                echo "0";
                            }
                              ?>
                    </select>
                </td>
            </tr>
            <?php
            $sql4 = "select DISTINCT title from cveven where vendor LIKE '%".$selected_val."%' "; 
            $sqlcvevendor = "select DISTINCT namecve from cveven where vendor LIKE '%".$selected_val."%' "; 
            ?>
            <tr><!-- row 2-->
                <td>Title</td>
                <td>
                    <select name="title" style="width:100%;height:50px;text-align: center;" onchange="this.form.submit();" >
                    <?php 
                    //$_SERVER["REQUEST_METHOD"] = "POST";
                    //$_POST['action'] = '2';
                    ?>
                    <?php if($_REQUEST['title']=="")
                     { ?>
                        <option  value="" selected="selected" >Select Title</option>
                        <?php
                     }else{
                         ?>
                        <option  value="<?php echo $_REQUEST['title']; ?>"><?php echo $_REQUEST['title']; ?></option>

                        <?php 
                     }

                         $result = $conn->query($sql4);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {	
                                ?>
                                <option  value="<?php echo $row['title'];?>"><?php echo $row['title'];?></option>
                                <?php
                                    $selected_title = $_REQUEST['title'];
                                   // $sql5 = "select DISTINCT version,edition from cveven where title LIKE '%".$selected_title."%' "; 
                                    
                                ?>
                                 <?php } 
                            }else{
                                echo "0";
                            }
                              ?>
                    </select>
                
                </td>
            </tr>
            <?php
            $sql5 = "select DISTINCT version from cveven where title LIKE '%".$selected_title."%' "; 
            ?>
            <tr><!-- row 3-->
                <td>Version</td>
                <td>
                    <select name="ver" style="width:100%;height:50px;text-align: center;" onchange="this.form.submit();" >
                    
                    <?php
                    
                    
                    if($_REQUEST['ver']=="")
                     { ?>
                        <option  value="" selected="selected" >Select Version</option>
                        <?php
                     }else{
                         ?>
                        <option  value="<?php echo $_REQUEST['ver'];?>"><?php echo $_REQUEST['ver'];?></option>

                        <?php 
                     }
                         $result = $conn->query($sql5);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    //$veredition = $row['version']." ".$row['edition']	
                                ?>
                                
                                <option value="<?php echo $row['version'];?>"><?php echo $row['version'];?></option>
                                <?php
                                    $selected_ver = $_REQUEST['ver'];
                                    
                                ?>
                                 <?php } 
                            }else{
                                echo "0";
                            }
                              ?>
                    </select>
                </td>
            </tr>
            <?php
            $sql6 = "select DISTINCT edition from cveven where version LIKE '%".$selected_ver."%' "; 
            ?>
            <tr><!-- row 4-->
                <td>Edition</td>
                <td>
                    <select name="edition" style="width:100%;height:50px;text-align: center;" onchange="this.form.submit();" >
                    
                    <?php
                    
                    
                    if($_REQUEST['edition']=="")
                     { ?>
                        <option  value="" selected="selected" >Select Edition</option>
                        <?php
                     }else{
                         ?>
                        <option  value="<?php echo $_REQUEST['edition'];?>"><?php echo $_REQUEST['edition'];?></option>

                        <?php 
                     }
                         $result = $conn->query($sql6);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                ?>
                                
                                <option value="<?php echo $row['edition'];?>"><?php echo $row['edition'];?></option>
                                 <?php 
                                  $selected_edition = $_REQUEST['edition'];
                                $sql7 = "select DISTINCT namecve from cveven where title ='".$_REQUEST['title']."'
                                AND vendor='".$_REQUEST['vendor']."' AND version='".$_REQUEST['ver']."' AND edition='".$_REQUEST['edition']."' "; 
                                
                                } 
                            }else{
                                echo "0";
                            }
                              ?>
                    </select>
                </td>
            </tr>
            
           
        </table>

        </form>

           <?php 
                if(($selected_val=="")||($selected_title=="")||($selected_ver=="")){
                    
                    echo "Please select vendor,title and version ...";
                    
                    ?>

            <?php }else{ ?>
                <form action="indb.php" method="post">
                    <input type="hidden" name="getvendor" value="<?php echo $_REQUEST['vendor'];?>" >   
                    <input type="hidden" name="gettitle" value="<?php echo $_REQUEST['title'];?>" >   
                    <input type="hidden" name="getversion" value="<?php echo $_REQUEST['ver'];?>" >   
                    <input type="hidden" name="getedition" value="<?php echo $_REQUEST['edition'];?>" >   

                    <input class="pure-button" type="submit" value="Send value to Database"/>
                </form>

            <?php } ?>
             

    </div> 


    </div>


    </div>




<script src="js/ui.js"></script>

</body>
</html>
