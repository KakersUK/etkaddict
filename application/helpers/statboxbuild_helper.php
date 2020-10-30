<?php

function etkStatboxBuild($value)
{
    // Format number and then split into an array.
    $formattedValue = number_format($value);
    $split = str_split($formattedValue);
    $data = array();
    
    foreach ($split as $char)
    {
        if ($char == ',')
        {
            $char = 'c';
        }
        
        $img = '<img alt="'.$char.'" src="/assets/img/stats/'.$char.'y.png" />';
        
        array_push($data, $img);
    }
    
    return implode($data);    
}