<?php
    $conn = mysql_connect("localhost", "root","");
    $objDB = mysql_select_db("cvedb");


    $objCSV = fopen("2018-13-09_ip-blocklist.csv", "r");
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE){

    $strSQLcheck = 'SELECT * FROM testcsv where ip ="'.$objArr[0].'" ';
    $objQuerycheck = mysql_query($strSQLcheck);
    $objResultcheck = mysql_fetch_row($objQuerycheck);
    //$num = count($objArr);

    //echo $objArr[0];
    //$result = $conn->query($strSQLcheck);
    //$objResultcheck = mysqlร_fetch_assoc($result);
    
            $t = time();
            $time = (date("Y-m-d",$t));

            if(!$objResultcheck){
            $strSQL = "INSERT INTO testcsv ";
            $strSQL .="(ip,timestamp) ";
            $strSQL .="VALUES ";
            $strSQL .="('".$objArr[0]."','".$time."')";
            $objQuery = mysql_query($strSQL);
            }
        
    }
    fclose($objCSV);
   
    ?>
    Data Import/Inserted.