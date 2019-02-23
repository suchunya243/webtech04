<?php
         $file = fopen(basename($_FILES["filepath"]["name"]),"r");
         $subjectID = array();
         $subjectName = array();
         $credit = array();
         $grade = array();
         $total_credit = 0;
         $total_gXc = 0;
         $i = 0;
         while(($row = fgetcsv($file,0,","))!== FALSE) {
         if($i!==0){
             $subjectID[] = $row[0];
             $subjectName[] = $row[1];
             $credit[] = $row[2];
             $grade[] = $row[3];
         }
         $i++;
         $arrlength = count($subjectID);
         for($j = 0; j < $arrlength; $j++){
            echo $subjectName[$j];
            echo "<br>";
         }
        ?>