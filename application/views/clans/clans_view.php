<!-- start:content -->
<div class="container content">
    
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="/clans/">Clans</a></li>
    <li class="active"><?=$clan?></li>
</ol>
<h1><?=$clan?></h1><hr>

<table class="table"
       data-toggle="table"
       data-mobile-responsive="true"
       data-escape="false"
       data-cookie="true"
       data-cookie-id-table="<?=$json?>List"       
       data-url="/<?=$json?>.json"
       data-sort-name="clanstatus"
       data-sort-order="asc"
       data-pagination="true"
       data-side-pagination="server"
       data-page-size="25"
       data-page-list="[25, 50, 100, 250, 1000]"
       data-search="true"
       data-check-on-init="true">
<thead><tr>
<th data-field="clanstatus" data-sortable="true">Clan Rank</th>
<th data-field="charname" data-sortable="true">Name</th>
<th data-field="path" data-sortable="true">Path</th>
<th data-field="level" data-sortable="true">Level</th>
<th data-field="rank" data-sortable="true">World Rank</th>
<th data-field="online_change" data-sortable="true">Last Seen</th>
</tr></thead>
<tbody>
</tbody>
</table> 

</div>