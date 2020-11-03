<!-- start:content -->
<div class="container content">
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">  
            <div class="page-header center-text">
                <h1>Welcome to ETK Addict</h1>
                <p>Fueling the addicts of ExtremeTK!</p>
                <p>Release: <a href="/changelog/">v1.3.11 (November 2020)</a></p>
            </div>
        </div>
    </div>  
    <div class="row">     
       <div class="col-md-8 col-md-offset-2">    
            <div class="panel panel-primary">
            <div class="panel-heading">Celestial Blessing</div>
                <div class="panel-body">
                    <p class="blessing-current center-text text-<?=$blessingcolor?>"><?=$blessingcurrent?></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-<?=$blessingcolor?>" role="progressbar" aria-valuenow="<?=$blessingvalue?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=$blessingwidth?>%"></div>
                    </div>
                    <p class="center-text">$<?=$blessingvalue?> / $100</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">    
            <div class="panel panel-primary">
            <div class="panel-heading">Events</div>
                <div class="panel-body">
                    <div class="countdown col-md-4">
                        <span class="event-title"><?=$events[0]?></span><br />
                        <div id="clock-1"></div>
                    </div>
                    <div class="countdown col-md-4">
                        <span class="event-title"><?=$events[1]?></span><br />
                        <div id="clock-2"></div>
                    </div>
                    <div class="countdown col-md-4">
                        <span class="event-title"><?=$events[2]?></span><br />
                        <div id="clock-3"></div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="row"> 
        <div class="col-md-4 col-md-offset-2">    
            <div class="panel panel-primary">
            <div class="panel-heading">Top Hunters on <small><?=$today?></small></div>
                <div class="panel-body">
                    <ol>
                    <?php
                    foreach ($tophunters as $character)
                    {
                        echo "<li>".$character['xpcount']." - ".$character['charname']."</li>";
                    }
                    ?>
                    </ol>           
                </div>
            </div>
        </div>          
        <div class="col-md-4">    
            <div class="panel panel-primary">
            <div class="panel-heading">Top Characters</div>
                <div class="panel-body">
                    <ol class="character-list">
                    <?php
                    foreach ($topcharacters as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                    <ol class="character-list" start="11">
                    <?php
                    foreach ($topcharacters2 as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                </div>
            </div>
        </div>        
    </div>
    
    <div class="row">  
        <div class="col-md-4 col-md-offset-2">    
            <div class="panel panel-primary">
            <div class="panel-heading">Top Warriors</div>
                <div class="panel-body">
                    <ol class="character-list">
                    <?php
                    foreach ($topwarriors as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                    <ol class="character-list" start="6">
                    <?php
                    foreach ($topwarriors2 as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-4">    
            <div class="panel panel-primary">
            <div class="panel-heading">Top Rogues</div>
                <div class="panel-body">
                    <ol class="character-list">
                    <?php
                    foreach ($toprogues as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                    <ol class="character-list" start="6">
                    <?php
                    foreach ($toprogues2 as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="col-md-4 col-md-offset-2">    
            <div class="panel panel-primary">
            <div class="panel-heading">Top Mages</div>
                <div class="panel-body">
                    <ol class="character-list">
                    <?php
                    foreach ($topmages as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                    <ol class="character-list" start="6">
                    <?php
                    foreach ($topmages2 as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-4">    
            <div class="panel panel-primary">
            <div class="panel-heading">Top Poets</div>
                <div class="panel-body">
                    <ol class="character-list">
                    <?php
                    foreach ($toppoets as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                    <ol class="character-list" start="6">
                    <?php
                    foreach ($toppoets2 as $character)
                    {
                        echo "<li>".$character['charname']."</li>";
                    }
                    ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>