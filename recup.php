<a href="main.php">Retour vers la page d'acceuil</a>

<?php
if(isset($_GET['tempGET'])){echo "<br>"."GET : la température est ".($_GET['tempGET']-32)*5/9;}
if(isset($_POST['tempPOST'])){echo "<br>"."POST : la température est ".($_POST['tempPOST']-32)*5/9;}