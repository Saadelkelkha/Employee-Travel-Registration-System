<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        require_once "conxDB.php";
        require_once "menu.php";
    ?>
    <form method="post" action="" style="width:216vh;display:flex;flex-direction:column;align-items:center;background-color:rgb(47,120,158);padding:20px">
        <label for="df">Filter date</label><br>
        <input id="df" name="df" type="date" style="width:50%;"><br>
        <button type="submit" name="ls">list</button>
    </form>
    <table border="2" style="background-color:black;border-radius:3px;color:white;width:100%;border:2px solid white;">
        <tr style="border:2px solid white;">
            <td>Registration code</td>
            <td>Travel date</td>
            <td>Number of people registered</td>
            <td>Total to pay</td>
            <td>Details</td>
        </tr>
        <?php
            if(isset($_POST["ls"])){
                $sqlstate = $conn -> prepare("SELECT * , (nbrepers * voyage.prixticket) AS total_amount FROM inscription JOIN voyage on voyage.codevoyage = inscription.codevoyage WHERE datevoy = ?");
                $sqlstate -> execute([$_POST["df"]]);
                $data = $sqlstate -> fetchAll(PDO::FETCH_ASSOC);

                foreach ($data as $record) {
        ?>
                    <tr style="border-bottom: 1px solid white">
                        <td><?php echo $record["codeinsc"]; ?></td>
                        <td><?php echo $record["datevoy"]; ?></td>
                        <td><?php echo $record["nbrepers"]; ?></td>
                        <td><?php echo $record["total_amount"]; ?></td>
                        <td><a style="text-decoration:none;color:white" href="autrepage.php?codeinsc=<?php echo $record["codeinsc"];?>">More Details</a></td>
                    </tr>
        <?php
                }
            }
        ?>
    </table>
            
</body>
</html>
