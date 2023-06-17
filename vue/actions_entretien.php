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
      <th>État</th>
      <th>Description</th>
      <th>Modifier l'état</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($actionsEntretien as $action) : ?>
    <tr>
      <td><?php echo $action['created_at']; ?></td>
      <td><?php echo $action['etat_dentretien']; ?></td>
      <td><?php echo $action['desciption']; ?></td>
      <td>
        <form action="update_action.php" method="POST">
          <input type="hidden" name="action_id" value="<?php echo $action['id']; ?>">
          <select name="etat_action">
            <option value="à faire">À faire</option>
            <option value="en cours">En cours</option>
            <option value="partiellement terminé">Partiellement terminé</option>
            <option value="terminé">Terminé</option>
          </select>
          <button type="submit">Mettre à jour</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>