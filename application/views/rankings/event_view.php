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
       data-sort-name="<?=$json?>_rating"
       data-sort-order="desc"
       data-pagination="true"
       data-side-pagination="server"
       data-page-size="50"
       data-page-list="[25, 50, 100, 250, 1000]"
       data-search="true">
<thead><tr>
<th data-field="<?=$json?>_rating" data-sortable="true">Rating</th>        
<th data-field="charname" data-sortable="true">Name</th>        
<th data-field="<?=$json?>_part" data-sortable="true">Participation</th>
<th data-field="<?=$json?>_vic" data-sortable="true">Victories</th>
<th data-field="<?=$json?>_perc" data-sortable="true">Win %</th>
</tr></thead>
<tbody>
</tbody>
</table> 

</div>