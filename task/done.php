<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/task.css">
    <title>TaskDone</title>
</head>

<body>
    <main>
        <?php
        require_once '../backend/conn.php';
        $query = "SELECT * FROM taken WHERE status = 1";
        $statement = $conn->prepare($query);
        $statement->execute();
        $takendone = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php
        require_once '../backend/conn.php';
        $query = "SELECT * FROM taken WHERE status = 0";
        $statement = $conn->prepare($query);
        $statement->execute();
        $takennotdone = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>



        <h1 class="H1taak">Takenlijst</h1>


        <div class="forms">
            <table>
                <h1>Done</h1>
                <tr>
                    <th>Title</th>
                    <th>Beschrijving</th>
                    <th>Afdeling</th>
                    <th>Deadline</th>
                    <th class="user">User</th>
                    <th class="aanpassen">Status</th>
                    <th>Aanpassen</th>
                </tr>
                <?php
                foreach ($takendone as $taak) {
                ?>
                    <tr>
                        <td><?php echo $taak['titel']; ?></td>
                        <td><?php echo $taak['beschrijving']; ?></td>
                        <td><?php echo $taak['afdeling']; ?></td>
                        <td><?php echo $taak['deadline']; ?></td>
                        <td><?php echo $taak['user']; ?></td>
                        <td>
                            <?php
                            if ($taak['status'] == 1) {
                                echo "Done";
                            } else {
                                echo "Not Done";
                            }
                            ?>
                        </td>
                        <td><a href="detail.php?id=<?php echo $taak['id']; ?>">Detail</a></td>
                    </tr>
                <?php
                }
                ?>

            </table>
            <table>
                <h1>Not done</h1>
                <tr>
                    <th>Title</th>
                    <th>Beschrijving</th>
                    <th>Afdeling</th>
                    <th>Deadline</th>
                    <th class="user">User</th>
                    <th class="aanpassen">Status</th>
                    <th>Aanpassen</th>
                </tr>
                <?php
                foreach ($takennotdone as $taak) {
                ?>
                    <tr>
                        <td><?php echo $taak['titel']; ?></td>
                        <td><?php echo $taak['beschrijving']; ?></td>
                        <td><?php echo $taak['afdeling']; ?></td>
                        <td><?php echo $taak['deadline']; ?></td>
                        <td><?php echo $taak['user']; ?></td>
                        <td>
                            <?php
                            if ($taak['status'] == 1) {
                                echo "Done";
                            } else {
                                echo "Not Done";
                            }
                            ?>
                        </td>
                        <td><a href="detail.php?id=<?php echo $taak['id']; ?>">Detail</a></td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </main>
</body>

</html>