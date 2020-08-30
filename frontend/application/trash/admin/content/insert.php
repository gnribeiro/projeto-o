<div class="boxform">
    <h3 class="box-bar big"> <a class="select">Inserir conteudos de</a></h3>

    <div class="big box-content">        

        <div id="formContent">
        
            <a href="/bo/content/list/<?php echo $category_id?>/" class="insert">
            <img src="/static/images/layout/icons/back-5.png" border="0" class="btn-back"/> 
            Voltar
            </a>

            <div id="insert-install">
            <?php if(!empty($message)):?>
            <div id="insert-install" class="messageboxes <?php echo ($sucess) ? 'success' : 'error'?>">
                <?php echo ($message)  ?> 
            </div>
                
            <?php endif ?>
            </div>

            <div>
                <form action="" method="post"  enctype="multipart/form-data"  />

                    <table cellpadding="0" width="90%" cellspacing="0" border="0">
                        <tr>

                            <td class="label">Titulo: *</td>

                            <td>
                                <input  type="text"  value="<?php echo (isset($_POST['title']) And !$sucess) ? $_POST['title'] : '' ?>" name="title" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['title'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['title']) ?></span>
                                <?php endif ?>
                            </td>    
                        </tr>

                    
                        <tr>
                            <td class="label">Sum&aacute;rio:</td>

                            <td>
                                <textarea rows="20" cols="50" name="sumary">
                                    <?php echo (isset($_POST['sumary']) And !$sucess) ? $_POST['sumary'] : ''?>
                                </textarea>
                            </td>    
                        </tr>

                        <tr>
                            <td class="label">Descri&ccedil;&atilde;o: *</td>

                            <td>
                                <textarea rows="20" cols="50" name="description">
                                    <?php echo (isset($_POST['description']) And !$sucess) ? $_POST['description'] : ''?>
                                </textarea>
                                    
                                <?php if ( ! empty($errors)and isset($errors['description'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['description']) ?></span>
                                <?php endif ?>
                            </td>    
                        </tr>

                        <tr>
                            <td class="label">Data de <br />Publica&ccedil;&atilde;o: *</td> 
                            
                            <td>
                                <input id="datepicker" type="text"  value="<?php echo (isset($_POST['checkhout_date']) And !$sucess) ? $_POST['checkhout_date']: ''?>" name="checkhout_date" class="input"/>
                                <?php if ( ! empty($errors)and isset($errors['checkhout_date'])): ?>
                                    <span  class="error"><?php echo ucfirst($errors['checkhout_date']) ?></span>
                                <?php endif ?>
                            </td>
                        </tr>

                        <tr class="none">
                            <td colspan="2" align="right">
                                <input type="hidden" value="<?php echo $category_id ?>" name="category_id"/> 
                                <input  type="submit"  class="btn" value="Inserir"/>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
         </div>   
    </div>

<script>
$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
