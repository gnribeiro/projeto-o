<div class="boxform">
    <h3 class="box-bar big"> <a class="select">Editar Sub-link <?php echo $data->name ?></a></h3>

    <div class="big box-content">        

        <div id="formContent">
        
            <a href="/bo/content/list/<?php echo $parent_id?>/" class="insert">
            <img src="/static/images/layout/icons/back-5.png" border="0" class="btn-back"/> 
            Voltar
            </a>

            <?php if(!empty($message)):?>
                <div id="insert-install" class="messageboxes <?php echo ($message) ? 'success' : 'error'?>">
                    <?php echo ($message) ? 'Sub-link editado com sucesso' : 'N&atilde;o  foi possivel editar este Sub-link' ?> 
                </div>
            <?php endif ?>
            
            <div>
            
            <?php if ( ! empty($errors)and isset($errors['category_exist'])): ?>
                <div id="insert-install" class="messageboxes error">
                    <?php echo ucfirst($errors['category_exist']) ?>
                </div>
            <?php endif ?>

                <form action="" method="post"  enctype="multipart/form-data"  />
                    <table cellpadding="0" width="90%" cellspacing="0" border="0">
                        <tr>

                            <td class="label">Nome:</td>
                            <td>
                                <input  type="text"  name="name" value="<?php echo $data->name ?>" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['name'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['name']) ?></span>
                                <?php endif ?>
                            </td>
                        </tr>

                        <tr>

                            <td class="label">Titulo:</td>
                            <td>
                                <input  type="text"  name="title" value="<?php echo $data->title ?>" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['title'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['title']) ?></span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Metatags Description</td>
                            <td>
                                <textarea rows="10" cols="50" name="metatags_description" class="textarea"><?php echo $data->metatags_description ?></textarea>
                                
                                <?php if ( ! empty($errors)and isset($errors['metatags_description'])): ?>
                                <span class="error"><?php echo ucfirst($errors['metatags_description']) ?></span>
                                <?php endif ?>
                            </td>
                        </tr>
                            
                        <tr>
                            <td class="label">Metatags Keywords</td>
                            <td>
                                <textarea rows="10" cols="50" name="metatags_keywords" class="textarea"><?php echo $data->metatags_keywords ?></textarea>
                                        
                                <?php if ( ! empty($errors)and isset($errors['metatags_keywords'])): ?>
                                <span class="error"><?php echo ucfirst($errors['metatags_keywords']) ?></span>
                                <?php endif ?>
                            </td>

                        </tr>

                        <tr>
                            <td class="label">Tem outros Sub-links</td>
                            <td>
                                Sim : <input type="radio" value="1" name="has_childs" <?php echo($data->has_childs == 1) ? 'checked="checked"' : '' ?>   class="custom_input">

                                Nao : <input type="radio" value="0" name="has_childs"  <?php echo($data->has_childs == 0) ? 'checked="checked"' : '' ?>  class="custom_input">
                            </td>
                        </tr>

                        <tr class="none">
                            <td colspan="2" align="right">
                                <input  type="submit" class="btn" value="Editar" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
