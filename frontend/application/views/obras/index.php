<?php if(is_array($data)): ?>
<h1> <?php echo lang('obras.title').' '.$data[0]->cat_title?></h1>
<div class="obras">
	<table cellpadding="0" border="0" cellspacing="0" width="500">
		<tr>
			<th><?php echo lang('obras.cliente')?></th>
			<th><?php echo lang('obras.descricao')?></th>
        <?php if($id!=12): ?>
			<th><?php echo lang('obras.duracao')?></th>
        <?php endif ?>
            <th><?php echo lang('obras.ano')?></th>
            <th><?php echo lang('obras.local')?></th>				
		</tr>

	<?php foreach($data as $value): ?>
	
		<tr>	
			 <td text-align="center"><?php echo $value->cliente ?></td>
			 <td><?php echo $value->descricao ?></td>
            <?php if($id!=12): ?>
			 <td><?php echo $value->duracao ?></td>
            <?php endif ?>
             <td text-align="center" width="80"><?php echo $value->ano?></td>
            <td><?php echo $value->local ?></td>
		</tr>
	
	<?php endforeach ?>
	</table>
   
    <div class="pagination">	
         <? echo $this->pagination->create_links();?>
     </div>
</div>
<?php endif ?>
