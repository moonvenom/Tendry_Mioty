<?php include('../bdd/connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Départements</title>
    <link href="../bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <h1 class="mb-4 text-center">Liste des départements</h1>
        <table class="table table-hover table-bordered shadow-sm">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nom du département</th>
                    <th>Manager</th>
                </tr>
            </thead>
            <tbody class="text-center">
        <?php
        $stmt = $pdo->query("
            SELECT d.dept_no, d.dept_name, CONCAT(e.first_name, ' ', e.last_name) AS manager
            FROM departments d
            JOIN dept_manager dm ON d.dept_no = dm.dept_no
            JOIN employees e ON dm.emp_no = e.emp_no
            WHERE dm.to_date = '9999-01-01'
        ");

        foreach ($stmt as $row) {
            echo "<tr>
                <td><a href='departement.php?dept_no={$row['dept_no']}' class='text-decoration-none'>{$row['dept_name']}</a></td>
                <td>{$row['manager']}</td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="../bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
