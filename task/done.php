<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/task.css">
    <title>TaskDone</title>
    <?php require_once __DIR__ . '/../header.php'; ?>
</head>

<body>
    <header class="task-header">
        <div class="task-brand">
            <div class="logo">Developerland</div>
            <nav>
                <a href="../index.php">Home</a>
                <a href="create.php" class="btn-action">Nieuwe melding</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <?php
        require_once '../backend/conn.php';
        $query = "SELECT * FROM taken";
        $statement = $conn->prepare($query);
        $statement->execute();
        $takendone = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <section class="takenlijst-wrap">
            <h1>Takenlijst</h1>
            <div class="task-grid">
                <?php foreach ($takendone as $taak) : ?>
                    <article class="task-card">
                        <div class="task-card-header">
                            <h2><?php echo htmlspecialchars($taak['titel']); ?></h2>
                            <a class="task-edit" href="detail.php?id=<?php echo $taak['id']; ?>">✏️</a>
                        </div>
                        <p class="task-desc"><?php echo htmlspecialchars($taak['beschrijving']); ?></p>
                        <ul class="task-meta">
                            <li><strong>Afdeling:</strong> <?php echo htmlspecialchars($taak['afdeling']); ?></li>
                            <li><strong>Deadline:</strong> <?php echo htmlspecialchars($taak['deadline']); ?></li>
                            <li><strong>User:</strong> <?php echo htmlspecialchars($taak['user']); ?></li>
                        </ul>
                        <div class="status <?php echo $taak['status'] == 1 ? 'done' : 'pending'; ?>">
                            <?php echo $taak['status'] == 1 ? 'Done' : 'Not Done'; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="task-footer">2026 pra-b3 Nikita-Finn-Rayan</footer>
</body>

</html>