
<div id="contacto">

<?php  $this->template->partial('content_lite' , 'layouts/content_images' , $data)?>
</div>
<div class="form_contactos">

 	<?php  if (isset($message)):?>

	<div class="result_contactos">
    
    <?php echo ($message) ? lang('contacts.msg1') : lang('contacts.msg2'); ?>
    
    </div>

 	<?php  endif ?>

	<form action="<?php echo current_url()?>" method="post" id="contactos">
		<label><?php echo lang('contacts.nome')?>:</label>
		<input type="text" name="nome" id="nome"/>
		<span>
		    <?php echo form_error('nome');?>
        </span>

		<label><?php echo lang('contacts.email')?>:</label>
		<input type="text" name="email" id="email"  />
		<span>
		    <?php echo form_error('email');?>
        </span>

		<label><?php echo lang('contacts.assunto')?>:</label>
        <input type="text" name="assunto" id="assunto" />
		<span>
		    <?php echo form_error('assunto');?>
        </span>
	
		<label class="msg"><?php echo lang('contacts.mensagem')?>:</label>
		<textarea  name="mensagem" rows="5" cols="10" id="mensagem"></textarea>
		<span>
		    <?php echo form_error('mensagem');?>
        </span>

		<div class="clear"></div>
		<input type="submit" value=""  class="submit"/>
	</form>
	
</div>
<div class="result"></div>


