<?php
    $conn = mysql_connect("localhost", "root","");
    $objDB = mysql_select_db("cvedb");


    $objCSV = fopen("2018-12-09_ip-blocklist.csv", "r");
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE){

    $strSQLcheck = 'SELECT * FROM testcsv where ip ="'.$objArr[0].'" ';
    $objQuerycheck = mysql_query($strSQLcheck);
    
    $objResultcheck = mysql_fetch_row($objQuerycheck);

    //echo $objArr[0];
    //$result = $conn->query($strSQLcheck);
    //$objResultcheck = mysqlร_fetch_assoc($result);
         
        if(!$objResultcheck){
        $strSQL = "INSERT INTO testcsv ";
        $strSQL .="(ip) ";
        $strSQL .="VALUES ";
        $strSQL .="('".$objArr[0]."')";
        $objQuery = mysql_query($strSQL);
        }
    }
    fclose($objCSV);
   
    ?>
    Data Import/Inserted.