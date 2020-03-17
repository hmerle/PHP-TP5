<?php
echo "<h1>TP5 : Transmission de données</h1>";
?>
<DOCTYPE html>
    <html>
        <body>
            <a href='main.php'>Cliquez ici pour actualiser</a>
        </body>
    </html>
</DOCTYPE>
<?php
echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex1----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 1</h2>";

?>

<DOCTYPE html>
    <html>
        <body>
            <a href='main.php?temperature=32'>Cliquez ici pour afficher la température en degré</a>
        </body>
    </html>
</DOCTYPE>

<?php
function temperature(){

        $temperature = ($_GET['temperature'] - 32) * 5 / 9;
        echo "<br>La valeur en degré est " . $temperature . "<br>";
}
if($_GET != null) {temperature();}

function temperatureGET(){
?>
<br>
<br>
<form action="recup.php" method="get">
    Température : <input type="number" name="tempGET"/>
    <br>
    <input type="submit" value="Convertir"/>
</form>
<?php
}
temperatureGET();

function temperaturePOST(){
    ?>
    <br>
    <br>
    <form action="recup.php" method="post">
        Température : <input type="number" name="tempPOST"/>
        <br>
        <input type="submit" value="Convertir"/>
    </form>
    <?php
}
//temperaturePOST();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex2----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 2</h2>";

?>
<form action="main.php" method="post">
    Nom : <input type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"/>
    Prénom : <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>"/>
    <br>
    <label>Débutant</label><input type="radio" name="niveau" value="débutant">
    <label>Avancé</label><input type="radio" name="niveau" value="avancé">
    <input type="reset" value="Effacer">
    <input type="submit" value="Vérifier">
</form>
<?php

function identitePOST(){
    echo "Bonjour ".$_POST['prenom']." ".$_POST['nom'].". Vous avez un niveau ".$_POST['niveau'].".";
}

if(isset($_POST['nom']) && isset($_POST['prenom'])){
//    identitePOST();
}

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex3----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 3</h2>";

?>

<form action="main.php" id="ex3" method="post">
    Nom : <input type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"/>
    Prénom : <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>"/>
    Age : <input type="text" name="age" value="<?php if (isset($_POST['age'])){echo $_POST['age'];} ?>">
    <br>
    Langues pratiquées (choisir au minimum 2) : <br>
    <select name="langues[]" multiple="multiple">
        <option value="Français">Français</option>
        <option value="Anglais">Anglais</option>
        <option value="Allemand">Allemand</option>
        <option value="Espagnol">Espagnol</option>
    </select>
    <br>
    Compétences informatiques (choisir au minimum 2) : <br>
    <label>HTML<input type="checkbox" name="coding1" value="HTML"/></label>
    <label>CSS<input type="checkbox" name="coding2" value="CSS"/></label>
    <label>PHP<input type="checkbox" name="coding3" value="PHP"/></label>
    <label>SQL<input type="checkbox" name="coding4" value="SQL"/></label>
    <label>C<input type="checkbox" name="coding5" value="C"/></label>
    <label>C++<input type="checkbox" name="coding6" value="C++"/></label>
    <label>JS<input type="checkbox" name="coding7" value="JS"/></label>
    <label>Python<input type="checkbox" name="coding8" value="Python"/></label>
    <input type="submit" value="Envoyer"/>
</form>

<?php

function fullidentityPOST(){
    echo"<br>Vous êtes ".$_POST['nom']." ".$_POST['prenom'].".<br>Vous avez ".$_POST['age']." ans.<br>Vous parlez :";
    foreach ($_POST['langues'] as $item){
        echo "<li>$item</li>";
    }
    echo "Vous avez des compétences informatiques en : <br>";
    for ($i = 1; $i < 9; $i++){
        if(isset($_POST['coding'.$i])){echo "<li>".$_POST['coding'.$i]."</li>";}
    }
}

//fullidentityPOST();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex4----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 4</h2>";
function maths(){
    if(!empty($_POST['x']) && !empty($_POST['y'])) {
        if ($_POST['equation'] == 'Addition x + y') {
            $_POST['result'] = $_POST['x'] + $_POST['y'];
        }
        if ($_POST['equation'] == 'Soustraction x - y') {
            $_POST['result'] = $_POST['x'] - $_POST['y'];
        }
        if ($_POST['equation'] == 'Division x/y') {
            if($_POST['y'] != 0) {
                $_POST['result'] = $_POST['x'] / $_POST['y'];
            }
            else $_POST['result'] = null;
        }
        if ($_POST['equation'] == 'Puissance x^y') {
            $_POST['result'] = $_POST['x'] ** $_POST['y'];
        }
    }
    else{
        $_POST['result'] = null;
    }
}
//maths();
?>
<form action="main.php" method="post" id="ex4">
    <label>Nombre x <input type="number" name="x"/></label>
    <label>Nombre y <input type="number" name="y"/></label>
    <label>Résultat <input type="number" name="result" value="<?php if (isset($_POST['result'])){echo $_POST['result'];} ?>" disabled/></label>
    <br>
    <input type="submit" value="Addition x + y" name="equation"/>
    <input type="submit" value="Soustraction x - y" name="equation"/>
    <input type="submit" value="Division x/y" name="equation"/>
    <input type="submit" value="Puissance x^y" name="equation"/>
</form>
<?php

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex5----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 5</h2>";
?>
<!--<form action="main.php" method="post" enctype="multipart/form-data">-->
<!--    <label>Fichier 1<input type="file" value="Choisir un fichier" name="file1"/></label><br>-->
<!--    <label>Fichier 2<input type="file" value="Choisir un fichier" name="file2"/></label><br>-->
<!--    <label><input type="submit" value="Envoi"/></label><br>-->
<!--</form>-->

<form action="main.php" method="post" enctype="multipart/form-data">
    Fichier 1 <input type="file" name="f1" value="Choisir un fichier"><br>
    Fichier 2 <input type="file" name="f2" value="Choisir un fichier"><br>
    <input type="submit">
</form>

<style>
    .border{
        border: medium solid black;
    }
</style>

<?php

echo "<table class='border'><tr><td class='border'></td><td class='border'><strong>Fichier 1</strong></td><td class='border'><strong>Fichier 2</strong></td></tr>";
echo "<tr><td class='border'>name</td><td class='border'>" .$_FILES["f1"]["name"]. "</td><td class='border'>" .$_FILES["f2"]["name"]. "</td></tr>";
echo "<tr><td class='border'>type</td><td class='border'>" .$_FILES["f1"]["type"]. "</td><td class='border'>" .$_FILES["f2"]["type"]. "</td></tr>";
echo "<tr><td class='border'>tmp_name</td><td class='border'>" .$_FILES["f1"]["tmp_name"]. "</td><td class='border'>" .$_FILES["f2"]["tmp_name"]. "</td></tr>";
echo "<tr><td class='border'>error</td><td class='border'>" .$_FILES["f1"]["error"]. "</td><td class='border'>" .$_FILES["f2"]["error"]. "</td></tr>";
echo "<tr><td class='border'>size</td><td class='border'>" .$_FILES["f1"]["size"]. "</td><td class='border'>" .$_FILES["f2"]["size"]. "</td></tr>";
$result1 = move_uploaded_file($_FILES["f1"]["tmp_name"],$_FILES["f1"]["name"]);
$result2 = move_uploaded_file($_FILES["f2"]["tmp_name"],$_FILES["f2"]["name"]);
if ($result1 and $result2){
    ?>
    <tr><td class='border'>Image</td><td class='border'><img src="<?php echo $_FILES['f1']['name']; ?>"</td><td class='border'><img src="<?php echo $_FILES['f2']['name']; ?>"></td></tr>";
    <?php
}
echo "</table>";
?>

<?php
//function images(){
//    $result1 = move_uploaded_file($_FILES["file1"]["tmp_name"],$_FILES["f1"]["name"]);
//    $result2 = move_uploaded_file($_FILES["file2"]["tmp_name"],$_FILES["f2"]["name"]);
//
//    echo "<table border='5px'>
//    <tr><td></td><td>Fichier 1</td><td>Fichier 2</td></tr>
//    <tr><td>Name</td><td>".$_FILES['file1']['name']."</td><td>".$_FILES['file2']['name']."</td></tr>
//    <tr><td>Type</td><td>".$_FILES['file1']['type']."</td><td>".$_FILES['file2']['type']."</td></tr>
//    <tr><td>tmp_name</td><td>".$_FILES['file1']['tmp_name']."</td><td>".$_FILES['file2']['tmp_name']."</td></tr>
//    <tr><td>Error</td><td>".$_FILES['file1']['error']."</td><td>".$_FILES['file2']['error']."</td></tr>
//    <tr><td>Size</td><td>".$_FILES['file1']['size']."</td><td>".$_FILES['file2']['size']."</td></tr>";
//    if ($result1 and $result2){
//        ?>
<!--        <tr><td class='border'>Image</td><td class='border'><img src="--><?php //echo $_FILES['f1']['name']; ?><!--"</td><td class='border'><img src="--><?php //echo $_FILES['f2']['name']; ?><!--"></td></tr>";-->
<!--        --><?php
//    }
//    echo "</table>";
//}
//images();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex7----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 7</h2>";

function cookies(){
    setcookie("cookie0", "test0");
    setcookie("cookie1", "test1", time() + 60*60*24*14);
    echo $_COOKIE["cookie0"];
    echo $_COOKIE["cookie1"];
    setcookie("cookie0", "");
    setcookie("cookie1", "", time() + 60*60*24*14);
    print_r($_COOKIE);
}

//cookies();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex8----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 8</h2>";

function tableauAssociatif(){
    $tab = ['1' => 'One', '2' => 'Two', '3' => 'Three'];
    setcookie(key($tab[1]), $tab[1]);
    setcookie(key($tab[2]), $tab[2]);
    setcookie(key($tab[3]), $tab[3]);
    var_dump($_COOKIE);
}

//tableauAssociatif();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex9----------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 9</h2>";

function sessions(){
    session_start();
    echo session_id();
    $_SESSION['name'] = 'hmerle';
    $_SESSION['time'] = time();
    $_SESSION['site'] = 'main.php';
    echo '<br /><a href="page.php'. SID .'">Page 2</a>';

}

//sessions();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex10---------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 10</h2>";

function fichier(){
    $file = fopen('test-fic.txt', 'a+');
    fwrite($file, '<br>Hugo Merle');
    fclose($file);
    $file = fopen('test-fic.txt', 'r');

    if ($file) {
        while ($ligne = fgets($file)) {
            echo $ligne . '<br>';
        }
    }
    fclose($file);
}

fichier();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex11---------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 11</h2>";

function contacts(){
    $file = fopen('contact.txt', 'r');
    $str = '';
    if ($file) {
        while ($ligne = fgets($file)) {
            $str .=$ligne;
        }
    }
    echo $str;
    $tab = split(";", $str);
    echo "<table border>";
    for($i = 0; $i < sizeof($tab); $i+=3){
        echo "<tr><td>".$tab[$i]."</td><td>".$tab[$i+1]."</td><td>".$tab[$i+2]."</td></tr>";
    }
    echo "</table>";
}

contacts();

echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex12---------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 12</h2>";



echo "<hr>";

//-----------------------------------------------------------------------------------
//----------------------------------------Ex13---------------------------------------
//-----------------------------------------------------------------------------------

echo "<h2>Ex 13</h2>";
