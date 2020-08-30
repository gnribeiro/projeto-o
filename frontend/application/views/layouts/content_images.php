<?php if (is_object($data)): ?> 
    <?php if (isset($data->content_title)): ?> 
        <h1><?php echo $data->content_title ?></h1>
    <?php endif?>

    <?php if(isset($data->url)): ?>
        <div id="image">
            <img src="<?php echo $data->url ?>" border="0" alt=""/>
        </div>
    <?php endif ?>
    
    <?php if(isset($data->description)): ?>
        <div <?php echo(isset($data->url) OR ($this->router->fetch_class() == 'contactos')) ?  'id="content-txt"' : ''?>>	
            <?php echo $data->description ?>
        </div>
    <?php endif ?>

    <?php if(isset($data->url)): ?>
        <div class="clear"></div>
    <?php endif ?>
<?php endif ?>
