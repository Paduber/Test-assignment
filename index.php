<?php

require "Bank.php";
require "parser.php";
require "SQLGenerate.php";

$filename = "20200305_ED807_full.xml";


SQLGenerate::createFile();

$parser = new Parser($filename);

do{
    $result = $parser->parseNext();
    if($result==-1)
        break;
    SQLGenerate::writeToFile($result);
}while($result!=-1);


