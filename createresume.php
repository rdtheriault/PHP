<html>
<head>

</head>
<body>


<?php
 function isNotEmpty($test){
 #echo $test;
 if (empty($test)) {return false;}
 else {return true;}
}

#function functionName() {
  #code to be executed;
#}
 
?>

<?php

$resume = "";

if(isNotEmpty($_POST["name"])) {$resume = $_POST["name"]."\n\r";} 
if(isNotEmpty($_POST["add"])) {$resume = $resume.$_POST["add"]."\n\r";}
if(isNotEmpty($_POST["city"])) {$resume = $resume.$_POST["city"]." ".$_POST["state"].", ".$_POST["zip"]."\n\r";} 
if(isNotEmpty($_POST["phone"])) {$resume = $resume.$_POST["phone"]."\n\r";}
if(isNotEmpty($_POST["email"])) {$resume = $resume.$_POST["email"]."\n\r";}
$resume = $resume."\n\r";

$resume = $resume."\n\rEXPERIENCE\n\r";
if(isNotEmpty($_POST["title1"])){
$resume = $resume.$_POST["title1"]." ".$_POST["comp1"]." (".$_POST["date1a"]." - ".$_POST["date1b"].")\n\r";
if(isNotEmpty($_POST["task1a"])) {$resume = $resume."- ".$_POST["task1a"]."\n\r";}
if(isNotEmpty($_POST["task1b"])) {$resume = $resume."- ".$_POST["task1b"]."\n\r";}
if(isNotEmpty($_POST["task1c"])) {$resume = $resume."- ".$_POST["task1c"]."\n\r";}
if(isNotEmpty($_POST["task1d"])) {$resume = $resume."- ".$_POST["task1d"]."\n\r";}
if(isNotEmpty($_POST["task1e"])) {$resume = $resume."- ".$_POST["task1e"]."\n\r";}
$resume = $resume."\n\r";
}
if(isNotEmpty($_POST["title2"])){
$resume = $resume.$_POST["title2"]." ".$_POST["comp2"]." (".$_POST["date2a"]." - ".$_POST["date2b"].")\n\r";
if(isNotEmpty($_POST["task2a"])) {$resume = $resume."- ".$_POST["task2a"]."\n\r";}
if(isNotEmpty($_POST["task2b"])) {$resume = $resume."- ".$_POST["task2b"]."\n\r";}
if(isNotEmpty($_POST["task2c"])) {$resume = $resume."- ".$_POST["task2c"]."\n\r";}
if(isNotEmpty($_POST["task2d"])) {$resume = $resume."- ".$_POST["task2d"]."\n\r";}
if(isNotEmpty($_POST["task2e"])) {$resume = $resume."- ".$_POST["task2e"]."\n\r";}
$resume = $resume."\n\r";
}
if(isNotEmpty($_POST["title3"])){
$resume = $resume.$_POST["title3"]." ".$_POST["comp3"]." (".$_POST["date3a"]." - ".$_POST["date3b"].")\n\r";
if(isNotEmpty($_POST["task3a"])) {$resume = $resume."- ".$_POST["task3a"]."\n\r";}
if(isNotEmpty($_POST["task3b"])) {$resume = $resume."- ".$_POST["task3b"]."\n\r";}
if(isNotEmpty($_POST["task3c"])) {$resume = $resume."- ".$_POST["task3c"]."\n\r";}
if(isNotEmpty($_POST["task3d"])) {$resume = $resume."- ".$_POST["task3d"]."\n\r";}
if(isNotEmpty($_POST["task3e"])) {$resume = $resume."- ".$_POST["task3e"]."\n\r";}
$resume = $resume."\n\r";
}
if(isNotEmpty($_POST["title4"])){
$resume = $resume.$_POST["title4"]." ".$_POST["comp4"]." (".$_POST["date4a"]." - ".$_POST["date4b"].")\n\r";
if(isNotEmpty($_POST["task4a"])) {$resume = $resume."- ".$_POST["task4a"]."\n\r";}
if(isNotEmpty($_POST["task4b"])) {$resume = $resume."- ".$_POST["task4b"]."\n\r";}
if(isNotEmpty($_POST["task4c"])) {$resume = $resume."- ".$_POST["task4c"]."\n\r";}
if(isNotEmpty($_POST["task4d"])) {$resume = $resume."- ".$_POST["task4d"]."\n\r";}
if(isNotEmpty($_POST["task4e"])) {$resume = $resume."- ".$_POST["task4e"]."\n\r";}
$resume = $resume."\n\r";
}
if(isNotEmpty($_POST["title5"])){
$resume = $resume.$_POST["title5"]." ".$_POST["comp5"]." (".$_POST["date5a"]." - ".$_POST["date5b"].")\n\r";
if(isNotEmpty($_POST["task5a"])) {$resume = $resume."- ".$_POST["task5a"]."\n\r";}
if(isNotEmpty($_POST["task5b"])) {$resume = $resume."- ".$_POST["task5b"]."\n\r";}
if(isNotEmpty($_POST["task5c"])) {$resume = $resume."- ".$_POST["task5c"]."\n\r";}
if(isNotEmpty($_POST["task5d"])) {$resume = $resume."- ".$_POST["task5d"]."\n\r";}
if(isNotEmpty($_POST["task5e"])) {$resume = $resume."- ".$_POST["task5e"]."\n\r";}
$resume = $resume."\n\r";
}

$resume = $resume."\n\rEDUCATION\n\r";
if(isNotEmpty($_POST["school1"])){
$resume = $resume.$_POST["school1"]." (".$_POST["sdate1a"]." - ".$_POST["sdate1b"].")\n\r";
$resume = $resume.$_POST["degree1"]."\n\r";
if(isNotEmpty($_POST["sother1a"])) {$resume = $resume."- ".$_POST["sother1a"]."\n\r";}
if(isNotEmpty($_POST["sother1b"])) {$resume = $resume."- ".$_POST["sother1b"]."\n\r";}
$resume = $resume."\n\r";
}
if(isNotEmpty($_POST["school2"])){
$resume = $resume.$_POST["school2"]." (".$_POST["sdate2a"]." - ".$_POST["sdate2b"].")\n\r";
$resume = $resume.$_POST["degree2"]."\n\r";
if(isNotEmpty($_POST["sother2a"])) {$resume = $resume."- ".$_POST["sother2a"]."\n\r";}
if(isNotEmpty($_POST["sother2b"])) {$resume = $resume."- ".$_POST["sother2b"]."\n\r";}
$resume = $resume."\n\r";
}
if(isNotEmpty($_POST["school3"])){
$resume = $resume.$_POST["school3"]." (".$_POST["sdate3a"]." - ".$_POST["sdate3b"].")\n\r";
$resume = $resume.$_POST["degree3"]."\n\r";
if(isNotEmpty($_POST["sother3a"])) {$resume = $resume."- ".$_POST["sother3a"]."\n\r";}
if(isNotEmpty($_POST["sother3b"])) {$resume = $resume."- ".$_POST["sother3b"]."\n\r";}
$resume = $resume."\n\r";
}

$resume = $resume."\n\rTRAINING\n\r";
if(isNotEmpty($_POST["tyear1"])){
$resume = $resume.$_POST["tyear1"]." - ".$_POST["train1"]."\n\r";
if(isNotEmpty($_POST["tother1"])) {$resume = $resume."- ".$_POST["tother1"]."\n\r";}
}
if(isNotEmpty($_POST["tyear2"])){
$resume = $resume.$_POST["tyear2"]." - ".$_POST["train2"]."\n\r";
if(isNotEmpty($_POST["tother2"])) {$resume = $resume."- ".$_POST["tother2"]."\n\r";}
}
if(isNotEmpty($_POST["tyear3"])){
$resume = $resume.$_POST["tyear3"]." - ".$_POST["train3"]."\n\r";
if(isNotEmpty($_POST["tother3"])) {$resume = $resume."- ".$_POST["tother3"]."\n\r";}
}
if(isNotEmpty($_POST["tyear4"])){
$resume = $resume.$_POST["tyear4"]." - ".$_POST["train4"]."\n\r";
if(isNotEmpty($_POST["tother4"])) {$resume = $resume."- ".$_POST["tother4"]."\n\r";}
}
if(isNotEmpty($_POST["tyear5"])){
$resume = $resume.$_POST["tyear5"]." - ".$_POST["train5"]."\n\r";
if(isNotEmpty($_POST["tother5"])) {$resume = $resume."- ".$_POST["tother5"]."\n\r";}
}
$resume = $resume."\n\r";

$resume = $resume."\n\rCERTIFICATIONS\n\r";
if(isNotEmpty($_POST["cyear1"])){
$resume = $resume.$_POST["cyear1"]." - ".$_POST["cert1"]."\n\r";
if(isNotEmpty($_POST["cother1"])) {$resume = $resume."- ".$_POST["cother1"]."\n\r";}
}
if(isNotEmpty($_POST["cyear2"])){
$resume = $resume.$_POST["cyear2"]." - ".$_POST["cert2"]."\n\r";
if(isNotEmpty($_POST["cother2"])) {$resume = $resume."- ".$_POST["cother2"]."\n\r";}
}
if(isNotEmpty($_POST["cyear3"])){
$resume = $resume.$_POST["cyear3"]." - ".$_POST["cert3"]."\n\r";
if(isNotEmpty($_POST["cother3"])) {$resume = $resume."- ".$_POST["cother3"]."\n\r";}
}
if(isNotEmpty($_POST["cyear4"])){
$resume = $resume.$_POST["cyear4"]." - ".$_POST["cert4"]."\n\r";
if(isNotEmpty($_POST["cother4"])) {$resume = $resume."- ".$_POST["cother4"]."\n\r";}
}
if(isNotEmpty($_POST["cyear5"])){
$resume = $resume.$_POST["cyear5"]." - ".$_POST["cert5"]."\n\r";
if(isNotEmpty($_POST["cother5"])) {$resume = $resume."- ".$_POST["cother5"]."\n\r";}
}
$resume = $resume."\n\r";

echo nl2br(strip_tags($resume));
?>


<?php
    $handle = fopen("file.txt", "w");
    fwrite($handle, "");
    fclose($handle);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename('file.txt'));
    #header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('file.txt'));
    readfile('file.txt');
    exit;
?>


</body>
</html>
