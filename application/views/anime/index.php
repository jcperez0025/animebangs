<h1>List of Anime</h1>

<?php foreach ($anime_list as $anime): ?>
    <div id="main">      
        <?php echo anchor('anime/'.$anime['slug'].'/list', $anime['name'], '');?>
    </div>
<?php endforeach ?>