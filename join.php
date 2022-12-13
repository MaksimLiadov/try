<?php
    require_once 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INNER JOIN</title>
</head>

<style>
    ul.buttonWrapper { list-style-type:none;padding:0;margin:0; width: 100%;}
    ul.buttonWrapper li { text-align: left;margin-bottom: 5px; }
    table {
        width: 70%;
        border: none;
        margin-bottom: 20px;
    }

    table thead th {
        font-weight: bold;
        text-align: left;
        border: none;
        padding: 10px 15px;
        background: #d8d8d8;
        font-size: 16px;
    }

    table thead tr th:first-child {
        border-radius: 8px 0 0 8px;
    }

    table thead tr th:last-child {
        border-radius: 0 8px 8px 0;
    }

    table tbody td {
        text-align: left;
        border: none;
        padding: 10px 15px;
        font-size: 18px;
        vertical-align: top;
    }

    table tbody tr:nth-child(even) {
        background: #f3f3f3;
    }

    table tbody tr td:first-child {
        border-radius: 8px 0 0 8px;
    }

    table tbody tr td:last-child {
        border-radius: 0 8px 8px 0;
    }
</style>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>

        <?php
            $sql = "SELECT employees_LiadovM.ID, employees_LiadovM.FIO, Age_Liadov.age
            FROM `employees_LiadovM`
            INNER JOIN Age_Liadov ON employees_LiadovM.ID = Age_Liadov.id;";

            $salary = mysqli_query($conect, $sql);
            $rows = mysqli_fetch_all($salary);
            foreach($rows as $row) {
                ?>
                    <tr>
                        <td><?= $row[0] ?></td>
                        <td><?= $row[1] ?></td>
                        <td><?= $row[2] ?></td>
                    </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>