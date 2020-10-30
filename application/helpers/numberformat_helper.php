<?php

function etkNumberFormat($value)
{
    if ($value >= 1000000000) // If above 1 billion, covert and append b
    {
        $formattedValue = number_format($value / 1000000000, 3)."b";
    }
    else if ($value >= 1000000) // If above 1 million, covert and append b
    {
        $formattedValue = number_format($value / 1000000, 3)."m";
    }
    else if ($value >= 1000) // If above 1 thousand, covert and append b
    {
        $formattedValue = number_format($value / 1000)."k";
    } 
    else
    {
        $formattedValue = $value;
    }
    
    return $formattedValue;    
}