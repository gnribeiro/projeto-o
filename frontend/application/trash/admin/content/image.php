<div class="relative">
    <h3 class="box-bar"> <a class="select">Editar conte</a></h3>

    <div class="box-content">        
        <div id="dialog-confirm" title="Deseja apagar imagem"></div>
        <div id="dialog-show_image" title="Imagem"></div>
        <div id="html5_uploader"></div>
</div>

<div class="relative">
<h3 class="box-bar"> <a class="select">listagem Imagens</a></h3>

<div class="box-content">        
    <div id="scroll-container">
        <div id="scroll-content"> 
    <?php if(count($data) > 0): ?>
    <?php 
    $results =  count($data);
    $count   = 1;
    ?>
        <table border="1" cellspacing="0" style="width:500px" cellpadding="0">
            <thead>
            <tr>
                <td align="center"> Image     </td>
                <td align="center"> Destaque  </td>
                <td align="center"> Active    </td>
                <td align="center"> Move      </td>
                <td align="center"> Delete    </td>
            </tr>
            </thead>
        <?php foreach($data as $value):?>
            <tr>
                <td align="center">
                    <a href="#" alt="<?php echo $value->url ?>" class="showimg">
                    <img src="<?php echo  kohana::config('site.server_name').'/'.$value->thumb ?>"  border="0"/>
                    </a>
                </td>

                <td align="center">
                    <a class="highligthimg" href="/bo/image/highligth/<? echo $value->id?>/<? echo $value->highligt ?>" alt="<? echo $value->id?>" rel="<? echo $value->highligt?>">
                        <? if( $value-> highligt == 0):?>
                            <img src="/static/images/layout/icons/red-ball_1.png" border="0" alt="Activar Imagem" title="Colocar Imagem em Destaque"/>
                        <? endif ?>

                        <? if( $value->highligt != 0):?>
                            <img src="/static/images/layout/icons/green-ball-1.png" border="0" alt="Desactivar Imagem" title="Imagem Destaque"/>
                                <? endif ?>
                    </a>
                </td>


                <td align="center">
                    <a class="activeimg" href="/bo/image/active/<? echo $value->id?>/<? echo $value->active?>/" alt="<? echo $value->id?>" rel="<? echo $value->active?>">
                        <? if( $value->active == 0):?>
                            <img src="/static/images/layout/icons/AgtActionSuccess2.png" border="0" alt="Activar Imagem" title="Activar Imagem"/>
                        <? endif ?>
                    

                    <? if( $value->active != 0):?>
                        <img src="/static/images/layout/icons/AgtActionFail2.png" border="0" alt="Desactivar Imagem" title="Desactivar Imagem"/>
                    <? endif ?>

                    </a> 
                </td>

                <td align="center">
                    <?php if($count != 1):?>
                        <a class="moveimg" alt="<?php echo $value->id ?>" rel="up" title="<?php echo $value->pos ?>" href="/bo/image/move/<?php echo $value->id ?>/<?php echo $value->content_id ?>/up/<?php echo $value->pos ?>/">
                            <img src="/static/images/layout/icons/Buildup2.png" border="0" alt="Cima" title="Cima"/>
                        </a>
                    <?php endif ?>

                    <?php if($count != $results):?>
                        <a class="moveimg"  alt="<?php echo $value->id ?>" rel="down" title="<?php echo $value->pos ?>" href="/bo/image/move/<?php echo $value->id ?>/<?php echo $value->content_id ?>/down/<?php echo $value->pos ?>/">
                        <img src="/static/images/layout/icons/Build2.png" border="0" alt="Baixo" title="Baixo"/>
                        </a>
                    <?php $count++;?>    
                    <?php endif ?>

                </td>

                <td align="center">
                    <a class="deleteimg" rel=" <?php echo kohana::config('site.server_name').'/'.$value->thumb ?>" title=""  alt="<?php echo $value->id ?>" href="#">Apagar</a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
    <?php else:?>
        
        <h4> N&atilde;o tem ainda Imagens</h4>
    <?php endif?>
    </div>

    </div>
    </div>
</div>

</div>

