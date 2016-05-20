<html>
    <head>
    <title>Dodaj przepis</title>
    </head>
    <body>
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
</html>
        