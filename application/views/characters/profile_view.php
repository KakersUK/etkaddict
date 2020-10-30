<!-- start:content -->
<div class="container content">
    
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="/characters/">Characters</a></li>
    <li class="active"><?=$character[0]['charname']?></li>
</ol>
    
<h1 id="profile-character-name"><?=$character[0]['charname']?></h1><?php if ($character[0]['title'] != null) { ?><p id="profile-character-title"><?=$character[0]['title']?></p><?php } ?>
<hr id="profile-break">

<div class="row">
   
    <div class="col-lg-3">
                
        <div class="col-sm-6 col-md-12">
            <h2 class="profile-header-top">Info</h2>
            <ul class="profile-list">
                <li>
                    <span class="profile-list-label">Level</span>
                    <span class="profile-list-value"><?=$character[0]['level']?></span>
                </li>
                <?php if ($character[0]['gender'] != null) { ?>
                <li>
                    <span class="profile-list-label">Gender</span>
                    <span class="profile-list-value"><?=$character[0]['gender']?> <?=$character[0]['gender_image']?></span>
                </li>  
                <?php }?>                
                <li>
                    <span class="profile-list-label">Path</span>
                    <span class="profile-list-value"><?=$character[0]['path']?></span>
                </li>
                <li>
                    <span class="profile-list-label">Clan</span>
                    <?php if ($character[0]['clan'] == "none") { ?>
                    <span class="profile-list-value"><?=$character[0]['clan']?></span>
                    <?php }
                    else
                    { ?>
                    <span class="profile-list-value"><?=$character[0]['clan']?> <span class="label label-info"><?=$character[0]['clanstatus']?></span></span>
                    <?php } ?>
                </li>
                <li>
                    <span class="profile-list-label">Status</span>
                    <span class="profile-list-value"><?=$character[0]['online']?></span>
                </li>
                <?php if ($character[0]['online_change'] != null) { ?>
                <li>
                    <span class="profile-list-label">Last Seen</span>
                    <span class="profile-list-value"><?=$character[0]['online_change']?></span>     
                </li>
                <?php } ?>                
            </ul>
        </div>
        
        <div class="col-sm-6 col-md-12">
            <h2>Stats</h2>
            <?php if (!$character[0]['vita'] == NULL || !$character[0]['gold'] == NULL) { ?> 
            <div class='userheader'>
		<div class='statbox'>
                    <div class='vita'>
                        <?php if (isset($character[0]['vita_imgs'])) {
                        echo $character[0]['vita_imgs'];
                        } ?>
                    </div>
                    <div class='mana'>
                        <?php if (isset($character[0]['mana_imgs'])) {
                        echo $character[0]['mana_imgs'];
                        } ?>	
                    </div>
                    <div class='gold'>
                        <?php if (isset($character[0]['gold_imgs'])) {
                        echo $character[0]['gold_imgs'];
                        } ?>	
                    </div>
                    <div class='exp'>
                        <?php if (isset($character[0]['exp_imgs'])) {
                        echo $character[0]['exp_imgs'];
                        } ?>
                    </div>
                    <div class='stats'>
                        <div class='might'>
                            <?php if (isset($character[0]['might_imgs'])) {
                            echo $character[0]['might_imgs'];
                            } ?>	
                        </div>
                        <div class='grace'>
                            <?php if (isset($character[0]['grace_imgs'])) {
                            echo $character[0]['grace_imgs'];
                            } ?>	
                        </div>
                        <div class='will'>
                            <?php if (isset($character[0]['will_imgs'])) {
                            echo $character[0]['will_imgs'];
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Text based version</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                <ul class="profile-list">
                    <?php if ($character[0]['vita'] != NULL) { ?>
                    <li>
                        <span class="profile-list-label">Vita</span>
                        <span class="profile-list-value"><?=$character[0]['vita']?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">Mana</span>
                        <span class="profile-list-value"><?=$character[0]['mana']?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">Might</span>
                        <span class="profile-list-value"><?=$character[0]['might']?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">Grace</span>
                        <span class="profile-list-value"><?=$character[0]['grace']?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">Will</span>
                        <span class="profile-list-value"><?=$character[0]['will']?></span>
                    </li> 
                    <li>
                        <span class="profile-list-label">Experience</span>
                        <span class="profile-list-value"><?=$character[0]['experience']?></span>
                    </li>
                    <?php } if ($character[0]['gold'] != NULL) { ?>
                    <li>
                        <span class="profile-list-label">Gold</span>
                        <span class="profile-list-value"><?=$character[0]['gold']?></span>
                    </li>
                    <?php } ?>
                </ul>
                </div>
            </div>
            </div>
            <?php } else { ?>
            <div class="alert" role="alert">This player is not showing their stats or gold! <a href="/about/#hidden"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></div>
            <?php } ?>
        </div>
        
        <div class="col-sm-6 col-md-12">
            <h2>Rankings</h2>
            <ul class="profile-list">
                <li>
                    <span class="profile-list-label">Path</span>
                    <span class="profile-list-value"><?=$character[0]['pathrank']?></span>
                </li>                
                <li>
                    <span class="profile-list-label">World</span>
                    <span class="profile-list-value"><?=$character[0]['rank']?></span>
                </li>
                <?php if ($character[0]['power'] != NULL) { ?>
                <li>
                    <span class="profile-list-label">Power Level</span>
                    <span class="profile-list-value"><?=$character[0]['power']?></span>
                </li>
                <?php } ?>
            </ul>
        </div>        
        
        <div class="col-sm-6 col-md-12">
            <h2>Events Wins</h2>
            <?php if ($character[0]['legend'] != null) { ?>
            <ul class="profile-list">
                <li>
                    <span class="profile-list-label">Carnage</span>
                    <span class="profile-list-value"><?=$character[0]['carnage_vic']?> out of <?=$character[0]['carnage_part']?></span>
                </li>
                <li>
                    <span class="profile-list-label">Deathball</span>
                    <span class="profile-list-value"><?=$character[0]['deathball_vic']?> out of <?=$character[0]['deathball_part']?></span>
                </li>
                <li>
                    <span class="profile-list-label">Elixir</span>
                    <span class="profile-list-value"><?=$character[0]['elixir_vic']?> out of <?=$character[0]['elixir_part']?></span>
                </li>
                <li>
                    <span class="profile-list-label">Paintball</span>
                    <span class="profile-list-value"><?=$character[0]['paintball_vic']?> out of <?=$character[0]['paintball_part']?></span>
                </li>
                <li>
                    <span class="profile-list-label">Pillow Fight</span>
                    <span class="profile-list-value"><?=$character[0]['pillowfight_vic']?> out of <?=$character[0]['pillowfight_part']?></span>
                </li>
            </ul>
            <?php }
            else 
            { ?>
            <div id="legend-alert"><div class="alert" role="alert">This player is not showing their legend! <a href="/about/#hidden"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></div></div>
            <?php } ?>
        </div>
    </div>
    
    <div class="col-md-9">
        <h2 class="profile-header-top">Additional</h2>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#legend" role="tab" data-toggle="tab">Legend</a></li>
            <li><a href="#history" role="tab" data-toggle="tab">History</a></li>            
            <li><a href="#expcalc" role="tab" data-toggle="tab">EXP Calculator</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            
            <div class="tab-pane active" id="legend">
                <?php if ($character[0]['legend'] != null)
                {
                    echo "<div class=\"row\"><ul>";
                    foreach ($character[0]['legend'] as $entry)
                    {
                        echo "<li class=\"legend-color".$entry['entrycolor']."\"><img class=\"icon\" alt=\"".$entry['entryicon']."\" src=\"/assets/img/legend/".$entry['entryicon'].".png\">".$entry['entrytext']."</li>";
                    }
                    echo "</ul></div>";
                }
                else 
                { ?>
                <div class="alert" role="alert">This player is not showing their legend! <a href="/about/#hidden"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></div>
                <?php } ?>
            </div>
            
            <div class="tab-pane" id="history">
                <div class="row">
                <div class="col-md-10 col-md-offset-1">                 
                    <?php  if (isset($history[0]))
                    { ?>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Vita</th>
                              <th>Mana</th>
                              <th>Might</th> 
                              <th>Grace</th>
                              <th>Will</th>
                              <th>XP</th>                      
                            </tr>
                          </thead>
                          <tbody>                    
                        <?php
                            foreach ($history as $entry)
                            {
                                echo "<tr>";                        
                                echo "<td>".$entry['date']."</td>";
                                echo "<td>".$entry['vitacount']."</td>";
                                echo "<td>".$entry['manacount']."</td>";
                                echo "<td>".$entry['mightcount']."</td>";
                                echo "<td>".$entry['gracecount']."</td>";
                                echo "<td>".$entry['willcount']."</td>";
                                echo "<td>".$entry['xpcount']."</td>";
                                echo "</tr>";                        
                            }
                        ?>                      
                          </tbody>
                        </table>
                    <?php 
                    } else if(strpos($character[0]['level_unmod'],'99') === false){
                    ?>    
                       <div class="alert" role="alert">This player is not level 99! <a href="/about/#history"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></div>

                    <?php
                    } else {
                    ?>
                        <div class="alert" role="alert">This player is not showing their stats! <a href="/about/#hidden"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></div>                
                    <?php
                    } ?>
                </div></div> 
            </div>            

            <div class="tab-pane" id="expcalc">
                <div class="row">
                <div class="col-md-4">                
                <div class="panel panel-default">
                    <div class="panel-heading">Current Stats</div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="vitacurrent">Vita</label>
                                <input type="text" class="form-control" id="vitacurrent" value="<?=$character[0]['vita']?>">
                            </div>
                            <div class="form-group">
                                <label for="manacurrent">Mana</label>
                                <input type="text" class="form-control" id="manacurrent" value="<?=$character[0]['mana']?>">
                            </div>
                            <div class="form-group">
                                <label for="mightcurrent">Might</label>
                                <input type="text" class="form-control" id="mightcurrent" value="<?=$character[0]['might']?>">
                            </div>
                            <div class="form-group">
                                <label for="gracecurrent">Grace</label>
                                <input type="text" class="form-control" id="gracecurrent" value="<?=$character[0]['grace']?>">
                            </div>
                            <div class="form-group">
                                <label for="willcurrent">Will</label>
                                <input type="text" class="form-control" id="willcurrent" value="<?=$character[0]['will']?>">
                            </div>                              
                        </form>
                    </div>
                </div>
                </div>

                <div class="col-md-4">                
                <div class="panel panel-default">
                    <div class="panel-heading">Desired Stats</div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="vitadesired">Vita</label>
                                <input type="text" class="form-control desiredstats" id="vitadesired" value="<?=$character[0]['vita']?>">
                            </div>
                            <div class="form-group">
                                <label for="manadesired">Mana</label>
                                <input type="text" class="form-control" id="manadesired" value="<?=$character[0]['mana']?>">
                            </div>
                            <div class="form-group">
                                <label for="mightdesired">Might</label>
                                <input type="text" class="form-control" id="mightdesired" value="<?=$character[0]['might']?>">
                            </div>
                            <div class="form-group">
                                <label for="gracedesired">Grace</label>
                                <input type="text" class="form-control" id="gracedesired" value="<?=$character[0]['grace']?>">
                            </div>
                            <div class="form-group">
                                <label for="willdesired">Will</label>
                                <input type="text" class="form-control" id="willdesired" value="<?=$character[0]['will']?>">
                            </div>                             
                        </form>
                    </div>
                </div>
                </div>

                <div class="col-md-4">                
                <div class="panel panel-default">
                    <div class="panel-heading">Required XP</div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="vitaxpoutput">Vita</label>
                                <input type="text" class="form-control" id="vitaxpoutput" value="0" disabled>
                                <input type="hidden" class="xpvalue" id="vitaxp" value="0" disabled>
                            </div>
                            <div class="form-group">
                                <label for="manaxpoutput">Mana</label>
                                <input type="text" class="form-control" id="manaxpoutput" value="0" disabled>
                                <input type="hidden" class="xpvalue" id="manaxp" value="0" disabled>
                            </div>
                            <div class="form-group">
                                <label for="mightxpoutput">Might</label>
                                <input type="text" class="form-control" id="mightxpoutput" value="0" disabled>
                                <input type="hidden" class="xpvalue" id="mightxp" value="0" disabled>
                            </div>
                            <div class="form-group">
                                <label for="gracexpoutput">Grace</label>
                                <input type="text" class="form-control" id="gracexpoutput" value="0" disabled>
                                <input type="hidden" class="xpvalue" id="gracexp" value="0" disabled>
                            </div>
                            <div class="form-group">
                                <label for="willxpoutput">Will</label>
                                <input type="text" class="form-control" id="willxpoutput" value="0" disabled>
                                <input type="hidden" class="xpvalue" id="willxp" value="0" disabled>
                            </div>
                            <div class="form-group">
                                <label for="xptotal">Total</label>
                                <input type="text" class="form-control" id="xptotal" value="0" disabled>
                            </div>                                 
                        </form>
                    </div>
                </div></div>
                </div><!-- .row div close -->  
            </div>     
        </div><!-- .tab-content div close -->    
    </div>
</div><!-- .row div close -->  
</div><!-- .container div close -->