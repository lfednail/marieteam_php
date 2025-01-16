<?php

function verifieString(string $stringVerify): bool
{
    $capStringVerify = strtoupper($stringVerify);

    // Verify presence of SQL keywords to prevent SQL injection
    $sqlKeywords = ['SELECT', 'FROM', 'WHERE', 'INSERT', 'UPDATE', 'DELETE', 'SET', 'INTO', 'CREATE'];

    foreach ($sqlKeywords as $keyword) {
        if (preg_match('/\b' . preg_quote($keyword, '/') . '\b/', $capStringVerify)) {
            return false;
        }
    }

    // Return true if no SQL keywords are found
    return true;
}

function verifyPassword(string $passwordVerify): array
{
    // CNIL password requirements validation
    $errors = [];

    // Check for at least one lowercase character
    if (!preg_match('/[a-z]/', $passwordVerify)) {
        $errors[] = "A lowercase character is required.";
    }

    // Check for at least one uppercase character
    if (!preg_match('/[A-Z]/', $passwordVerify)) {
        $errors[] = "An uppercase character is required.";
    }

    // Check for at least one number
    if (!preg_match('/\d/', $passwordVerify)) {
        $errors[] = "A number is required.";
    }

    // Check for at least one special character
    if (!preg_match('/\W/', $passwordVerify)) {
        $errors[] = "A special character is required.";
    }

    // Check the minimum length of the password
    if (strlen($passwordVerify) < 12) {
        $errors[] = "The password must be at least 12 characters long.";
    }

    return $errors;
}
