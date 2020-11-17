<?php
$conn = mysqli_connect("localhost", "root","", "cvedb");

$affectedRow = 0;

//$xml = simplexml_load_file("nvdcve-2016.xml") or die("Error: Cannot create object");
//$xml = simplexml_load_file("nvdcve-2017.xml") or die("Error: Cannot create object");
$xml = simplexml_load_file("nvdcve-2018.xml") or die("Error: Cannot create object");

// $dom = new DOMDocument();
// $dom->preserveWhiteSpace = false;
// $dom->load('nvdcve-2018.xml');
// $x = $dom->documentElement;

// $test1 = $dom->getElementsByTagName('prod');
// $test2 = $dom->getElementsByTagName('vers');
// $test3 = $dom->getElementsByTagName('entry');

// foreach ($x->childNodes as $row) {
// foreach($test1 AS $hname){
//     $name=$hname->getAttribute('name');
// foreach($test2 AS $gname){
//         $num=$gname->getAttribute('num');
  

// foreach($test3 AS $gname)
//     {
//       $cvename=$gname->getAttribute('name');
//       //echo $cvename;
//         foreach($test1 AS $gname)
//           {
//              $title=$gname->getAttribute('name');
//               $vendor=$gname->getAttribute('vendor');
//             //   echo $name."<br>";
//             //   echo $vendor."<br>";
//               foreach($test2 AS $gname){
//                   $num=$gname->getAttribute('num');
//                   $edition=$gname->getAttribute('edition');
        
//                 //   echo $num."<br>";
//                 //   echo $edition."<br>";
//               }
//           }

//     }

 foreach ($xml->children() as $row) {

           //$namecve = $row->attributes()->name;
          // $title = "";
          // $vendor="";
        //    $num="";
        //    $edition ="";
//         $published = $row->attributes()->published;
//          $modified =  $row->attributes()->modified;
//         $descript = $row->desc->descript;
//         $cvss_score = $row->attributes()->CVSS_score;
//          $name =  $row->vuln_soft->prod['name'];
//          $vendor = $row->vuln_soft->prod['vendor'];
//          $version =$row->vuln_soft->prod->vers['num'];
//         $edition = $row->vuln_soft->prod->vers['edition'];
//     foreach($row->vuln_soft->prod as $item){
//         $title = (string)$item->attributes()->name;
//         $vendor =  (string)$item->attributes()->vendor;
//    }
   foreach($row->vuln_soft->prod->vers as $item){
    $num = (string)$item->attributes()->num;
    $edition =  (string)$item->attributes()->edition;
    $namecve = $row->attributes()->name;
    foreach($row->vuln_soft->prod as $item){
        $title =  (string)$item->attributes()->name;
        $vendor = (string)$item->attributes()->vendor;

        $sql = "INSERT INTO cveven(namecve,title,vendor,version,edition) 
        VALUES ('" . $namecve . "','" . $title . "','" . $vendor . "','" . $num  . "','" . $edition . "')";
        $result = mysqli_query($conn, $sql);
        
        if (! empty($result)) {
            $affectedRow ++;
        } else {
            $error_message = mysqli_error($conn) . "\n";
        }
       }
        }
    
        
    
    //$sql = "INSERT INTO cve2016(namecve,published,modified,description) VALUES ('" . $namecve . "','" . $published . "','" . $modified . "','" . $descript . "')";
    //$sql = "INSERT INTO cve2017(namecve,published,modified,description) VALUES ('" . $namecve . "','" . $published . "','" . $modified . "','" . $descript . "')";
    //$sql = "INSERT INTO cve2018(namecve,published,modified,description,cvss_score,name,vendor,version,edition)  VALUES ('" . $namecve . "','" . $published . "','" . $modified . "','" . $descript . "','" . $cvss_score . "','" . $name . "','" . $vendor . "','" . $version  . "','" . $edition  . "')";
    //$sql = "INSERT INTO testin(namecve,title,vendor,version,edition) VALUES ('" . $namecve . "','" . $title . "','" . $vendor . "','" . $num . "','" . $edition    . "')";
    //$sql = "INSERT INTO test2(version,edition) VALUES ('" . $num . "','" . $edition . "')";

    //$sql = "UPDATE testin SET version=$num edition= WHERE $namecve=$namecve";

    // $result = mysqli_query($conn, $sql);
    
    // if (! empty($result)) {
    //     $affectedRow ++;
    // } else {
    //     $error_message = mysqli_error($conn) . "\n";
    // }
//}
}


?>
<h2>Insert XML Data to MySql Table Output</h2>
<?php
if ($affectedRow > 0) {
    $message = $affectedRow . " records inserted";
} else {
    $message = "No records inserted";
}

?>