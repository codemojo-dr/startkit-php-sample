<?php

$samples = array();

for($i = 1; $i <= 20; $i++){
    $samples[] = array("id"=> $i, "title" => "Sample title",
        "description" => "This is a description", "price" => 100 * $i );
}
