<?php

function split($str, $sep){
    $str = trim($str, ' ');
    if ($str == ''){
        return [];
    }

    return explode($sep, $str);
}
