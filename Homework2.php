<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function convertMyString($myString)
{
    $clearString = str_replace("_", " ", $myString);
    $clearString = ucwords($clearString);
    $clearString = lcfirst($clearString);
    $clearString = str_replace(" ", "", $clearString);
    return $clearString;
}

function outputNumbersWhichContainsThree($a)
{
    $arrayWithThree = [];
    $length = count($a);
    for ($i = 0; $i < $length; $i++) {
        $ourNumber = $a[$i];
        $lengthOfOurNumber = strlen($ourNumber);
        $splitArray = str_split($ourNumber);
        for ($j = 0; $j < $lengthOfOurNumber; $j++) {
            if ($splitArray[$j] == 3) {
                array_push($arrayWithThree, $ourNumber);
                break;
            }
        }
    }
    return $arrayWithThree;
}

function countOfThreeNumberInArray($a)
{
    $threeCounter = 0;
    $length = count($a);
    for ($i = 0; $i < $length; $i++) {
        $ourNumber = $a[$i];
        $lengthOfOurNumber = strlen($ourNumber);
        $splitArray = str_split($ourNumber);
        for ($j = 0; $j < $lengthOfOurNumber; $j++) {
            if ($splitArray[$j] == 3) {
                $threeCounter++;
            }
        }
    }
    return $threeCounter;
}

function bandName($simpleString)
{
    $lengthOfSimpleString = strlen($simpleString);
    $splitSimpleString = str_split($simpleString);
    if ($splitSimpleString[0] === $splitSimpleString[$lengthOfSimpleString - 1]) {
        $simpleString = ucfirst($simpleString);
        $simpleStringWithoutFirsLetter = $simpleString;
        $simpleStringWithoutFirsLetter = substr($simpleStringWithoutFirsLetter, 1);
        return $simpleString . $simpleStringWithoutFirsLetter;

    }
    elseif ($splitSimpleString[0] !== $splitSimpleString[$lengthOfSimpleString - 1]) {
        $simpleString = ucfirst($simpleString);
        $theString = "The";
        return $theString." ".$simpleString;
    }
}

function charsConverter($myString, $firstChar, $secondChar, $thirdChar, $fourthChar)
{
    $length = strlen($myString);
    $mySplitString = str_split($myString);
    for ($i = 0; $i < $length; $i++) {
        if ($mySplitString[$i] === $secondChar) {
            $mySplitString[$i] = $firstChar;
        } elseif ($mySplitString[$i] === $firstChar) {
            $mySplitString[$i] = $secondChar;
        } elseif ($mySplitString[$i] === $thirdChar) {
            $mySplitString[$i] = $fourthChar;
        } elseif ($mySplitString[$i] === $fourthChar) {
            $mySplitString[$i] = $thirdChar;
        }
    }
    $convertString = implode($mySplitString);
    return $convertString;
}

function mb_strrev($str)
{
    $r = '';
    for ($i = mb_strlen($str); $i>=0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}

function reversWords($myString)
{
    $mySplitString = preg_split('/[\s]+/', $myString, null, PREG_SPLIT_NO_EMPTY);
    $newArray = [];
    for ($i = 0; $i < count($mySplitString); $i++) {
        $reversWord = $mySplitString[$i];
        $reversWord = mb_strrev($reversWord);
        array_push($newArray, $reversWord);
    }
    $reversString = implode(" ", $newArray);
    return $reversString;
}

echo "<hr /> TASK 2.1 <hr /><br />";
echo convertMyString("var_test_text");

echo "<hr /> TASK 2.2 <hr /><br />";
echo reversWords("ФЫВА олдж");

echo "<hr /> TASK 2.3 <hr /><br />";
$a = [342, 55, 33, 123, 66, 63, 9, 33];
print_r(outputNumbersWhichContainsThree($a));

echo "<hr /> TASK 2.4 <hr /><br />";
echo countOfThreeNumberInArray($a);

echo "<hr /> BONUS TASK 2.1 <hr /><br />";
echo bandName("alaska")."<br />";
echo bandName("dolphin")."<br />";
echo bandName("europe");

echo "<hr /> BONUS TASK 2.2 <hr /><br />";
echo charsConverter("ATTGC","A", "T", "C", "G")."<br />";
echo charsConverter("GTAT","A", "T", "C", "G");
?>
