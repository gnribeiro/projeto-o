<div class="boxform">
    <h3 class="box-bar big"> <a class="select">Suporte Contacto</a></h3>

    <div class="big box-content">        

        <div id="formContent">
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

                            <td class="label">Nome: *</td>

                            <td>
                                <input  type="text"  value="<?php echo (isset($_POST['name']) AND empty($message)) ? $_POST['name'] : '' ?>" name="name" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['name'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['name']) ?></span>
                                <?php endif ?>
                            </td>    
                        </tr>

                        <tr>

                            <td class="label">Nome Empresa: *</td>

                            <td>
                                <input  type="text"  value="<?php echo (isset($_POST['company'])  AND empty($message)) ? $_POST['company'] : '' ?>" name="company" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['company'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['company']) ?></span>
                                <?php endif ?>
                            </td>    
                        </tr>
                    
                        <tr>

                            <td class="label">Assunto: *</td>

                            <td>
                                <input  type="text"  value="<?php echo (isset($_POST['subject'])  AND empty($message)) ? $_POST['subject'] : '' ?>" name="subject" class="input"/>

                                <?php if ( ! empty($errors)and isset($errors['subject'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['subject']) ?></span>
                                <?php endif ?>
                            </td>    
                        </tr>
                    
                        <tr>
                            <td class="label">Mensagem:*</td>

                            <td>
                                <textarea rows="20" cols="50" name="sumary"><?php if (isset($_POST['sumary'])  AND empty($message)) echo $_POST['sumary'] ?></textarea>
                                <?php if ( ! empty($errors)and isset($errors['sumary'])): ?>
                                    <span class="error"><?php echo ucfirst($errors['sumary']) ?></span>
                                <?php endif ?>
                            </td>    
                        </tr>


                        <tr class="none">
                            <td colspan="2" align="right">
                                <input  type="submit"  class="btn" value="Enviar"/>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
         </div>   
    </div>

