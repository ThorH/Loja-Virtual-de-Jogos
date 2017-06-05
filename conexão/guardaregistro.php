<?php

$username = $_POST ['username'];
$email = $_POST ['Email'];
$password = $_POST ['password'];

$conect=msql_connect registro ('localhost:3106','root','');

$sql= "INSERT INTO registro ('"username"','"email"','"password"') VALUES ('"$username"','"$email"','"$password"');
