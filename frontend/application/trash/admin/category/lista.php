<?php if($has_children):?>


<div id="dialog-confirm-Cat" title="Deseja apagar esta categoria"></div>


    <h3 class="box-bar"><a>SubLinks de <?php echo $category_name ?></a></h3>
    
    <div class="box-content">
        <a class="insert" href="/bo/category/insert/<?php echo $id?>/">
            <img src="/static/images/layout/icons/add_category.png" border="0"/>
            inserir links
            </a>

<?php if(count($data) > 0): ?>
<?php 
$results =  count($data);
$count   = 1;
?>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td align="center"> Name                    </td>
                <td align="center"> User edit               </td>
                <td align="center"> Edit                    </td>
                <td align="center"> Active                  </td>
                <td align="center"> Move                    </td>
                <td align="center"> Delete                  </td>
            </tr>
            </thead>
        <?php foreach($data as $value):?>
            <tr>
                <td align="center">
                    <?php echo $value->name ?>
                </td>

                <td align="center">
                    <?php echo $value->user_edit ?>
                </td>

                <td align="center">
                    <a href="/bo/category/edit/<?php echo $value->id ?>/">
                        <img src="/static/images/layout/icons/Documentedit2.png" border="0" alt="Editar link" title="Editar link"/> 
                    </a>
                    </td>

                <td align="center">
                    <?php if($value->active == 0):?>
                    &nbsp;
                        <a class="activecat" alt="<?php echo $value->id ?>"  rel="active" href="/bo/category/active/<?php echo $value->id ?>/active/">
                        <img src="/static/images/layout/icons/AgtActionSuccess2.png" border="0"  alt="Activar link" title="Activar link"/>
                        </a>
                    &nbsp; &nbsp;
                    <?php endif ?>



                    <?php if($value->active == 1):?>
                        <a class="activecat" alt="<?php echo $value->id ?>"   rel="desactive" href="/bo/category/active/<?php echo $value->id ?>/desactive/">
                        <img src="/static/images/layout/icons/AgtActionFail2.png" border="0" alt="Desactivar link" title="Desactivar link"/>
                        </a>
                        &nbsp;
                    <?php endif ?>

                </td>

                <td align="center">
                    <?php if($first_child != $value->id):?>
                    &nbsp;
                        <a class="moveCat" alt="<?php echo $value->id ?>" rel="prev"   href="/bo/category/move/<?php echo $value->id ?>/prev/">
                         <img src="/static/images/layout/icons/Buildup2.png" border="0" alt="Cima" title="Cima" />
                        </a>
                    &nbsp; &nbsp;
                    <?php endif ?>

                    <?php if($last_child != $value->id):?>
                        <a class="moveCat"  alt="<?php echo $value->id ?>" rel="next"   href="/bo/category/move/<?php echo $value->id ?>/next/"><img src="/static/images/layout/icons/Build2.png" border="0" alt="Baixo" title="Baixo" /></a>
                        &nbsp;
                    <?php $count++;?>    
                    <?php endif ?>

                </td>

                <td align="center">
                    <a class="deleteCat"  alt="<?php echo $value->id ?>" rel="<?php echo $value->name  ?> "href="/bo/category/delete/<?php echo $value->id ?>"><img src="/static/images/layout/icons/delete-all.png" border="0" alt="Apagar Conteudo" title="Apagar Conteudo"/></a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>

        <div id="paginationCat">
        <?php echo $pagination ?>
        </div>
    <?php else:?>
        <h4> N&atilde;o tem ainda categorias</h4>
    <?php endif?>
    </div>
</div>

<?php endif?>

