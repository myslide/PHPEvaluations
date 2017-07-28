<?php

// We want to check the runtimes of accessing the 2 variables in this container.
class Container {

    private $var1 = "0";
    public $var2 = "0";
//offers a way to read a hidden variable by a single interface.
//drawback is, you are able to change the value by getVal()=xx;
    function getVar1() {
        return $this->var1;
    }
/**
 * Offers a way to manipulate a hidden variable by a single Interface. 
 * @param type $val
 */
    function setVar1($val) {
        $this->var1 = $val;
    }

}

//how many loops?
const ROUNDS = 1000000;
$toCheck = new Container();
$startOO = microtime(true);
for ($i = 0; $i < ROUNDS; $i++) {
    $toCheck->getVar1();
    $toCheck->setVar1($i);
}
$endOO = microtime(true);
$laufzeitOO = $endOO - $startOO;
echo 'OO-Runtime: ' . $laufzeitOO . " Sec.\n\r";

$start = microtime(true);
for ($i = 0; $i < ROUNDS; $i++) {
    $toCheck->var2;
    $toCheck->var2 = $i;
}
$end = microtime(true);
$laufzeit = $end - $start;
echo 'Simple Runtime: ' . $laufzeit . " Sec.\n\r";
$expense = 100 * ($laufzeitOO - $laufzeit) / $laufzeit;
echo('Expense=' . $expense . '% more of the OO kind of variable access !');
?>
   