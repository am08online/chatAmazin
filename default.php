<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat Amazin</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Live Chat Amazin</h1>

        <!-- Insertion du chat et du formulaire dans ce fichier template.-->    
        <?php if (!empty($errors))
        {
        ?>  
            <!-- Bandeau d'alerte en cas d'erreur(s) -->
            <div class="alert alert-dismissible alert-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading"></h4>
            <p class="mb-0"><a href="index.php" class="alert-link">Attention:<?php foreach ($errors as $error) echo "<br>".$error; ?></a></p>
            </div>
        
        <?php 
        } 
            require 'chat.php';
            require 'form.php';
        ?>
    </div>
</body>
</html>