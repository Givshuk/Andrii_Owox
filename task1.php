<?php

function checkBrackets($str)
{
    $stack = [];
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == "[" || $str[$i] == "(")
            array_push($stack, $str[$i]);
        elseif ($str[$i] == "]" || $str[$i] == ")") {
            $popElement = array_pop($stack);

            if ($popElement != "[" && $popElement != "(")
                return false;
        }
    }
    if (count($stack) == 0)
        return true;
    else
        return false;
}

