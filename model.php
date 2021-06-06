<?php
/**
 * Etablir une Connexion à la base de données
 */
function getDBConnection(): PDO
{
	 include ("includes/bdchat.inc.php");
	// Connexion à la base de données
        try{
            $db = new PDO($dsn, $user, $pwd, $options);
		} 
		// Si une exception est lancée, on la capture et on affiche les informations relatives à celle-ci.
		catch(PDOException $e){
			print "Erreur de connexion à la base de données : " . $e->getMessage()."<br>";
    } 
	return $db;
}

/**
 * Ajouter un message dans la base de données
 */
function create(array $post): void
{
    $db = getDBConnection();

    // Defintion d'une requête d'insertion 
    $sql_insert = 'INSERT INTO message(pseudo, content) VALUES (:p1,:p2)'; 
    
    // Préparer une requête pour l'insertion
    $st = $db->prepare($sql_insert);

    // lier les paramètres
    $st->bindParam(':p1', $post['pseudo']);
    $st->bindParam(':p2', $post['content']);

    // Executer la requête
    $st->execute();

}

/**
 * Supprimer un message de la base de données
 */
function delete(int $id): void
{
    $db = getDBConnection();

    // Defintion d'une requête de suppression
    $sql_delete = 'DELETE FROM message WHERE id=?'; 
    
    // Préparer une requête pour l'insertion
    $st = $db->prepare($sql_delete);

    // Executer la requête
    $st->execute($id);
    echo 'données supprimées';
}


/**
 * Modifier un message dans la base de données
 */
function update(int $id): void
{
    $db = getDBConnection();

    // Defintion d'une requête de suppression
    $sql_update = 'UPDATE message SET content="modified content" WHERE id=?';
    
    // Préparer une requête pour l'insertion
    $st = $db->prepare($sql_update);

    // Executer la requête
    $st->execute($id);
    echo 'données mises à jour';
}


/**
 * Récupérer les messages dans la base de données
 */
function findAll(): array
{
    // Connexion à la base de données
    $db = getDBConnection();

    // Récupération des messages dans le base de données
    $request = $db->query('SELECT * FROM message ORDER BY date DESC LIMIT 10');
    $request->setFetchMode(PDO::FETCH_ASSOC);
    $messages = $request->fetchAll();
    return $messages;
    $request->closeCursor();
}