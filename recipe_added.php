<html>
<head>
    <title>Dodano przepis!</title>
<body>
<?php
    if(isset($_POST['submit']))
    {
        $data_missing = array ();
        
        if(empty($_POST['Nazwa_przepisu']))
            {$data_missing[]='Nazwa przepisu';}
        else
            {$n_przepisu=trim($POST['Nazwa przepisu']);}
            
        if(empty($_POST['Czas_przygotowania']))
            {$data_missing[]='Czas_przygotowania';}
        else
            {$czas=trim($POST['Czas_przygotowania']);}
            
        if(empty($_POST['Skladniki']))
            {$data_missing[]='Skladniki';}
        else
            {$skladniki=trim($POST['Skladniki']);}
            
        if(empty($_POST['Opis']))
            {$data_missing[]='Opis';}
        else
            {$opis=trim($POST['Opis']);}
        if(empty($data_missing))
        {
            require_once('./mysqli_connect.php');
            $query="INSERT INTO Przepisy (ID_Przepisu, Nazwa_przepisu, Czas_przygotowania, Skladniki, Opis)
            VALUES (NULL, ?, ?, ?, ?)";
            $statement = mysqli_prepare($dbc, $query);
            
            #i Integers
            #s Everything Else
            
            mysqli_stmt_bind_param($statement, "siss", $n_przepisu, $czas, $skladniki, $opis);
            mysqli_stmt_execute($statement);
            
            $affected_rows=mysqli_affected_rows($statement);
            if($affected_rows==1)
            {
                echo 'Przepis dodany';
                mysqli_stmt_close($statement);
                mysqli_close($dbc);
            }
            else
            {
                echo "Blad: ";
                echo mysqli_error();
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
<form action="http://localhost/recipe_added.php" method="post">
            <b><h1>Dodaj nowy przepis:</h1></b>
            <table align="left" width="200">
    
                <p>Nazwa potrawy:<br />
                    <input type="text" name="Nazwa_przepisu" value=""</>
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