<?php
session_start();
if (!isset($_SESSION['conn']) || $_SESSION['conn'] == false) {
    header('Location: connEmp.php');
} else {
    $nom = $_SESSION['nom'];
    $fonction = $_SESSION['fonction'];
?>
<nav style="display:flex;text-decoration:none;flex-direction:row;background-color:black;padding-right:2%">
    <ul style="list-style-type:none;display:flex;justify-content:space-between;align-content: center;width:100%;color:white;">
        <li><a href="sinscrire.php" style="text-decoration:none;color:white;">Register</a></li>
        <li><a href="listeIns.php" style="text-decoration:none;color:white;">Travel List</a></li>
        <li><a href="deconnecter.php" style="text-decoration:none;color:white;">Sign out</a></li>
        <li>Name : <?php echo $nom; ?></li>
        <li>Function : <?php echo $fonction; ?></li>
    </ul>
</nav>
<?php   
}
?>
