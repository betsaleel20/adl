<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="date" name="laDate" >
        <input type="time" name="temps" required>
        <input type="submit" name="envoyer">
    </form>
</body>
</html>

<?php
    if(isset($_POST['envoyer'])){
        $var=$_POST['temps'];
        $heure=$var[0].$var[1];
        $heure=(int)$heure;
        $minutes=$var[3].$var[4];
        $minutes=(int)$minutes;
        $enMinute=(($heure*60)+$minutes)*6;

        $h=0;
        $m=0;
        while($enMinute>=60){
            $h+=1;
            $enMinute= $enMinute-60;
        }
        if($enMinute==0){
            $enMinute='00';
        }
        $V=$h.'H'.$enMinute;
        echo("$V<br/>");
        var_dump($V);
        // $var=$_POST['laDate'];
        // echo("La date 1 est: $var </br>");
        // $var=date("H:i",);
        // var_dump($var); 
        // echo("</br>Le numero de la semaine est: $var </br>$num");
        
       /* TRES IMPORTANT
            TRAITEMENTS SUR LES DATES
            date("M"): Retourne l'abreviation du mois en cour;
            date("W"): Retourne le numero (dans l'annee) de la semaine en cour
       */
    }
?>