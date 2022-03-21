<?php

// NEVER commit any real passwords
// TODO: exclude this file from your Github repository for better security
// There is a specific technique to ignore files in git, which we've talked about

$config = [
    'host' => 'localhost',
    'user' => 'root',
    // default setting = password 'YES'; in XAMPP you don't need a password, with MAMP you do need it (localhost considered);
    'password' => 'root',
    'dbname' => 'humans',
];

