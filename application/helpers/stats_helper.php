<?php

function vitamana2XP($type, $value)
{
    $baseCost = 10000000; // Base XP Cost
    $increaseCost = 500000; // Additional XP Cost per increment
    
    if ($type == "Vita")
    {
        $increaseCostEvery = 2500; // XP Cost will increase every 2,500 Vita        
        $incrementsBought = 100; // Player buys 100 Vita at a time
        $incrementFirstStep = 30000; // First increments start at 30,000 Vita
        $incrementSecondStep = 1000000; // Second increments start at 1,000,000 Vita
    }
    
    if ($type == "Mana")
    {
        $increaseCostEvery = 1250; // XP Cost will increase every 1,250 Mana        
        $incrementsBought = 50; // Player buys 50 Mana at a time
        $incrementFirstStep = 15000; // Increments start at 15,000 Mana
        $incrementSecondStep = 500000; // Second increments start at 500,000 Mana       
    }    
    
    if ($value <= $incrementFirstStep)
    {
        $increments = floor($value / $incrementsBought);
        $xpTotal = $baseCost * $increments;
    }
    else if ($value <= $incrementSecondStep)
    {
        $value -= $incrementFirstStep;
        $increments = $value / $increaseCostEvery;
        $floor = floor($increments);
        
        if ($floor == 0)
        {
            $xpMulti = $floor + 1;
        }
        else
        {
            $xpMulti = $floor;
        }
        
        // Work out 30k vita / 15k mana (3 billion xp)
        $xpTotal = $baseCost * ($incrementFirstStep / $incrementsBought);

        // Work out the first series for arithmetic series (Every full block of 2,500 vita or 1,250 mana). 
        $vitamanaFirstSeries = ($baseCost + $increaseCost) * 25;
        $xpTotal += ($floor / 2) * ($vitamanaFirstSeries + (($baseCost + ($increaseCost * $floor)) * 25));

        // What's our position in the incomplete block? Use that to find out how far we are into the current series.
        $vitamanaCurrentSeries = ($baseCost + ($increaseCost * $xpMulti)) * floor(((($increments - $floor) * $increaseCostEvery) / $incrementsBought));
        $xpTotal += $vitamanaCurrentSeries;
    }
    else
    {
        $value -= $incrementSecondStep;
        $increments = $value / $increaseCostEvery;
        $floor = floor($increments);
        
        if ($floor == 0)
        {
            $xpMulti = $floor + 1;
        }
        else
        {
            $xpMulti = $floor;
        }
        
        // Work out 0 vita / 0 mana to 30k vita / 15k mana (3 billion xp)
        $xpTotal = $baseCost * ($incrementFirstStep / $incrementsBought);

        // Work out the first arithmetic series 30k vita / 15k mana to 1m vita / 500k mana (Every full block of 2,500 vita or 1,250 mana) 1.04 billion & 325 million + 3 billion from previous calculation. 
        $vitamanaFirstSeries = ($baseCost + $increaseCost) * 25;
        $xpTotal += (388 / 2) * ($vitamanaFirstSeries + (($baseCost + ($increaseCost * 388)) * 25));
        
        // Work out the second arithmetic series 1m vita / 500k mana + (Every full block of 2,500 vita or 1,250 mana). 
        $vitamanaSecondSeries = ($baseCost + ($increaseCost * 4)) * 25 * 388;
        $xpTotal += ($floor / 2) * ($vitamanaSecondSeries + (($baseCost + ($increaseCost * 4 * (388 + $floor))) * 25));        

        // What's our position in the incomplete block? Use that to find out how far we are into the current series.
        $vitamanaCurrentSeries = ($baseCost + ($increaseCost * 4 * (388 + $xpMulti))) * floor(((($increments - $floor) * $increaseCostEvery) / $incrementsBought));
        $xpTotal += $vitamanaCurrentSeries;
    }    
    
    
    return $xpTotal;
}

function stat2XP($value)
{
    $baseCost = 15000000;
    $increaseCost = 200000;
    
    if ($value <= 40)
    {
        $xpTotal = $baseCost * $value; 
    }
    else if ($value <= 1000)
    {
        $value -= 40;  
        $statFirstSeries = $baseCost + $increaseCost;
                        
        $xpTotal = $baseCost * 40;
        $xpTotal += ($value / 2) * ($statFirstSeries + ($baseCost + ($increaseCost * $value)));
    }
    else
    {
        $value -= 1000;
        $statFirstSeries = $baseCost + $increaseCost;
        $statSecondSeries = $baseCost + ($increaseCost * 4 * 960);
                        
        $xpTotal = $baseCost * 40;
        $xpTotal += (960 / 2) * ($statFirstSeries + ($baseCost + ($increaseCost * 960)));
        
        $xpTotal += ($value / 2) * ($statSecondSeries + ($baseCost + ($increaseCost * 4 * (959 + $value))));
    }
    
    return $xpTotal;    
}
