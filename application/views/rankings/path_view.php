<!-- start:content -->
<div class="container content">
    
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="/rankings/">Rankings</a></li>
    <li class="active"><?=$content?></li>
</ol>
<h1><?=$content?> Rankings</h1><hr>

<table class="table table-striped"
       data-toggle="table"
       data-mobile-responsive="true"
       data-escape="false"
       data-cookie="true"
       data-cookie-id-table="<?=$json?>Rankings"       
       data-url="/<?=$json?>_rankings.json"
       data-sort-name="pathrank"
       data-pagination="true"
       data-side-pagination="server"
       data-page-size="25"
       data-page-list="[25, 50, 100, 250, 1000]"
       data-search="true">
<thead><tr>
<th data-field="pathrank" data-sortable="true">Rank</th>
<th data-field="charname" data-sortable="true">Name</th>
<th data-field="path" data-sortable="true">Path</th>
<th data-field="power" data-sortable="true">Power</th>
<th data-field="vita" data-sortable="true">Vita</th>
<th data-field="mana" data-sortable="true">Mana</th>
<th data-field="might" data-sortable="true">Might</th>
<th data-field="grace" data-sortable="true">Grace</th>
<th data-field="will" data-sortable="true">Will</th>
<th data-field="clan" data-sortable="true">Clan</th>
</tr></thead>
<tbody>
</tbody>
</table> 

</div>