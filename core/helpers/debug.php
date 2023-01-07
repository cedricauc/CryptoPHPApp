<?php

namespace Core\Helpers;

function dump($_data, $_stop=false){
    echo "<pre>";
    var_dump($_data);
    if($_stop) 
    exit;
}
