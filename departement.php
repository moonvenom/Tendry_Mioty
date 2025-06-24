<?php include('../bdd/connexion.php'); ?>
<?php $dept_no = $_GET['dept_no']; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Employés du département</title>
    <link href="../bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body class="bg-light">
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <h1 class="mb-4 text-center">Employés du département <?= htmlspecialchars($dept_no) ?></h1>
        <a href="index.php" class="btn btn-secondary mb-3">← Retour</a>
        <table class="table table-striped table-bordered shadow-sm">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                </tr>
            </thead>
            <tbody class="text-center">
        <?php
        $stmt = $pdo->prepare("
            SELECT e.first_name, e.last_name, t.title
            FROM dept_emp de
            JOIN employees e ON de.emp_no = e.emp_no
            JOIN titles t ON e.emp_no = t.emp_no
            WHERE de.dept_no = ? AND de.to_date = '9999-01-01'
        ");
        $stmt->execute([$dept_no]);

        foreach ($stmt as $row) {
            echo "<tr>
                <td>{$row['last_name']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['title']}</td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="../bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
