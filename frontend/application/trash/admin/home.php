<div id="dashet">
    <div class="column" id="col1">

        <?php if(count($content) > 0):?>
        
        <div class="portlet" id="list1">
            <div class="portlet-header">Conteudos</div>
                <div class="portlet-content">
                    <ul>
                        <?php foreach($content as $value):?>
                        <li><a href="<?php echo $value['uri'] ?>" border="0"><?php echo $value['label'] ?></a></li>
                        <?php endforeach?>
                    </ul>
                </div>
        </div>
        
        <?php endif?>


        <?php if(count($tools) > 0):?>
        
        <div class="portlet" id="list2">
            <div class="portlet-header">Ferramentas</div>
                <div class="portlet-content">
                    <ul>
                        <?php foreach($tools as $value):?>
                        <li><a href="<?php echo $value['uri'] ?>" border="0"><?php echo $value['label'] ?></a></li>
                        <?php endforeach?>
                    </ul>
                </div>
        </div>
        
        <?php endif?>
    </div>

    <div class="column"  id="col2">

        <?php if(count($help) > 0):?>
        
        <div class="portlet" id="list3">
            <div class="portlet-header">Ajudas</div>
                <div class="portlet-content">
                    <ul>
                        <?php foreach($help as $value):?>
                        <li><a href="<?php echo $value['uri'] ?>" border="0"><?php echo $value['label'] ?></a></li>
                        <?php endforeach?>
                    </ul>
                </div>
        </div>
        
        <?php endif?>
    </div>
</div>
