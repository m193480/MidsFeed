<?php

/* reads in a CSV file and its headers.  Returns the data of the file excluding the headers. */
function readCSV($filename)
  {
    if($fp = fopen("$filename", 'r'))
      {
        while($line = fgetcsv($fp, 0, "|"))
          {	
          	foreach($line as $key => $value)
          	{
          		document.write("Hello have ". $key);
          	}
          }
      }
  }
  readCSV("example.csv");

  /*
 echo "<form method='post' action='?'>";
 $i = 1;
 foreach($_SESSION['questions'][$questionNumber]['options'] as $key)
 {
   echo "$key <input type='radio' name='$i' value='$i'>";
   $i++;
 }*/
  ?>
