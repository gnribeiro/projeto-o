
    <h1> <?php echo (isset($data[0]->category_title)) ? $data[0]->category_title : 'dd'?></h1>

<?php if(count($data)> 0): ?>

	<?php foreach($data as $value): ?>
	
	
	
		<div class="mercados">
		
		<?php if(isset($value->url)): ?>

			<img src="<?php echo $value->url ?>" border="0" alt=""/>
		
		<?php endif ?>
	
			<div>

				<?php if(isset($value->content_title)): ?>
		
				<h2><?php echo $value->content_title ?></h2>
		
				<?php endif ?>
	
				<?php if(isset($value->description)): ?>

				<div>
					<?php echo $value->description ?>
				</div>

				<?php endif ?>
			</div>
	
		</div>
			 <div class="clear"></div>
	<?php endforeach ?>

<?php endif ?>
	
