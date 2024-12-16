<?php

function verifieString(string $stringVerify): bool{

    $capStringVerify = strtoupper($stringVerify);

    //verify presence SQL component
    if(
        (preg_match('/\bSELECT\b/',$capStringVerify)) ||
        (preg_match('/\bFROM\b/', $capStringVerify)) ||
        (preg_match('/\bWHERE\b/', $capStringVerify))
    )   return false;

    //return if no SQL element
    return true;

}

function verifyPassword(string $passwordVerify){
    //test CNIL requirement
    $error = [];
    if(!preg_match('[a-z]', $passwordVerify)) //verify the presence of character between a and z
        $error[] = "A lowercase character is require";
    if(!preg_match('[A-Z]', $passwordVerify)) //verify the presence of character between A and Z
        $error[] = "An uppercase character is require";
    if(!preg_match('/\d/', $passwordVerify)) //verify the presence of number
        $error[] = "A number is require";
    if (!preg_match('/\W/', $passwordVerify)) //verify the presence of special character
        $error = "A special character is requiered";
    if(strlen($passwordVerify)<= 12) //verify the length of $passwordVerify
        $error[] = "The password must have size of 12 character minimum";
    return $error;
}