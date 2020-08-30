<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html lang="pt" xmlns="http://www.w3.org/1999/xhtml" class="no-js ie ie6"> <![endif]--> 
<!--[if IE 7 ]>    <html lang="pt" xmlns="http://www.w3.org/1999/xhtml"class="no-js ie ie7"> <![endif]--> 
<!--[if IE 8 ]>    <html lang="pt" xmlns="http://www.w3.org/1999/xhtml"class="no-js ie ie8"> <![endif]--> 
<!--[if IE 9 ]>    <html lang="pt" xmlns="http://www.w3.org/1999/xhtml"class="no-js ie ie9"> <![endif]--> 
<!--[if (gt IE 9)]> <html lang="pt" xmlns="http://www.w3.org/1999/xhtml"class="no-js ie ieX"> <![endif]--> 
<!--[if !(IE) ]><!--> <html xmlns="http://www.w3.org/1999/xhtml" lang="pt" class="no-js noie"> <!--<![endif]--> 
	<head profile="http://gmpg.org/xfn/11">
		<title><?=$title?></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<?php foreach( $styles as  $style) { echo HTML::style ($style) , "\n" ; } ?>
        <?php foreach( $scripts as $script){ echo HTML::script($script), "\n" ; } ?>
	</head>
	<body>
		<div id="wraper">
			<? echo $header?>
			<? echo $menu_main?>
			<div id="container" class="clearfix">
                    <?php echo $menu?>

					<div id="article" <?php echo (Request::instance()->action != 'list') ? 'class="big"' : ''?>>
						 <?php echo $content?>
					</div>
            </div>

			<?php echo $footer?>
		</div>
		
        <!--[if lt IE 9]>
		<script type="text/javascript" src="/static/js/IE9.js"></script>
		<![endif]-->
        
        <!-- Javascript at the bottom for fast page loading --> 
        <!--[if lt IE 7 ]>
            <script src="/static/js/3rdparty/DD_belatedPNG_0.0.8a-min.js"></script>
            <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
        <![endif]--> 
	</body>
</html>
