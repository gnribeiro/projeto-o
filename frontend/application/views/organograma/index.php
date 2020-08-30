<?php if (is_object($data)): ?> 
    <h1><?php echo $data->title ?></h1>
<?php endif?>

<?php if(is_object($data)): ?>
    <div>	
        <?php echo $data->description ?>
    </div>
<?php endif ?>
