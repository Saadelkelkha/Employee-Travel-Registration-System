<?php
require_once "menu.php";
require_once "conxDB.php";

?>
<form method="post" action="" style="width:216vh;display:flex;flex-direction:column;align-items:center;background-color:rgb(47,120,158);padding:20px">
    <label for="vd">Departure city</label><br>
    <select id="vd" name="vd" style="width:50%;">
        <?php
            $sqlstate = $conn -> query("SELECT * FROM descriptionvoyage");
            $data = $sqlstate -> fetchall(PDO::FETCH_ASSOC);
            foreach ($data as $record) {
        ?>
                <option value="<?php echo $record["villedepart"] ?>"><?php echo $record["villedepart"] ?></option>
        <?php
            }
        ?>
    </select><br>
    <label for="va">Arrival city</label><br>
    <select id="va" name="va" style="width:50%;">
        <?php
            $sqlstate = $conn -> query("SELECT * FROM descriptionvoyage");
            $data = $sqlstate -> fetchall(PDO::FETCH_ASSOC);
            foreach ($data as $record) {
        ?>
                <option value="<?php echo $record["villearret"] ?>"><?php echo $record["villearret"] ?></option>
        <?php
            }
        ?>
    </select><br>
    <label for="dv">Travel date</label><br>
    <input id="dv" name="dv" type="date" style="width:50%;"><br>
    <label for="np">Number of people</label><br>
    <input id="np" name="np" type="number" style="width:50%;"><br>
    <button type="submit" style="width:50%;" name="ai">add</button>
</form>

<?php
    if(isset($_POST["ai"])){
        $vd = $_POST["vd"];
        $va = $_POST["va"];


        $sqlstate = $conn -> prepare("SELECT * FROM descriptionvoyage WHERE villedepart = ? AND villearret = ?");
        $sqlstate -> execute([$vd,$va]);
        $data = $sqlstate -> fetch(PDO::FETCH_ASSOC);
        $cd = $data["codedesc"];

        $sqlstate = $conn -> prepare("SELECT * FROM voyage WHERE codedesc = ?");
        $sqlstate -> execute([$cd]);
        $data = $sqlstate -> fetch(PDO::FETCH_ASSOC);

        $cv = $data["codevoyage"];

        $sqlstate = $conn -> prepare("INSERT INTO inscription VALUES(?,?,?,?,?)");
        $sqlstate -> execute([5,$cv,$_SESSION["codeemp"],$_POST["np"],$_POST["dv"]]);
    }
?>
