<!-- start:content -->
<div class="container content">
    
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li class="active">Calculators</li>
</ol>
<h1>Calculators</h1><hr>

    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#expcalc" role="tab" data-toggle="tab">Experience</a></li>            
            <li><a href="#weapcalc" role="tab" data-toggle="tab">Weapon Upgrades</a></li>           
            <li><a href="#itemcalc" role="tab" data-toggle="tab">Item Upgrades</a></li>     
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            
            <div class="tab-pane active" id="expcalc">
                <div class="row">
                <div class="col-md-4">                
                <div class="panel panel-default">
                    <div class="panel-heading">Current Stats</div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="vitacurrent">Vita</label>
                                <input type="text" class="form-control" id="vitacurrent">
                            </div>
                            <div class="form-group">
                                <label for="manacurrent">Mana</label>
                                <input type="text" class="form-control" id="manacurrent">
                            </div>
                            <div class="form-group">
                                <label for="mightcurrent">Might</label>
                                <input type="text" class="form-control" id="mightcurrent">
                            </div>
                            <div class="form-group">
                                <label for="gracecurrent">Grace</label>
                                <input type="text" class="form-control" id="gracecurrent">
                            </div>
                            <div class="form-group">
                                <label for="willcurrent">Will</label>
                                <input type="text" class="form-control" id="willcurrent">
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
                                <input type="text" class="form-control desiredstats" id="vitadesired">
                            </div>
                            <div class="form-group">
                                <label for="manadesired">Mana</label>
                                <input type="text" class="form-control" id="manadesired">
                            </div>
                            <div class="form-group">
                                <label for="mightdesired">Might</label>
                                <input type="text" class="form-control" id="mightdesired">
                            </div>
                            <div class="form-group">
                                <label for="gracedesired">Grace</label>
                                <input type="text" class="form-control" id="gracedesired">
                            </div>
                            <div class="form-group">
                                <label for="willdesired">Will</label>
                                <input type="text" class="form-control" id="willdesired">
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
                </div>
                </div>        
            </div>
            </div><!-- .row div close -->                     
            
            <div class="tab-pane" id="weapcalc">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">                
                    <div class="panel panel-default">
                        <div class="panel-heading">Base Weapon Stats</div>
                        <div class="panel-body">
                            <form>                               
                                <div class="col-sm-6 form-group">
                                    <label for="wpnsmdmgcurrent">Small Damage</label>
                                    <input type="text" class="form-control" id="wpnsmdmgcurrent">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpnlrgdmgcurrent">Large Damage</label>
                                    <input type="text" class="form-control" id="wpnlrgdmgcurrent">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpnvitacurrent">Vita</label>
                                    <input type="text" class="form-control" id="wpnvitacurrent">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpnmanacurrent">Mana</label>
                                    <input type="text" class="form-control" id="wpnmanacurrent">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpngeneration">Generation <a href="/about/#itemupgrades"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></label>
                                    <select class="form-control" id="wpngeneration">
                                        <option selected="selected" value="current">Current</option>
                                        <option value="prenerf">Prenerf</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpnupgrade">Upgrade</label>
                                    <select class="form-control" id="wpnupgrade">
                                        <option selected="selected"  value="1">+1</option>
                                        <option value="2">+2</option>
                                        <option value="3">+3</option>
                                        <option value="4">+4</option>
                                        <option value="5">+5</option>
                                        <option value="6">+6</option>
                                        <option value="7">+7</option>
                                        <option value="8">+8</option>                                        
                                    </select>
                                </div>                                 
                            </form>
                        </div>
                    </div>
                    </div>                    
                    
                    <div class="col-md-5">                
                    <div class="panel panel-default">
                        <div class="panel-heading">Modified Weapon Stats</div>
                        <div class="panel-body">
                            <form>                      
                                <div class="col-sm-6 form-group">
                                    <label for="wpnsmdmgnew">Small Damage</label>
                                    <input type="text" class="form-control" id="wpnsmdmgnew" value="0" disabled>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpnlrgdmgnew">Large Damage</label>
                                    <input type="text" class="form-control" id="wpnlrgdmgnew" value="0" disabled>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpnvitanew">Vita</label>
                                    <input type="text" class="form-control" id="wpnvitanew" value="0" disabled>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="wpnmananew">Mana</label>
                                    <input type="text" class="form-control" id="wpnmananew" value="0" disabled>
                                </div>                             
                            </form>
                        </div>
                    </div>
                    </div>
                </div><!-- .row div close -->                     
            </div>
                 
            <div class="tab-pane" id="itemcalc">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">                
                    <div class="panel panel-default">
                        <div class="panel-heading">Base Item Stats</div>
                        <div class="panel-body">
                            <form>                               
                                <div class="col-sm-6 form-group">
                                    <label for="itmvitacurrent">Vita</label>
                                    <input type="text" class="form-control" id="itmvitacurrent">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="itmmanacurrent">Mana</label>
                                    <input type="text" class="form-control" id="itmmanacurrent">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="itmaccurrent">AC</label>
                                    <input type="text" class="form-control" id="itmaccurrent" disabled>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="itmtype">Type</label>
                                    <select class="form-control" id="itmtype">
                                        <option selected="selected" value="armor">Armor</option>
                                        <option value="shield">Shield</option>
                                        <option value="hand">Hand</option>                                        
                                    </select>
                                </div>                                
                                <div class="col-sm-6 form-group">
                                    <label for="itmgeneration">Generation <a href="/about/#itemupgrades"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></label>
                                    <select class="form-control" id="itmgeneration">
                                        <option selected="selected" value="current">Current</option>
                                        <option value="prenerf">Prenerf</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="itmupgrade">Upgrade</label>
                                    <select class="form-control" id="itmupgrade">
                                        <option selected="selected"  value="1">+1</option>
                                        <option value="2">+2</option>
                                        <option value="3">+3</option>
                                        <option value="4">+4</option>
                                        <option value="5">+5</option>
                                        <option value="6">+6</option>
                                        <option value="7">+7</option>
                                        <option value="8">+8</option>                                        
                                    </select>
                                </div>                                 
                            </form>
                        </div>
                    </div>
                    </div>                    
                    
                    <div class="col-md-5">                
                    <div class="panel panel-default">
                        <div class="panel-heading">Modified Item Stats</div>
                        <div class="panel-body">
                            <form>                      
                                <div class="col-sm-6 form-group">
                                    <label for="itmvitanew">Vita</label>
                                    <input type="text" class="form-control" id="itmvitanew" disabled>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="itmmananew">Mana</label>
                                    <input type="text" class="form-control" id="itmmananew" disabled>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="itmacnew">AC</label>
                                    <input type="text" class="form-control" id="itmacnew" disabled>
                                </div>                             
                            </form>
                        </div>
                    </div>
                    </div>
                </div><!-- .row div close -->      
            </div> 
                
        </div><!-- .tab-content div close --> 
</div><!-- .container div close -->  
</div><!-- #wrap div close -->