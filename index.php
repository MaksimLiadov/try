<?php

require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <title>Лабортаторная работа №3</title>

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
    <ul class="buttonWrapper">
        <form action="request1.php" >
        <li><button> Выполнить первый запрос</button></li>
        </form>
        <form action="request2.php" >
        <li> <button> Выполнить второй запрос</button></li>
        </form>
        <form action="request3.php" >
        <li> <button> Выполнить третий запрос</button></li>
        </form>
    </ul>
<table>
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Номер телефона</th>
        <th>Зарплата</th>
        <th>Адрес</th>
        <th>Начало работы</th>
    </tr>

    <?php
    $people = mysqli_query($conect, "SELECT * FROM `employees_LiadovM`");
    $people = mysqli_fetch_all($people);
    foreach ($people as $people) {
    ?>
        <tr>
            <td><?= $people[0] ?></td>
            <td><?= $people[1] ?></td>
            <td><?= $people[2] ?></td>
            <td><?= $people[3] ?></td>
            <td><?= $people[4] ?></td>
            <td><?= $people[5] ?></td>
            <td><a href="update.php?id=<?= $people[0] ?>"> Изменить</a></td>
            <td><a href="delete.php?id=<?= $people[0] ?>"> Удалить</a></td>
        </tr>
    <?php

    }
    ?>
</table>
    <h3>Добавление данных</h3>
    <form action="create.php" method="post">

           <p> ФИО</p>
           <input type= "text" name="FIO"> 
           <p> Номер телефона</p>
           <input type= "number" name="PhoneNumber">
           <p> Зарплата</p>
           <input type= "number" name="Salary">
           <p> Адрес</p>
           <input type= "text" name="Adress">
           <p> Начало работы</p>
           <input type= "text" name="StartWork"> <br> <br>

           <button type="submit">Добавить нового сотрудника</button>
    </form>

    <form action="createTable.php" method="post">
           <button type="submit"> Создание таблицы</button>
    </form>
    <form action="alter.php" method="post">
           <button type="submit"> Добавить столбец</button>
    </form>
    <form action="drop.php" method="post">
           <button type="submit">Удаление таблицы</button>
    </form>
    <form action="truncate.php" method="post">
           <button type="submit"> Отчищение таблицы</button>
    </form>

</body>

</html>