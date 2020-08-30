<div id="dialog-confirm" title="Deseja apagar este conteudo"></div>


<div id="list_content_warpe">
    <h3 class="box-bar"> <a class="select">Conteudos de <?php echo $category->name ?> </a></h3>
    <div id="list_content" class="box-content" rel="<?php echo $category->id?>" alt="<?php# echo $pagination->current_page ?>">        
        <a class="insert" href="/bo/content/insert/<?php echo $category->id?>/">
        <img src="/static/images/layout/icons/add_content.png" border="0" class="insert-content"/>
        inserir conteudo
        
        </a>
            <?php if(count($data) > 0): ?>
            <div id="warper-content">
                <table border="1" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <td align="center"> titulo    </td>
                        <td align="center"> User edit </td>
                        <td align="center"> Edit      </td>
                        <td align="center"> Active    </td>
                        <td align="center"> Move      </td>
                        <td align="center"> Delete    </td>
                    </tr>
                    </thead>
                <?php foreach($data as $value):?>
                    <tr>
                        <td align="center">
                            <?php echo $value->title ?>
                        </td>

                        <td align="center">
                            <?php echo $value->user_edit ?>
                        </td>

                        <td align="center">
                            <a href="/bo/content/edit/<?php echo $value->category_id ?>/<?php echo $value->id ?>/">
                                <img src="/static/images/layout/icons/Documentedit2.png" border="0" alt="Editar Conteudo" title="Editar Conteudo"/> 
                            </a>
                            </td>

                        <td align="center">
                            <?php if($value->active == 0):?>
                            &nbsp;
                                <a class="activeCont" alt="<? echo $value->id?>" rel="<? echo $value->active?>"  href="/bo/content/active/<?php echo $value->id ?>/active/"><img src="/static/images/layout/icons/AgtActionSuccess2.png" border="0"  alt="Activar Conteudo" title="Activar Conteudo"/></a>
                            &nbsp; &nbsp;
                            <?php endif ?>



                            <?php if($value->active == 1):?>
                                <a class="activeCont" alt="<?php echo $value->id ?>"   rel="<? echo $value->active?>" href="/bo/content/active/<?php echo $value->id ?>/desactive/">
                                    <img src="/static/images/layout/icons/AgtActionFail2.png" border="0" alt="Desactivar Conteudo" title="Desactivar Conteudo"/>
                                </a>
                                &nbsp;
                            <?php endif ?>

                        </td>

                        <td align="center">
                            &nbsp;
                            <?php if($value->pos != 1):?>
                                <a class="moveCont" alt="<?php echo $value->id ?>"  rel="up" title="<?php echo $value->pos ?>"   href="/bo/content/move/<?php echo $value->id ?>/<?php echo $value->category_id ?>/up/<?php echo $value->pos ?>/">
                                    <img src="/static/images/layout/icons/Buildup2.png" border="0" alt="Cima" title="Cima" />
                                </a>
                            &nbsp; &nbsp;
                            <?php endif ?>

                            <?php if($last_position != $value->pos ):?>
                                <a class="moveCont"  alt="<?php echo $value->id ?>"  rel="down" title="<?php echo $value->pos ?>" href="/bo/content/move/<?php echo $value->id ?>/<?php echo $value->category_id ?>/down/<?php echo $value->pos ?>/">
                                    <img src="/static/images/layout/icons/Build2.png" border="0" alt="Baixo" title="Baixo" />
                                </a>
                                &nbsp;
                            <?php endif ?>

                        </td>

                        <td align="center">
                            <a class="deleteCont"  alt="<?php echo $value->id ?>" rel="<?php echo $value->title ?>"href="/bo/content/delete/<?php echo $value->id ?>">
                            <img src="/static/images/layout/icons/delete-all.png" border="0" alt="Apagar Conteudo" title="Apagar Conteudo"/>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </table>

                <div id="pagination"><?php echo $pagination ?></div>
            </div>
            <?php else:?>
                
                <h4> N&atilde;o tem ainda conteudos</h4>
            <?php endif?>
    </div>
</div>
    <div id="list_category_Con" rel="<?php echo $has_children?>"> </div>   
