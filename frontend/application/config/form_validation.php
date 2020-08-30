<?php

$config = array(
        'contacts' => array(
                    array(
                        'field' => 'nome',
                        'label' => 'lang:contacts.nome',
                        'rules' => 'trim|required|min_length[2]'
                        ),
                        array(
                        'field' => 'assunto',
                        'label' => 'lang:contacts.assunto',
                        'rules' => 'trim|required|min_length[2]'
                        ),
                        array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'trim|required|valid_email'
                        ),
                        array(
                        'field' => 'mensagem',
                        'label' => 'lang:contacts.mensagem',
                        'rules' => 'trim|required|min_length[2]'
                        )
                    ),
        'content_insert' => array(
                       array(
                        'field' => 'title_pt-PT',
                        'label' => 'Titulo em protuguês',
                        'rules' => 'required'
                        ),
                        array(
                        'field' => 'description_pt-PT',
                        'label' => 'Descri&ccedil;&atilde;o em protuguês',
                        'rules' => 'required'
                        ),
                        array(
                        'field' => 'checkhout_date',
                        'label' => '1Publica&ccedil;&atilde;o',
                        'rules' => 'required'
                        )
                    ),
        
        'login'        => array(
                       array(
                        'field' => 'username',
                        'label' => 'User',
                        'rules' => 'required'
                        ),
                        array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                        )
                    ),
        
        'email' => array(
                    array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|valid_email'
                        ),
                        array(
                        'field' => 'username',
                        'label' => 'Nome',
                        'rules' => 'required|alpha'
                        ),
                        array(
                        'field' => 'userfile',
                        'label' => 'Userfile',
                        'rules' => 'required'
                        )
                    )                          
);
