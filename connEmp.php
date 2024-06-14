<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for="user">User</label><br>
        <input id="user" name="user" type="text"><br>
        <label for="pwd">Password</label><br>
        <input id="pwd" name="pwd" type="password"><br><br>
        <button type="submit" name="conn">Connexion</button>
    </form>
    <?php
        if(isset($_POST["conn"])){
            session_start();
            $user = $_POST["user"];
            $pwd = $_POST['pwd'];

            require_once "conxDB.php";
            $sqlstate = $conn -> prepare("SELECT * FROM employe WHERE user = ? AND pwd = ?");
            $sqlstate -> execute([$user,$pwd]);
            $data = $sqlstate -> fetch(PDO::FETCH_ASSOC);

            if($data){
                $_SESSION['conn'] = true;
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['fonction'] = $data['fonction'];
                $_SESSION["codeemp"] = $data['codeEmp'];
                header('Location: sinscrire.php');
            }else{
                $_SESSION['conn'] = false;
            }
        }
    ?>
</body>
</html>
