<?php 
     $xml=simplexml_load_file("nvdcve-2018.xml")or die("Error: Cannot create object");
    
     //print_r($xml);

     foreach ($xml->children() as $row) {
      //$num ="";
      //$edition="";
         // echo $row->attributes()->name."<br>";
        // echo $row->attributes()->published."<br>";
        // echo $row->attributes()->modified."<br>";
         //echo $row->desc->descript."<br>";
         //echo $row->vuln_soft->preg_match("/prod\sname/i","prod name", $matches);
         //echo $row->vuln_soft->prod->name."<br>";
        
         //echo $row->attributes()->desc->descript->source."<br>";
         //echo $xml->entry->desc->descript['source']."<br>";
         //echo $row->attributes()->name."<br>";
        
          //echo $row->vuln_soft->prod['name']."<br>";
        //  echo $row->vuln_soft->prod['vendor']."<br>";
        // foreach($row->vuln_soft->prod->vers->attributes()->num as $num) {
        //   echo $num;
        // }
        //  echo $row->vuln_soft->prod->vers['edition']."<br>";

       // echo $row->vuln_soft->prod->getAttribute('name')."<br>";

       //echo  $row->vuln_soft->prod->attributes()->name."<br>";
       //foreach($row->vuln_soft->prod as $item){
       
        //echo (string)$item->attributes()->name."<br>";
        //echo (string)$item->attributes()->vendor."<br>";
       //}
      //  foreach($row->vuln_soft->prod->vers as $item){
         
      //   echo (string)$item->attributes()->num." ".(string)$item->attributes()->edition."<br>";
        //echo (string)$item->attributes()->edition."<br>";
       
            
        foreach($row->vuln_soft->prod->vers as $item){
          $num = (string)$item->attributes()->num;
          $edition =  (string)$item->attributes()->edition;
          echo $row->attributes()->name."<br>";
          foreach($row->vuln_soft->prod as $item){
          echo (string)$item->attributes()->name."<br>";
            echo (string)$item->attributes()->vendor."<br>";
          }
          echo $num."".$edition."<br>";
         }
         
       }
      
    
    // $dom = new DOMDocument();
    // $dom->preserveWhiteSpace = false;
    // $dom->load('nvdcve-2018.xml');
    // $x = $dom->documentElement;

    // $test1 = $dom->getElementsByTagName('prod');
    // $test2 = $dom->getElementsByTagName('vers');
    // $test3 = $dom->getElementsByTagName('entry');

    // foreach ($test3 as $cvname) {
    //   $namecve=$cvname->getAttribute('name');
    //   echo $namecve."<br>";
      // foreach($test1 AS $hname){
      //     $name=$hname->getAttribute('name');
      //     echo $name."<br>";
          
      //     foreach($test2 AS $gname){
      //       $num=$gname->getAttribute('num');
            
      //       echo $num."<br>";
      //       echo $name."<br>";
            
  
      //   }
      // }
     
    //}
   
  


    // foreach ($x->childNodes as $row) {
    //   $cvename=$row->getAttribute('name');
      //echo $row->getAttribute('name')."<br>";
    //   echo $row->getAttribute('name')."<br>";
    //  foreach( $dom->getElementsByTagName('prod') as $ha ){
    //   foreach( $dom->getElementsByTagName('vers') as $ver2 ){
    //     //echo $row->getAttribute('name')."<br>";
    //     echo $ha->getAttribute('name')."<br>";
    //     echo $ver2->getAttribute('num')."<br>";

     // }
    //  }
      
     
    //   }

    // foreach($test3 AS $gname)
    // {
    //   $cvename=$gname->getAttribute('name');
    //   echo $cvename."<br>";
    // }
    
    // foreach($test3 AS $gname)
    // {
    //   $cvename=$gname->getAttribute('name');
    //   //echo $cvename."<br>";
    //     foreach($test1 AS $gname)
    //       {
    //          $name=$gname->getAttribute('name');
    //           $vendor=$gname->getAttribute('vendor');
    //           //echo $name."<br>";
    //           //echo $vendor."<br>";
    //           foreach($test2 AS $gname){
    //               $num=$gname->getAttribute('num');
    //               $edition=$gname->getAttribute('edition');
        
    //               //echo $num."<br>";
    //               //echo $edition."<br>";
    //           }
    //       }

    // }
   
   


?>