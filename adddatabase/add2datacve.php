<?php
$conn = mysqli_connect("localhost", "root","", "cvedb");



//$xml = simplexml_load_file("nvdcve-2016.xml") or die("Error: Cannot create object");
//$xml = simplexml_load_file("nvdcve-2017.xml") or die("Error: Cannot create object");
$xml = simplexml_load_file("nvdcve-2018.xml") or die("Error: Cannot create object");


 foreach ($xml->children() as $row) {

       $namecve = $row->attributes()->name;
       $published = $row->attributes()->published;
       $modified =  $row->attributes()->modified;
       $descript = $row->desc->descript;
       $cvss_score = $row->attributes()->CVSS_score;

    $sql = "INSERT INTO datacve(namecve,published,modified,description,cvss_score) 
     VALUES ('" . $namecve . "','" . $published . "','" . $modified . "','" . $descript . "','" . $cvss_score . "')";

     $result = mysqli_query($conn, $sql);
}
?>
<h2>Insert XML Data to MySql Table Output</h2>
