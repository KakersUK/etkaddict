</div> 
<!-- end:wrap -->

<!-- Javascript -->
<script src="/assets/js/jquery.min.js?1.3.9"></script>
<script src="/assets/js/bootstrap.min.js?1.3.9"></script>
<?php if($active == "Home") { ?>
<script src="/assets/js/countdown.min.js?1.3.9"></script>
<script>
$('#clock-1').countdown(<?=$events[0]?>, {elapse: true})
    .on('update.countdown', function(event) {
    var $this = $(this);
    if (event.elapsed) {
        $this.html(event.strftime('<span>%-H:%M:%S</span><br /><p class="text-warning">Event started!</p>'));
    } else {
        $this.html(event.strftime('<span>%-H:%M:%S</span>'));
    }
}); 
$('#clock-2').countdown(<?=$events[1]?>, {elapse: true})
    .on('update.countdown', function(event) {
    var $this = $(this);
    if (event.elapsed) {
        $this.html(event.strftime('<span>%-H:%M:%S</span><br /><p class="text-warning">Event started!</p>'));
    } else {
        $this.html(event.strftime('<span>%-H:%M:%S</span>'));
    }
});
$('#clock-3').countdown(<?=$events[2]?>, {elapse: true})
    .on('update.countdown', function(event) {
    var $this = $(this);
    if (event.elapsed) {
        $this.html(event.strftime('<span>%-H:%M:%S</span><br /><p class="text-warning">Event started!</p>'));
    } else {
        $this.html(event.strftime('<span>%-H:%M:%S</span>'));
    }
});
</script>
<?php } if($active == "Rankings" || $active == "Clans" ) { ?>
<script src="/assets/js/bootstrap-table.min.js?1.3.9"></script>
<script src="/assets/js/extensions/bootstrap-table-cookie.min.js?1.3.9"></script>
<script src="/assets/js/extensions/bootstrap-table-mobile.min.js?1.3.9"></script>
<?php } 
if($active == "Characters" ) { ?>
<script src="/assets/js/character-search.js?1.3.9"></script>
<script src="/assets/js/expcalculator.min.js?1.3.9"></script>
<?php } 
if($active == "Calculators" ) { ?>
<script src="/assets/js/upgradecalculator.min.js?1.3.9"></script>
<script src="/assets/js/expcalculator.min.js?1.3.9"></script>
<?php } ?>
</body>
</html>