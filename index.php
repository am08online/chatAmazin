<?php
    // Connexion à la base de données
    require 'model/model.php';
    require 'service/checkform.php';

    // Récupération, dans une variable $messages, de tous les messages en base de données
    $errors=[];
    if ($_POST) 
    {
        $errors=checkForm($_POST);
        if (empty($errors))
        {
            create($_POST);
        }   
    }
    $messages = array_reverse(findAll());

    // Mise à jour ou Suppression d'un message en base de données 
    if (isset($_POST['id'])) 
    {
        $id = (is_int($_POST['id'])) ? ($_POST['id']) : 0;
    
        if ($id)
        {
            switch ($action)
            {
                    case "update":
                        // Mise à jour d'un message dans la base de données (Attention particulière à la clause WHERE ! )
                        update($id);
                        // $message was updated."<br>";
                        break;
                    
                    case "delete":
                        // Suppression d'un message de la base de données (Attention particulière à la clause WHERE ! )
                        delete($id);
                        // $message was deleted.<br>"';
                        break;
            }
        }
    }    
    // Inclusion de la vue souhaitée
    require 'view/default.php';
?>