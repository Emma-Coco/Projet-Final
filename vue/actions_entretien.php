<?php 
include_once('../modele/Logistique.php');
// Récupérer tous les éléments d'entretien
$actionsEntretien = ActionEntretien::getAllElements();
?>

<link rel="stylesheet" href="../vue/actions_entretien-style.css">


<table>
  <thead>
    <tr>
      <th>Date</th>
      <th>Actions d'entretien</th>
      <th>Description</th>
      <th></th>
      <th>Modifier l'état</th>
      <th>Adresse</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($actionsEntretien as $action) : ?>
    <tr>
    <form action="/controlleurs/update_action.php" method="POST">
     <input type="hidden" name="id" value="<?=$action['id']?>"/>
     <input type="hidden" name="action_id" value="rouge">
      <td><?php echo $action['date_execution']; ?></td>
      <td><textarea style="resize: none; height: 80px; width: 300px;" name="action_entretien"><?php echo $action['etat_dentretien']; ?></textarea></td>
      <td><textarea style="resize: none; height: 80px; width: 300px;" name="description_actions"><?php echo $action['desciption']; ?></textarea></td>
      <td><button type="submit">Mettre à jour les actions</button></td>
      <td>
    </form>
    <form action="/controlleurs/update_action.php" method="POST">
    <form action="/controlleurs/update_action.php" method="POST">
    <input type="hidden" name="id" value="<?=$action['id']?>"/>
    <input type="hidden" name="action_id" value="bleu">
    <select name="etat_action">
        <option value="à faire" <?php if ($action['entretien_status'] == 'à faire') echo 'selected'; ?>>À faire</option>
        <option value="en cours" <?php if ($action['entretien_status'] == 'en cours') echo 'selected'; ?>>En cours</option>
        <option value="partiellement terminé" <?php if ($action['entretien_status'] == 'partiellement terminé') echo 'selected'; ?>>Partiellement terminé</option>
        <option value="terminé" <?php if ($action['entretien_status'] == 'terminé') echo 'selected'; ?>>Terminé</option>
    </select>
    <button type="submit">Mettre à jour l'état</button>
    </form>
    <td><?php echo $action['adress']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>