<?php

require_once('./mysqli_connect.php');
$ID=0;
 $query = "SELECT ID_przepisu, Nazwa_potrawy, Czas_przygotowania, Skladniki, Opis FROM Przepisy WHERE ID_Przepisu=".$ID;
 $response = @mysqli_query($dbc, $query);
 if($response)
 {
     $przepis=mysqli_fetch_array($response);
     echo $przepis['Nazwa_potrawy']."<br /><br />";
     echo 'Czas przygotowania: '.$przepis['Czas_przygotowania']. ' minut <br /><br />';
     echo 'Skladniki: '.$przepis['Skladniki']. "<br /><br />";
     echo 'Opis przygotowania: <br />'.$przepis['Opis'];
 }
 else {
     echo "Nie mozna wykonac zapytania do bazy danych";
     echo mysqli_error($dbc);
 }

mysqli_close($dbc);

?>