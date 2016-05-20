<html>
<head>
    <title>Dodano przepis!</title>
<body>
<?php
    if(isset($_POST['Wyślij!']))
    {
        $data_missing = array ();
        
        if(empty($_POST['Nazwa_potrawy']))
            {$data_missing[]='Nazwa potrawy';}
        else
            {$n_potrawy=trim($_POST['Nazwa_potrawy']);}
            
        if(empty($_POST['Czas_przygotowania']))
            {$data_missing[]='Czas_przygotowania';}
        else
            {$czas=trim($_POST['Czas_przygotowania']);}
            
        if(empty($_POST['Skladniki']))
            {$data_missing[]='Skladniki';}
        else
            {$skladniki=trim($_POST['Skladniki']);}
            
        if(empty($_POST['Opis']))
            {$data_missing[]='Opis';}
        else
            {$opis=trim($_POST['Opis']);}
        if(empty($data_missing))
        {
            require_once('./mysqli_connect.php');
            $query="INSERT INTO Przepisy (ID_Przepisu, Nazwa_potrawy, Czas_przygotowania, Skladniki, Opis)
            VALUES (NULL, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($dbc, $query);
            
            #i Integers
            #s Everything Else
            
            mysqli_stmt_bind_param($stmt, "siss", $n_potrawy, $czas, $skladniki, $opis);
            mysqli_stmt_execute($stmt);
            
            $affected_rows=mysqli_affected_rows($stmt);
            if($affected_rows==1)
            {
                echo 'Przepis dodany';
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
            }
            else
            {
                echo "Blad: ";
                echo mysqli_error($dbc);
            }
            
        }
        else
        {
            echo "Wpisz poniższe dane: <br />";
            foreach($data_missing as $missing)
            {
                echo $missing . '<br />';
                
            }
        }
    }
?>
<form action="http://localhost/test/recipe_added.php" method="post">
            <b><h1>Dodaj nowy przepis:</h1></b>
            <table align="left" width="200">
    
                <p>Nazwa potrawy:<br />
                    <input type="text" name="Nazwa_potrawy" value=""</>
                </p>
            
                <p>Czas przygotowania:<br />
                     <input type="number" name="Czas_przygotowania" value=""</>
                </p>
          
                <p>Skladniki:<br />
                     <textarea name="Skladniki" cols="100" rows="10" value=""></textarea>
                </p>
            
                <p>Opis przygotowania:<br />
                     <textarea name="Opis" cols="100" rows="10" value=""></textarea>
                </p>
                
                <p>
                    <input type="submit" name="Wyślij!"</>
                </p>
                
            </table>
        </form>
</body>
</head>
</html>