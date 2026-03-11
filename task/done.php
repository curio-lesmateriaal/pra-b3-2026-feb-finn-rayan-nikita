<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskDone</title>
</head>

<body>
    <?php
    require_once '../backend/conn.php';
    $query = "SELECT * FROM taken";
    $statement = $conn->prepare($query);
    $statement->execute();
    $taken = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <title>Task Done</title>
    <h1></h1>

    <div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;">
        <table>
            <tr>
                <th>Title</th>
                <th>Beschrijving</th>
                <th>Afdeling</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>User</th>
            </tr>
            <?php
            foreach ($taken as $taak) {
            ?>
                <tr>
                    <td><?php echo $taak['titel']; ?></td>
                    <td><?php echo $taak['beschrijving']; ?></td>
                    <td><?php echo $taak['afdeling']; ?></td>
                    <td><?php echo $taak['status']; ?></td>
                    <td><?php echo $taak['deadline']; ?></td>
                    <td><?php echo $taak['user']; ?></td>
                    <td><?php echo $taak['created_at']; ?></td>

                    <!-- <td><a href="detail.php?id=<?php echo $melding['id']; ?>">Detail</a></td> -->
                </tr>
            <?php
            }

            ?>
        </table>
    </div>
</body>

</html>