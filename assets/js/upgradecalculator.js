$(document).ready(function() {  
    $('#wpngeneration, #wpnupgrade, #wpnsmdmgcurrent, #wpnlrgdmgcurrent, #wpnvitacurrent, #wpnmanacurrent').change(function() {
        var wpnGeneration = $('#wpngeneration').val();
        var wpnUpgrade = $('#wpnupgrade').val();
        var wpnSmallDmg = removeNonNumenric($('#wpnsmdmgcurrent').val());
        var wpnLargeDmg = removeNonNumenric($('#wpnlrgdmgcurrent').val());
        var wpnVita = removeNonNumenric($('#wpnvitacurrent').val());
        var wpnMana = removeNonNumenric($('#wpnmanacurrent').val());
        
        $.ajax({
            url: "/wpnupgradecalculator.json",
            type: "get",
            data:{generation: wpnGeneration, upgrade: wpnUpgrade, smalldmg:wpnSmallDmg, largedmg:wpnLargeDmg, vita: wpnVita, mana: wpnMana},
            error: function(xhr, error) {
                console.debug(xhr); console.debug(error);
            },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $('#wpnsmdmgnew').val(obj.smalldamage);
                $('#wpnlrgdmgnew').val(obj.largedamage);
                $('#wpnvitanew').val(obj.vita);
                $('#wpnmananew').val(obj.mana);                
            }
        });  
    });
    
    $('#itmgeneration').change(function() {
        opt = $(this).val();
        if (opt==="current") {
            $('#itmaccurrent').prop('disabled', true);
        } else if (opt==="prenerf") {
            $('#itmaccurrent').prop('disabled', false);
        }
    });      
 
    $('#itmgeneration, #itmupgrade, #itmtype, #itmaccurrent, #itmvitacurrent, #itmmanacurrent').change(function() {
        var itmGeneration = $('#itmgeneration').val();
        var itmUpgrade = $('#itmupgrade').val();
        var itmType = $('#itmtype').val();
        var itmAc = $('#itmaccurrent').val();        
        var itmVita = $('#itmvitacurrent').val();
        var itmMana = $('#itmmanacurrent').val();
                
        $.ajax({
            url: "/itmupgradecalculator.json",
            type: "get",
            data:{generation: itmGeneration, upgrade: itmUpgrade, type:itmType, ac:itmAc, vita: itmVita, mana: itmMana},
            error: function(xhr, error) {
                console.debug(xhr); console.debug(error);
            },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $('#itmacnew').val(obj.ac);
                $('#itmvitanew').val(obj.vita);
                $('#itmmananew').val(obj.mana);
            }
        });  
    });
});