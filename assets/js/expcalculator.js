function xpFormat(xpValue) 
{
    // Nine Zeroes for Billions
    return Math.abs(Number(xpValue)) >= 1.0e+9

        ? Math.abs(Number(xpValue)) / 1.0e+9 + "b"
        // Six Zeroes for Millions 
        : Math.abs(Number(xpValue)) >= 1.0e+6

        ? Math.abs(Number(xpValue)) / 1.0e+6 + "m"
        // Three Zeroes for Thousands
        : Math.abs(Number(xpValue)) >= 1.0e+3

        ? Math.abs(Number(xpValue)) / 1.0e+3 + "k"
        : Math.abs(Number(xpValue));
}

function removeNonNumenric(nStr) {
    nStr = nStr.replace(/\D/g,'');
    return nStr;
};

function calculateSum() {
    var sum = 0;
    $('.xpvalue').each(function() {
        var value = $(this).val();
        sum += Number(value);
    });

    $('#xptotal').val(xpFormat(sum));
}

$(document).ready(function() {   
    $('#vitacurrent, #vitadesired').change(function() {
        var vitaCurrent = removeNonNumenric($('#vitacurrent').val());
        var vitaDesired = removeNonNumenric($('#vitadesired').val());
        
        $.ajax({
            url: "/expcalculator.json",
            type: "get",
            data:{type:"Vita", current: vitaCurrent, desired:vitaDesired},
            error: function(xhr, error) {
                console.debug(xhr); console.debug(error);
            },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $('#vitaxp').val(obj.data);
                $('#vitaxpoutput').val(xpFormat(obj.data));
                calculateSum();
            }
        });  
    });
    
    $('#manacurrent, #manadesired').change(function() {
        var manaCurrent = removeNonNumenric($('#manacurrent').val());
        var manaDesired = removeNonNumenric($('#manadesired').val());
        
        $.ajax({
            url: "/expcalculator.json",
            type: "get",
            data:{type:"Mana", current: manaCurrent, desired:manaDesired},
            error: function(xhr, error) {
                console.debug(xhr); console.debug(error);
            },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $('#manaxp').val(obj.data);
                $('#manaxpoutput').val(xpFormat(obj.data));                
                calculateSum();
            }
        });
    });
    
    $('#mightcurrent, #mightdesired').change(function() {
        var statCurrent = removeNonNumenric($('#mightcurrent').val());
        var statDesired = removeNonNumenric($('#mightdesired').val());
        
        $.ajax({
            url: "/expcalculator.json",
            type: "get",
            data:{type:"Stats", current: statCurrent, desired:statDesired},
            error: function(xhr, error) {
                console.debug(xhr); console.debug(error);
            },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $('#mightxp').val(obj.data);
                $('#mightxpoutput').val(xpFormat(obj.data));                
                calculateSum();
            }
        });
    });
    
    $('#gracecurrent, #gracedesired').change(function() {
        var statCurrent = removeNonNumenric($('#gracecurrent').val());
        var statDesired = removeNonNumenric($('#gracedesired').val());
        
        $.ajax({
            url: "/expcalculator.json",
            type: "get",
            data:{type:"Stats", current: statCurrent, desired:statDesired},
            error: function(xhr, error) {
                console.debug(xhr); console.debug(error);
            },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $('#gracexp').val(obj.data);
                $('#gracexpoutput').val(xpFormat(obj.data));                
                calculateSum();
            }
        });
    });
    
    $('#willcurrent, #willdesired').change(function() {
        var statCurrent = removeNonNumenric($('#willcurrent').val());
        var statDesired = removeNonNumenric($('#willdesired').val());
        
        $.ajax({
            url: "/expcalculator.json",
            type: "get",
            data:{type:"Stats", current: statCurrent, desired:statDesired},
            error: function(xhr, error) {
                console.debug(xhr); console.debug(error);
            },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $('#willxp').val(obj.data);
                $('#willxpoutput').val(xpFormat(obj.data));                
                calculateSum();
            }
        });
    });        
});