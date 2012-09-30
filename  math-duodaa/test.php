<?php 



$string = "The quick brown fox jumped over the lazy dog.<br>";
print $string;

$patterns[0] = "/quick/";
$patterns[1] = "/brown/";
$patterns[2] = "/fox/";

$replacements[2] = "bear";
$replacements[1] = "black";
$replacements[0] = "slow";

print preg_replace($patterns, $replacements, $string);

/* Output
   ======

The bear black slow jumped over the lazy dog.

*/

/* By ksorting patterns and replacements,
   we should get what we wanted. */

ksort($patterns);
ksort($replacements);

print preg_replace($patterns, $replacements, $string);

/* Output
   ======

The slow black bear jumped over the lazy dog.

*/

?>