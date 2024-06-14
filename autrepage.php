<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items:center;
            font-size: 20px;
            background-color:rgb(47,120,158);
            color:white;
        }
        input{
            width: 50%;
        }
        button{
            width: 20%;
        }
    </style>
</head>
<body>
    <?php
        require_once 'conxDB.php';
        require_once 'menu.php';
    ?>
    <div>
        <ul>
            <?php
                $sqlstate = $conn->prepare("SELECT * ,inscription.datevoy ,descriptionvoyage.villedepart ,descriptionvoyage.villearret ,(voyage.duree + voyage.heuredepart) as heure_arrive FROM voyage join inscription on inscription.codevoyage = voyage.codevoyage join descriptionvoyage on descriptionvoyage.codedesc = voyage.codedesc where inscription.codeinsc = ?");
                $sqlstate->execute([$_GET["codeinsc"]]);
                $data = $sqlstate -> fetch(PDO::FETCH_ASSOC);
            ?>
            <li>Travel date : <?php echo $data["datevoy"] ?></li>
            <li>Departure city : <?php echo $data["villedepart"] ?></li>
            <li>Arrival city : <?php echo $data["villearret"] ?></li>
            <li>Departure time : <?php echo $data["heuredepart"] ?></li>
            <li>Arrival time : <?php echo $data["heure_arrive"] ?></li>
        </ul>
    </div>
</body>
</html>
