<!-- Affichage de la vue du fil de discussions LCA (Live Chat Amazin) -->

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-2"></th>
            <th scope="col" class="col-1"></th>
            <th scope="col" class="col-8"></th>
            <th scope="col" class="col-1"></th>
        </tr>
    </thead>
    <tbody>
    <!-- Boucle foreach pour afficher les messages -->           
        <?php
        $messages = findAll();
            foreach ($messages as $message)
            {
        ?>
                <tr class="table-light" :nth-child(odd) {background: #555;} :nth-child(even) {background: #999;}>

                    <td class="col-1"><?= substr($message['date'], 0,10); ?><br><?= substr($message['date'], 10); ?></td>
                    <td class="col-1"><?= htmlspecialchars($message['pseudo']); ?></td>
                    <td class="col-8"><?= nl2br(htmlspecialchars($message['content'])); ?></td>

                    <td class="col-1"><input type="submit" value="update "<?= isset($_POST['id'])?$_POST['id']:'';?>" name="action" class="btn btn-primary" value="<?= isset($_POST['id'])?$_POST['id']:'';?>"></td>
                    <td class="col-1"><input type="submit" value="delete "<?= isset($_POST['id'])?$_POST['id']:'';?>" name="action" class="btn btn-danger"></button></td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>