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
            <h1>IP Blocklist</h1>
        </div>

        
            <?php
                include('connectdb.php');   
                // $sql2 = "select * from testcsv";
                //$result = mysqli_query($conn, $sql2);
                // $result = $conn->query($sql2);
                // $count = $result->num_rows;
                //echo $count."<br>";

                $d=strtotime("today");
                $today = date("Y-m-d", $d);
                //echo $today;
                // $mon=strtotime("last monday");
                // $lastmon = date("Y-m-d", $mon);
                //lastweek
                $mi1=strtotime("-1 days");
                $minus1 = date("Y-m-d", $mi1);
                $mi2=strtotime("-2 days");
                $minus2 = date("Y-m-d", $mi2);
                $mi3=strtotime("-3 days");
                $minus3 = date("Y-m-d", $mi3);
                $mi4=strtotime("-4 days");
                $minus4 = date("Y-m-d", $mi4);
                $mi5=strtotime("-5 days");
                $minus5 = date("Y-m-d", $mi5);
                $mi6=strtotime("-6 days");
                $minus6 = date("Y-m-d", $mi6);
                $mi7=strtotime("-7 days");
                $minus7 = date("Y-m-d", $mi7);
                //last month
                // $mimo1=strtotime("-2 month");
                // $mimonth1 = date("Y-m-d", $mimo1);
                //echo $mimonth1;
                

                $d1=strtotime("-7 days");
                $lastweek = date("Y-m-d", $d1);
                //echo $lastweek;

                // $fm=strtotime("first day of previous month");
                // $firstmonths = date("Y-m-d", $fm);
                 $lm=strtotime("last day of previous month");
                $lastmonths = date("Y-m-d", $lm);

                $fjan=strtotime("first day of January");
                $firstJanuary = date("Y-m-d", $fjan);
                $ljan=strtotime("last day of January");
                $lastJanuary = date("Y-m-d", $ljan);

                $ffeb=strtotime("first day of February");
                $firstFebruary = date("Y-m-d", $ffeb);
                $lfeb=strtotime("last day of February");
                $lastFebruary = date("Y-m-d", $lfeb);

                $fmar=strtotime("first day of March");
                $firstMarch  = date("Y-m-d", $fmar);
                $lmar=strtotime("last day of March");
                $lastMarch = date("Y-m-d", $lmar);

                $fapr=strtotime("first day of April");
                $firstApril = date("Y-m-d", $fapr);
                $lapr=strtotime("last day of April");
                $lastApril = date("Y-m-d", $lapr);

                $fmay=strtotime("first day of May");
                $firstMay = date("Y-m-d", $fmay);
                $lmay=strtotime("last day of May");
                $lastMay = date("Y-m-d", $lmay);

                $fjune=strtotime("first day of June");
                $firstJune = date("Y-m-d", $fjune);
                $ljune=strtotime("last day of June");
                $lastJune = date("Y-m-d", $ljune);

                $fju=strtotime("first day of July");
                $firstJuly = date("Y-m-d", $fju);
                $lju=strtotime("last day of July");
                $lastJuly = date("Y-m-d", $lju);

                $faug=strtotime("first day of August");
                $firstAugust = date("Y-m-d", $faug);
                $laug=strtotime("last day of August");
                $lastAugust = date("Y-m-d", $laug);

                $fsep=strtotime("first day of September");
                $firstSeptember = date("Y-m-d", $fsep);
                $lsep=strtotime("last day of September");
                $lastSeptember = date("Y-m-d", $lsep);

                $foct=strtotime("first day of October");
                $firstOctober = date("Y-m-d", $foct);
                $loct=strtotime("last day of October");
                $lastOctober = date("Y-m-d", $loct);

                $fnov=strtotime("first day of November");
                $firstNovember = date("Y-m-d", $fnov);
                $lnov=strtotime("last day of November");
                $lastNovember = date("Y-m-d", $lnov);

                $fde=strtotime("first day of December");
                $firstDecember = date("Y-m-d", $fde);
                $lde=strtotime("last day of December");
                $lastDecember = date("Y-m-d", $lde);
                //echo $lastmonths;
                
            ?>
        <div class="content">
        <form class="pure-form pure-form-stacked"  medthod="post" action="">
             <select name="time"  style="width:100%;height:50px;text-align: center;"  onchange="this.form.submit();" >
                

                <?php
                    if($_REQUEST['time']==""){?>
                         <option  value="<?php echo $today ?>" selected="selected" >To day</option>
                    <?php }elseif($_REQUEST['time']=="$today"){?>
                        <option  value="<?php echo $_REQUEST['time']; ?>"><?php echo "To day" ?></option>
                     <?php }elseif($_REQUEST['time']=="$lastweek"){ ?>
                        <option  value="<?php echo $_REQUEST['time']; ?>"><?php echo "Last week" ?></option>
                     <?php }elseif($_REQUEST['time']=="$lastmonths"){ ?>
                        <option  value="<?php echo $_REQUEST['time']; ?>"><?php echo "Last Months" ?></option>    
                <?php } ?>
                <option  name="<?php echo $today ?>" value="<?php echo $today ?>">To day</option>
                <option  name="<?php echo $lastweek ?>" value="<?php echo $lastweek ?>">Last week</option>
                <option  name="<?php echo $lastmonths ?>" value="<?php echo $lastmonths ?>">Last Months</option>
                
                <?php $selected_time = $_REQUEST['time']; ?>
             </select>  

        <form>
        <!-- </div> -->

        <div class="chart-container" style="position: relative; height:20vh; width:60vh; margin:0 auto;">
            <?php
            if($selected_time==$lastweek){?>
                <canvas id="Chartlastweek"></canvas>
                <?php 
                //minus 1
                 $sqlminus1 = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$minus1."%' ";
                 $resultminus1 = mysqli_query($conn,$sqlminus1);
                 while($row = mysqli_fetch_assoc($resultminus1)) {
                    $dateminus1 =  $row['Number of Rows'];   
                 }
                //minus 2
                 $sqlminus2 = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$minus2."%' ";
                 $resultminus2 = mysqli_query($conn,$sqlminus2);
                 while($row = mysqli_fetch_assoc($resultminus2)) {
                    $dateminus2 =  $row['Number of Rows'];   
                 }
                 //minus 3
                 $sqlminus3 = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$minus3."%' ";
                 $resultminus3 = mysqli_query($conn,$sqlminus3);
                 while($row = mysqli_fetch_assoc($resultminus3)) {
                    $dateminus3 =  $row['Number of Rows'];   
                 }
                 //minus 4
                 $sqlminus4 = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$minus4."%' ";
                 $resultminus4 = mysqli_query($conn,$sqlminus4);
                 while($row = mysqli_fetch_assoc($resultminus4)) {
                    $dateminus4 =  $row['Number of Rows'];   
                 }
                 //minus 5
                 $sqlminus5 = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$minus5."%' ";
                 $resultminus5 = mysqli_query($conn,$sqlminus5);
                 while($row = mysqli_fetch_assoc($resultminus5)) {
                    $dateminus5 =  $row['Number of Rows'];   
                 }
                 //minus 6
                 $sqlminus6 = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$minus6."%' ";
                 $resultminus6 = mysqli_query($conn,$sqlminus6);
                 while($row = mysqli_fetch_assoc($resultminus6)) {
                    $dateminus6 =  $row['Number of Rows'];   
                 }
                 //minus 7
                 $sqlminus7 = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$minus7."%' ";
                 $resultminus7 = mysqli_query($conn,$sqlminus7);
                 while($row = mysqli_fetch_assoc($resultminus7)) {
                    $dateminus7 =  $row['Number of Rows'];   
                 }


                ?>
            <?php }elseif($selected_time==$lastmonths){ ?>
                <canvas id="Chartlastmonths"></canvas>
                <?php 
                //jan
                $sqljan = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstJanuary' AND '$lastJanuary' ";
                $resultmijan = mysqli_query($conn,$sqljan);
                while($row = mysqli_fetch_assoc($resultmijan)) {
                   $datejan =  $row['Number of Rows'];   
                }
                //feb
                $sqlfeb = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstFebruary' AND '$lastFebruary' ";
                $resultmifeb = mysqli_query($conn,$sqlfeb);
                while($row = mysqli_fetch_assoc($resultmifeb)) {
                   $datefeb =  $row['Number of Rows'];   
                }
                //March
                $sqlmar = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstMarch' AND '$lastMarch' ";
                $resultmimar = mysqli_query($conn,$sqlmar);
                while($row = mysqli_fetch_assoc($resultmimar)) {
                   $datemar =  $row['Number of Rows'];   
                }
                //April
                $sqlapr = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstApril' AND '$lastApril' ";
                $resultmiapr = mysqli_query($conn,$sqlapr);
                while($row = mysqli_fetch_assoc($resultmiapr)) {
                   $dateapr =  $row['Number of Rows'];   
                }
                //May
                $sqlmay = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstMay' AND '$lastMay' ";
                $resultmimay = mysqli_query($conn,$sqlmay);
                while($row = mysqli_fetch_assoc($resultmimay)) {
                   $datemay =  $row['Number of Rows'];   
                }
                //June
                $sqljune = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstJune' AND '$lastJune' ";
                $resultmijune = mysqli_query($conn,$sqljune);
                while($row = mysqli_fetch_assoc($resultmijune)) {
                   $datejune =  $row['Number of Rows'];   
                }
                //July
                $sqlju = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstJuly' AND '$lastJuly' ";
                $resultmiju = mysqli_query($conn,$sqlju);
                while($row = mysqli_fetch_assoc($resultmiju)) {
                   $dateju =  $row['Number of Rows'];   
                }
                //August
                $sqlaug = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstAugust' AND '$lastAugust' ";
                $resultmiaug = mysqli_query($conn,$sqlaug);
                while($row = mysqli_fetch_assoc($resultmiaug)) {
                   $dateaug =  $row['Number of Rows'];   
                }
                //September
                $sqlsep = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstSeptember' AND '$lastSeptember' ";
                $resultmisep = mysqli_query($conn,$sqlsep);
                while($row = mysqli_fetch_assoc($resultmisep)) {
                   $datesep =  $row['Number of Rows'];   
                }
                //October
                $sqloct = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstOctober' AND '$lastOctober' ";
                $resultmioct = mysqli_query($conn,$sqloct);
                while($row = mysqli_fetch_assoc($resultmioct)) {
                   $dateoct =  $row['Number of Rows'];   
                }
                //November
                $sqlnov = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstNovember' AND '$lastNovember' ";
                $resultminov = mysqli_query($conn,$sqlnov);
                while($row = mysqli_fetch_assoc($resultminov)) {
                   $datenov =  $row['Number of Rows'];   
                }

                //December
                 $sqlde = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp between '$firstDecember' AND '$lastDecember' ";
                 $resultmide = mysqli_query($conn,$sqlde);
                 while($row = mysqli_fetch_assoc($resultmide)) {
                    $datede =  $row['Number of Rows'];   
                 }
                 ?>

            <?php }else{ ?>
                <canvas id="Charttoday"></canvas>
                <?php $sql = "SELECT count(timestamp)as 'Number of Rows' from ipblock where timestamp LIKE '%".$today."%' ";
                 //$result = $conn->query($sql);
                 $result = mysqli_query($conn,$sql);
                 while($row = mysqli_fetch_assoc($result)) {
                    $date =  $row['Number of Rows'];    
                 }

                ?>
            <?php } ?>
        

        <table class="pure-table pure-table-horizontal" cellpadding="8" cellspacing="1" border="1" width="100%">
                    <?php 
                     include('connectdb.php');
                     $results_per_page = 20;
                     if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                     $start_from = ($page-1) * $results_per_page;
                     //$sql = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
                     //$query = mysql_real_escape_string($_REQUEST["query"]);  
                     $sqlc = "select * from ipblock LIMIT $start_from, ".$results_per_page; 
                    
                     
                    $result = $conn->query($sqlc);
                    if ($result->num_rows > 0) {?>
                    <tr>
    	                <th style="text-align:center; width:150px; background-color:#DCDCDC; color:#1E90FF" >IP</th>
                        <th style="text-align:center; width:150px; background-color:#DCDCDC;color:#1E90FF">Update on</th>
                        
                     </tr>
                         <?php
                             while($row = $result->fetch_assoc()) {?>
                        <tr>
                        <td style="text-align:center;"><?php echo $row['ip'];?></td>
                        <td style="text-align:center;" ><?php echo $row['timestamp'];?></td>
                     <?php 
                        }
                     }else{
                            echo "0";
                        } ?>
                    </tr>
                </table>

                <?php
                 $sqldownload = "select * from ipblock INTO OUTFILE '".$today.".txt'"; 
                 $resultdownload = $conn->query($sqldownload);
                 
                ?>
                <!-- <a href="download/".$today.".zip" download>Download link here</a> -->
               

                
                
                <?php
                    $sqlcount = "select * from ipblock";
                   
                    $resultcount = $conn->query($sqlcount);
                    $records = $resultcount->num_rows;
                    
                    $total_pages = ceil($records / $results_per_page);
                    
                    for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                   //  echo "<a href='searchcve.php?page=".$i."'";
                   //      if ($i==$page)  echo " class='curPage'";
                   //  echo ">".$i."</a> "; 
                       echo "<a href='ipblock.php?time=".$today."&page=".$i."'>".$i."</a> ";
                    }
               ?>
        </div>


    </div>


            <script>
                var ctx = document.getElementById("Charttoday");
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Today"],
                        datasets: [{
                            label: '# of Votes',
                            data: [<?php echo $date ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        
                    }
                });
                </script>

                <script>
                var ctx = document.getElementById("Chartlastmonths");
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
                        datasets: [{
                            label: '# of Votes',
                            data: [<?php echo $datejan ?>,<?php echo $datefeb ?>,<?php echo $datemar ?>,<?php echo $dateapr ?>,<?php echo $datemay ?>,
                            <?php echo $datejune ?>,<?php echo $dateju ?>,<?php echo $dateaug ?>,<?php echo $datesep ?>,<?php echo $dateoct ?>,
                            <?php echo $datenov ?>,<?php echo $datede ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                '#fa8072',
                                '#40e0d0',
                                '#adff2f',
                                '#ffd700',
                                '#9932cc',
                                '#98fb98'

                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        
                    }
                });
                </script>

                <script>
                var ctx = document.getElementById("Chartlastweek");
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["1 day ago", "2 day ago", "3 day ago", "4 day ago", "5 day ago","6 day ago","7 day ago"],
                        datasets: [{
                            label: '# of Votes',
                            data: [<?php echo $dateminus1 ?>,<?php echo $dateminus2 ?>,<?php echo $dateminus3 ?>,<?php echo $dateminus4 ?>,
                            <?php echo $dateminus5 ?>, <?php echo $dateminus6 ?>,<?php echo $dateminus7 ?>],
                            backgroundColor: [
                                '#ff0000',
                                '#ffff00',
                                '#ff00ff',
                                '#40ff00',
                                '#ffbf00',
                                '#0040ff',
                                '#bf00ff'
                            ],
                            // borderColor: [
                            //     'rgba(255,99,132,1)',
                            //     'rgba(54, 162, 235, 1)',
                            //     'rgba(255, 206, 86, 1)',
                            //     'rgba(75, 192, 192, 1)',
                            //     'rgba(153, 102, 255, 1)',
                            //     'rgba(255, 159, 64, 1)'
                            // ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        
                    }
                });
                </script>
        
    </div>
    </div>

        




<script src="js/ui.js"></script>

</body>
</html>
