<!-- start:content -->
<div class="container content">
    
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li class="active">Characters</li>
</ol>
<h1>Characters</h1><hr>

<div class="col-lg-3">
    <div class="row">
        <div class="panel panel-primary">
        <div class="panel-heading">Game Totals <a href="/about/#accuracy"><span class="glyphicon glyphicon-info-sign panel-icon" aria-hidden="true"></span></a></div>
            <div class="panel-body">
                <ul class="profile-list">
                    <li>
                        <span class="profile-list-label">Gold</span>
                        <span class="profile-list-value"><?=$gold?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">Characters</span>
                        <span class="profile-list-value"><?=$character_count?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">- Showing Legend</span>
                        <span class="profile-list-value"><?=$legend_count?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">- Showing Stats</span>
                        <span class="profile-list-value"><?=$stat_count?></span>
                    </li>
                    <li>
                        <span class="profile-list-label">- Showing Gold</span>
                        <span class="profile-list-value"><?=$gold_count?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">  
            <h3 class="block-title">Search</h3>

            <div class="input-group">
                <input type="text" id="character-search" class="form-control search" placeholder="enter your search term" autocomplete="off">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
            <div class="search-box">
            <ul class="search-list"></ul>
            </div>
        </div>
    </div>
</div>

</div>