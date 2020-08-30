<div class="boxform">
    <h3 class="box-bar big"> <a class="select">Inserir Sub-link em ...</a></h3>

    <div class="big box-content">        

        <div id="formContent">
        
            <a href="/bo/content/list/<?php echo $id?>/" class="insert">
            <img src="/static/images/layout/icons/back-5.png" border="0" class="btn-back"/> 
            Voltar
            </a>
            
            <?php if(!empty($message)):?>
            <div id="insert-install" class="messageboxes <?php echo ($message) ? 'success' : 'error'?>">
                <?php echo ($message) ? 'Sub-link inserida com sucesso' : 'N&atilde;o  foi possivel inserir este Sub-link' ?> 
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
                                <input  type="text" value="<?php echo (isset($_POST['name']) AND !$message) ? $_POST['name']  :'' ?>" name="name" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['name'])): ?>
                                <span class="error"><?php echo ucfirst($errors['name']) ?></span>
                                <?php endif ?>
                            </td>     
                        </tr>

                        <tr>
                            <td class="label">Titulo:</td>
                            <td>
                                <input  type="text" value="<?php echo (isset($_POST['title']) AND !$message) ? $_POST['title']  :'' ?>" name="title" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['title'])): ?>
                                <span class="error"><?php echo ucfirst($errors['title']) ?></span>
                                <?php endif ?>
                            </td>     
                        </tr>

                        <tr>
                            <td class="label">Metatags Description</td>
                            <td>
                                <textarea rows="10" cols="50" name="metatags_description"  class="textarea"><?php echo (isset($_POST['metatags_description']) AND !$message) ? $_POST['metatags_description']  :'' ?></textarea>
                                <?php if ( ! empty($errors)and isset($errors['metatags_description'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['metatags_description']) ?></span>
                                <?php endif ?>
                            </td>
                        </tr>
                            

                        <tr>

                            <td class="label">Metatags Keywords</td>
                            <td>
                                <textarea rows="10" cols="50" name="metatags_keywords" class="textarea"><?php echo (isset($_POST['metatags_keywords']) AND !$message) ? $_POST['metatags_keywords']  :'' ?></textarea>
                                            
                                <?php if ( ! empty($errors)and isset($errors['metatags_keywords'])): ?>
                                <span class="error"><?php echo ucfirst($errors['metatags_keywords']) ?></span>
                                <?php endif ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="label">Tem outros Sub-links</td>
                            <td>
                                Sim : <input type="radio" value="1" name="has_childs" id="360no"  class="custom_input" />

                                Nao : <input type="radio" value="0" name="has_childs"  checked="checked" class="custom_input" />
                            </td>
                        </tr>

                        <tr class="none">
                            <td colspan="2" align="right">
                                <input  type="submit" class="btn" value="Inserir" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
