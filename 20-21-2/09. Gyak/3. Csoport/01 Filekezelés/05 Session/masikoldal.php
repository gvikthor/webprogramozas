<?php
require_once("fuggvenyek.php");
session_start();

if(!isset($_SESSION["nev"])) atiranyit("index");

echo "Jaj de jó, szia Vilmos, be vagy lépve!";