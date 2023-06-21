<form action="../controlleurs/client_controlleur.php" method="post">
    <input type="hidden" name="action" value="ajouterMessageReservation" />
    <input type="hidden" name="id_reservation" value="<?php echo $detailReservation['id']; ?>" />
    <textarea class="message-field" placeholder="Écrivez votre message" name="message"></textarea>
    <button class="send-button">Envoyer mon message</button>
</form>

<form action="../controlleurs/client_controlleur.php" method="post">
    <input type="hidden" name="action" value="historiqueMessageReservation" />
    <input type="hidden" name="id_reservation" value="<?php echo $detailReservation['id']; ?>" />
    <button class="send-button">Afficher historique des messages</button>
</form>