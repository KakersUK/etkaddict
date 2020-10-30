<?php

function pathFix($path, $subpath)
{   
    $pathFixed = "";

    if ($path == "Warrior")
    {
        if ($subpath == "pure") { $pathFixed = "Warrior (Pure)"; }
        else if ($subpath == "Rogue") { $pathFixed = "Warrior (Rogue)"; }
        else if ($subpath == "Mage") { $pathFixed = "Warrior (Mage)"; }
        else if ($subpath == "Poet") { $pathFixed = "Warrior (Poet)"; }
        else { $pathFixed = $path; }
    }
    else if ($path == "Rogue")
    {
        if ($subpath == "pure") { $pathFixed = "Rogue (Pure)"; }
        else if ($subpath == "Warrior") { $pathFixed = "Rogue (Warrior)"; }
        else if ($subpath == "Mage") { $pathFixed = "Rogue (Mage)"; }
        else if ($subpath == "Poet") { $pathFixed = "Rogue (Poet)"; }
        else { $pathFixed = $path; }         
    }
    else if ($path == "Mage")
    {
        if ($subpath == "pure") { $pathFixed = "Mage (Pure)"; }
        else if ($subpath == "Warrior") { $pathFixed = "Mage (Warrior)"; }
        else if ($subpath == "Rogue") { $pathFixed = "Mage (Rogue)"; }
        else if ($subpath == "Poet") { $pathFixed = "Mage (Poet)"; }
        else { $pathFixed = $path; }           
    }
    else if ($path == "Poet")
    {
        if ($subpath == "pure") { $pathFixed = "Poet (Pure)"; }
        else if ($subpath == "Warrior") { $pathFixed = "Poet (Warrior)"; }
        else if ($subpath == "Rogue") { $pathFixed = "Poet (Rogue)"; }
        else if ($subpath == "Mage") { $pathFixed = "Poet (Mage)"; }
        else { $pathFixed = $path; }         
    }
    else
    {
        $pathFixed = $path;
    }

    return $pathFixed;
}