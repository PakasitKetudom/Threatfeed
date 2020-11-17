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
                <h1>Search</h1>
                <h2>Search CVE</h2>
            </div>

        <div class="content">
        
        <form class="pure-form pure-form-stacked"  medthod="post" action="searchcve.php?query='$_REQUEST['query']'?sort=common&page=1" width="100%">
            <table class="pure-table" align="center">
                <tr>
                    <td>
                    <?php 
                          if(empty($_REQUEST['query'])){?>
                            <input type="text" name="query"  />
                            
                    <?php }else{ ?>
                            <input type="text" name="query" value="<?php echo $_REQUEST['query'] ?>" />
                            <?php $selected_query = $_REQUEST['query'];   ?>
                    <?php } ?>
                    </td>
                    <td><input class="pure-button" name="" type="submit" value="Search" /></td>
                    <td>Sort by Published</td>
                    <td>
                        
                            <select name="sort"  style="width:100%;height:50px;text-align: center;" onchange="this.form.submit();">
                        <?php
                            if(empty($_REQUEST['sort'])){
                            $selected_sort = "common" ?>
                        <?php }else{ ?>
                            <?php $selected_sort = $_REQUEST['sort']; ?>
                        <?php } ?>
                        <?php
                             if($_REQUEST['sort']==""){?>
                                <option  value="" >Select</option>   
                         <?php
                            }else{ 
                                if($_REQUEST['sort']=="common"){
                                    $saveselectname = "Common";
                                }elseif($_REQUEST['sort']=="desc"){
                                    $saveselectname = "From most to least";
                                }elseif($_REQUEST['sort']=="asc"){
                                    $saveselectname = "From least to most";
                                }?>
                              <option  value="<?php echo $_REQUEST['sort']; ?>"><?php echo $saveselectname ?></option>
                         <?php  } ?>
                                <option  name="common" value="common">Common</option>
                                <option  name="desc" value="desc">From most to least</option>
                                <option  name="asc" value="asc">From least to most</option>
                                <?php $selected_sort = $_REQUEST['sort']; ?>
                            </select>
                        
                    </td>
                
                    </tr>
                </table>

        </div>


        <?php 
            if(empty($_REQUEST['query'])){?>
                <div align="center">
                    <?php echo "Example : cve-2018-0001 (cve-year-number)"; ?>
                <div>

            <?php }else{ ?>
                <table class="pure-table pure-table-horizontal"  width="100%">
                    <?php 
                     include('connectdb.php');
                     $results_per_page = 20;
                     if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                     $start_from = ($page-1) * $results_per_page;
                     $query = $_REQUEST["query"];
                     $sort = $_REQUEST["sort"];  
                    ?>
                    
                    
                    <?php
                     if(($selected_sort=="")||($selected_sort=="common")){?>
                        <?php
                        $sql = "select * from datacve where namecve LIKE '%".$query."%' LIMIT $start_from, ".$results_per_page;
                        $result = $conn->query($sql); 
                        ?>
                    <?php }elseif($selected_sort=="desc"){ ?><!--if select1 -->
                        <?php
                            $sql = "select * from datacve where namecve LIKE '%".$query."%' ORDER BY published desc LIMIT $start_from, ".$results_per_page; 
                            $result = $conn->query($sql);
                       ?>
                    <?php }elseif($selected_sort=="asc"){ ?> <!-- close elseif2 --> 
                        <?php
                            $sql = "select * from datacve where namecve LIKE '%".$query."%' ORDER BY published asc LIMIT $start_from, ".$results_per_page; 
                            $result = $conn->query($sql);
                    }?>

                    <?php
                        if ($result->num_rows > 0) {?>
                            <tr>
                                <th style="text-align:center; width:150px; background-color:#DCDCDC; color:#1E90FF" >Name CVE</th>
                                <th style="text-align:center; width:150px; background-color:#DCDCDC;color:#1E90FF">Published</th>
                                <th style="text-align:center; width:150px; background-color:#DCDCDC;color:#1E90FF">Modified</th>
                                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Description</th>
                                <th style="text-align:center; background-color:#DCDCDC;color:#1E90FF">Cvss Score</th>
                            </tr>
                                <?php
                                    while($row = $result->fetch_assoc()) {	
                                ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $row['namecve'];?></td>
                                <td style="text-align:center;" ><?php echo $row['published'];?></td>
                                <td style="text-align:center;" ><?php echo $row['modified'];?></td>
                                <td style="text-align:left;" ><?php echo $row['description'];?></td>
                                <?php 
                                    if($row['cvss_score'] >= "9"){?>
                                        <td style="text-align:center; background-color:#FF0000; color:#000000;"><?php echo $row['cvss_score'];?></td>
                                            
                            <?php }elseif($row['cvss_score'] > "7" ){?>
                                        <td style="text-align:center; background-color:#ff6600;color:#000000;"><?php echo $row['cvss_score'];?></td>

                            <?php }elseif($row['cvss_score'] > "5" ){?>
                                        <td style="text-align:center; background-color:#FFA500;color:#000000;"><?php echo $row['cvss_score'];?></td>
                            <?php }elseif($row['cvss_score'] > "0"){?>
                                        <td style="text-align:center; background-color:#00FF00;color:#000000;"><?php echo $row['cvss_score'];?></td>
                            <?php }elseif(empty($row['cvss_score'])){?>
                                        <td style="text-align:center; background-color:#f0f0f0;color:#000000;"><?php echo $row['cvss_score'];?></td>
                            <?php }
                                }
                            }else{
                                    echo "0";
                                } ?>
                            </tr>

                            <?php //} ?> <!-- close elseif3 -->
            </table>
            <?php
                    $sqlcount = "select * from datacve where namecve LIKE '%".$query."%'";
                    $resultcount = $conn->query($sqlcount);
                    $records = $resultcount->num_rows;
                    $total_pages = ceil($records / $results_per_page);
            ?>
                                <?php
                                echo "Total : $total_pages &nbsp; " ;
                                if($page > 1){
                                    $pageminus = $page-1;
                                    echo "<a href='searchcve.php?query=".$query."&sort=".$sort."&page=".$pageminus."'>Back &nbsp;</a>";
                                }
                                echo "Page : " ;
                                ?>
                                <select name="page"  style="width:200px;height:50px;text-align: center;" onchange="this.form.submit();"> 
                                <?php $selectpages = ($_REQUEST['page']);
                                    if(empty($_REQUEST['page'])){?>
                                        <option value="<?php echo 1 ?>"><?php echo 1 ?></option>
                                    <?php }elseif(($_REQUEST['page'])== $selectpages){ ?>
                                        <option value="<?php echo $selectpages ?>"><?php echo $selectpages ?></option>
                                    <?php } ?>

                                    <?php for( $p=1; $p<=$total_pages;$p++){ ?>
                                    <option value="<?php echo $p ?>"><?php echo $p ?></option>
                                <?php } ?>
                                </select>

                                <?php
                                if($page < $total_pages) {
                                    $pageplus = $page+1;
                                    echo "<a href='searchcve.php?query=".$query."&sort=".$sort."&page=".$pageplus."'>Next</a>";
                                }
                                ?>

                    </form>
            
             <!-- </form> --> <!--close form 87 -->
        <?php } ?> 



    </div>
    </div>
    




<script src="js/ui.js"></script>

</body>
</html>
