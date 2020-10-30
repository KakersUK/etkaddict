<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo 'https:'.base_url();?></loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'about/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'changelog/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'calculators/';?></loc>
        <priority>0.5</priority>
    </url>    
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/world/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/warrior/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/reaver/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/knight/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/rogue/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/vagabond/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/mage/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/tempest/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/neophyte/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/poet/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/druid/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/carnage/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/deathball/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/elixir/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/paintball/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/pillowfight/';?></loc>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo 'https:'.base_url().'rankings/gold/';?></loc>
        <priority>0.5</priority>
    </url>     
    <url>
        <loc><?php echo 'https:'.base_url().'clans/';?></loc>
        <priority>0.5</priority>
    </url>
    <?php foreach($clans as $clan) { ?>
    <url>
        <loc><?php echo 'https:'.base_url().'clans/'.$clan.'/'; ?></loc>
        <priority>0.5</priority>
    </url>
    <?php } ?>
    <url>
        <loc><?php echo 'https:'.base_url().'characters/';?></loc>
        <priority>0.5</priority>
    </url>    
    <?php foreach($characters as $character) { ?>
    <url>
        <loc><?php echo 'https:'.base_url().'characters/'.$character.'/'; ?></loc>
        <priority>0.5</priority>
    </url>
    <?php } ?>
</urlset>