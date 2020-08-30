<style>

#menu_main .active {
    color:red;

}
</style>

<div id="menu_main">

<?php

    $links = kohana::config('links');


    $page  = Request::instance()->controller;
    $active = array_key_exists($page , $links) ? $page : 'content';
?>

<?php foreach($links as $key=>$value):?>

<?php if(isset($value['uri']) AND isset($value['label']) AND isset($value['menu']) AND $value['menu']=='1'):?>
<a href="<?php echo $value['uri']?>" <?php echo ($key == $active) ? 'class="active"' : ''?>><?php echo $value['label']?></a>
<?php endif?>

<?php endforeach?>
</div>
<div id="breacumbs">

<?php echo $breadcumbs?>
</div>
