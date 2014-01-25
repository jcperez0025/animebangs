<h1>List of <?php echo $anime['name']?> Episodes</h1>

<?php foreach ($episode_list as $episode): ?>
    <div id="main">      
        <?php echo anchor('anime/'.$anime['slug'].'/episode/'.$episode['number'], $episode['name'], '');?>
    </div>
<?php endforeach ?>