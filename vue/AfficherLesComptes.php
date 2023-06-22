<!DOCTYPE html>
<html>
<head>
    <title>Liste des comptes</title>
</head>
<body>
    <h1>Liste des comptes</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role ID</th>
        </tr>
        <?php
        include_once('../controlleurs/Admin_controlleur.php');
        // Récupérer tous les éléments d'entretien
        $accounts = CategoryGestionnaire::getAllAccount();
        ?>

        <?php foreach ($accounts as $account): ?>
        <tr>
            <td><?php echo $account['id']; ?></td>
            <td><?php echo $account['username']; ?></td>
            <td><?php echo $account['first_name']; ?></td>
            <td><?php echo $account['last_name']; ?></td>
            <td><?php echo $account['mail']; ?></td>
            <td><?php echo $account['role_id']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
