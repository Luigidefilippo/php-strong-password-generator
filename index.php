<!-- **Descrizione**
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
**Milestone 1**
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file *index.php*

**Milestone 2**
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale

**Milestone 3**
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente. -->

<?php
//Lunghezza caratteri password
$passwordLenght = $_GET['charactersNumber'];
/* echo $passwordLenght; */

//Funzione per generare la password
function generatePassword($numb)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890?!$£%&*#@';
    $password = array();
    $charactersLenght = strlen($characters);
    for ($i = 0; $i < $numb; $i++) {
        $n = rand(0, $charactersLenght);
        $password[] = $characters[$n];
    }
    return implode($password);
}

$passwordGenerated = generatePassword($passwordLenght);
echo 'Ecco la tua password: ' . $passwordGenerated;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate random password</title>
</head>
<body>
<h1>Password Generator</h1>
    <form action="index.php" method="get">
        <div>
        <label for="charactersNumber">Lunghezza caratteri password:</label>
            <input name="charactersNumber" id="charactersNumber" type="number" placeholder="Inserisci un numero">
        </div>
        <button type="submit">genera Password</button>
    </form>
</body>
</html>