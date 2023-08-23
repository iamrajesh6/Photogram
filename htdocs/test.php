<pre>
<?php
include 'libs/load.php';
include_once 'libs/includes/mic.class.php';

// if(signup("iamrajesh", "12345", "raj@gmail.com", "1234567890")) {
//     echo "done";
// } else {
//     echo "fail";
// }
//

$mic1 = new mic("rolex");
$mic2= new mic("Leo");

$mic1->brand = "BMW";
$mic2->brand = "AUDI";

$mic1->light = "Blue";

$mic1->setlight("Red");
$mic2->setlight("Ash");

$mic1->setmodel("city");
print("Model of 1st MIc is".$mic1->getmode());
print($mic1->light);
print($mic2->light);
print($mic1->getbrand());
?>
</pre>