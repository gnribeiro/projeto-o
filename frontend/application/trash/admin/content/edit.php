<div class="boxform">
    <h3 class="box-bar big"> <a class="select">Editar conteudo "<?php echo $content->title?>"</a></h3>

    <div class="big box-content">        

        <div id="formContent">
        
            <a href="/bo/content/list/<?php echo  $content->category_id?>/" class="insert">
            <img src="/static/images/layout/icons/back-5.png" border="0" class="btn-back"/> 
            Voltar
            </a>

            <div id="contentEdit" rel="<?php echo $content->id?>" alt="<?php echo $content->category_id?>">
            <div id="insert-install">
            <?php if(!empty($message)):?>
            <div id="insert-install" class="messageboxes <?php echo ($sucess) ? 'success' : 'error'?>">
                <?php echo ($message)  ?> 
            </div>
            <?php endif ?>

            </div>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Editar</a></li>
                    <li><a href="#tabs-2">Imagens</a></li>
                    <li><a href="#tabs-3">Ficheiros</a></li>
                </ul>

                <div id="tabs-1">
                    <form action="" method="post"  enctype="multipart/form-data"  />

                        <table cellpadding="0" width="100%" cellspacing="0" border="0">
                            <tr>

                                <td class="label">Titulo:</td>

                                <td>
                                    <input  type="text" value="<?php echo $content->title?>"  name="title"  class="input" />

                                    <?php if ( ! empty($errors)and isset($errors['title'])): ?>
                                        <span class="error"><?php echo ucfirst($errors['title']) ?></span>
                                    <?php endif ?>
                                </td>    
                            </tr>

                        
                            <tr>
                                <td class="label">Sum&aacute;rio:</td>

                                <td>
                                    <textarea rows="20" cols="50" name="sumary">
                                        <?php echo $content->sumary?>
                                    </textarea>
                                </td>    
                            </tr>

                            <tr>
                                <td class="label">Descri&ccedil;&atilde;o:</td>

                                <td>
                                    <textarea rows="20" cols="50" name="description">
                                        <?php echo $content->description?>
                                    </textarea>
                                        
                                    <?php if ( ! empty($errors)and isset($errors['description'])): ?>
                                        <span class="error"><?php echo ucfirst($errors['description']) ?></span>
                                    <?php endif ?>
                                </td>    
                            </tr>

                            <tr>
                                <td class="label">Data de Publica&ccedil;&atilde;o:</td> 
                                
                                <td>
                                    <input id="datepicker" class="input" type="text" value="<?php echo $content->checkhout_date?>"  name="checkhout_date" />
                                    <?php if ( ! empty($errors)and isset($errors['checkhout_date'])): ?>
                                        <span class="error"><?php echo ucfirst($errors['checkhout_date']) ?></span>
                                    <?php endif ?>
                                </td>
                            </tr>
                            
                            <tr class="none">
                                <td colspan="2" align="right">
                                    <input  type="submit"  class="btn" value="Editar"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div id="tabs-2">
                
                        <?php              
                            echo View::factory('/admin//content/image')
                                    ->set(array('id' => $content->id , 'category_id'=>$content->category_id))
                                    ->set('data' , $content->image)
                                    ->render();
                        ?>
                </div>

                <div id="tabs-3">
                ficheiros
                </div>

            </div>
            </div>
        </div>
    </div>   
</div>
<script>

$(function(){

    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#tabs" ).tabs({
        cookie: {
                // store cookie for a day, without, it would be a session cookie
                    expires: 1
                }
    });
});
</script>
