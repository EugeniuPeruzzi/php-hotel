<?php
    //<?php ? >
    include __DIR__.'/partials/variables.php';
    //var_dump($hotels); //per vedere a schermo l'array senza cambiare i fogli di lavoro 
   
    //controllo per quando e settato il pacheggio 
    if(isset($_GET['parking'])){
        $park = $_GET['parking'];
        $parkHotels = [];
        foreach ($hotels as $index => $hotel){
            if($hotel['parking'] == filter_var($park, FILTER_VALIDATE_BOOLEAN) ){
                $parkHotels [] = $hotel;

            }
            else if ($park == 'reset'){
                $parkHotels = $hotels;
            }
        };
        $hotels = $parkHotels;
    };
    //controllo per settare la cicerca sulle stelle del albergo 
    if(isset($_GET['star'])){
        $rating = $_GET['star'];
        //var_dump($rating); //per vedere se il valore che restituisce e un numero e un intero 
        $ratingHotels = [];
        foreach ($hotels as $index => $hotel){
            if($hotel['vote'] === (int)$rating ){  //converte nel momen della dichiarazione il valore di stringa in numero fino a questo punto il valore rimane sempre una stringa.
                $ratingHotels [] = $hotel;
            }
            else if ($rating === 'reset'){
                $ratingHotels = $hotels;
            }
        };
        $hotels = $ratingHotels;
    };
    

?>
<!-- Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G Stampare tutti i nostri hotel con tutti i dati disponibili. Iniziate in modo graduale. 
Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
1 - Mettere l'array in un file esterno ed includerlo con include o require.
2 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
3 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
-->


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css">
    <title>Hotel</title>
</head>
<body>
    <div class="container">
        <div class="text-center my-5">
            <h1>Welcom to Bool Va Go</h1>
        </div>
        <div class="row">
            <div class="col-2 ">
                <div class="form-content mt-5">
                    <form action="index.php" method="GET">
                        <div class="form-list mb-3">
                            <!-- parking form  -->
                            <select name="parking" id="park" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option value="reset">Seleziona parcheggio</option>
                                <option value="1">Con parcheggio</option>
                                <option value="0">Senza parcheggio </option>
                            </select>
                            <!-- star form -->
                            <select name="star" id="star" class="form-select form-select-sm mt-3" aria-label=".form-select-sm example"> 
                                <option value="reset">Stelle</option>
                                <option value="1">1 stella</option> 
                                <option value="2">2 stella</option> 
                                <option value="3">3 stella</option> 
                                <option value="4">4 stella</option> 
                                <option value="5">5 stella</option> 
                            </select> 
                        </div> 
                        <button class="btn btn-primary">Cerca</button> 
                    </form> 
                </div> 
            </div> 
            <div class="col-10 "> 
                <div class="table-content mt-4 text-center"> 
                    <table class="table table-striped"> 
                        <thead> 
                            <tr> 
                                <th scope="col">Nome</th> 
                                <th scope="col">Descrizione struttura</th> 
                                <th scope="col">parcheggio</th> 
                                <th scope="col">Voto</th> 
                                <th scope="col">Distanza dal centro</th> 
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php  foreach ($hotels as $hotel) { ?>
                                <tr>
                                    <td class="p-3"><?php echo $hotel['name'] ?></td>
                                    <td class="p-3"><?php echo $hotel['description'] ?></td>
                                    <?php 
                                        if($hotel['parking'] === true){
                                            echo '<td class="p-3">Con parcheggio</td>';
                                        }
                                        else{
                                            echo '<td class="p-3">Senza parcheggio</td>';   //potevo fare anche un operatore ternario da riccordar per la prossima volta 
                                        };
                                    ?>
                                    <td class="p-3"><?php echo $hotel['vote'] ?></td>
                                    <td class="p-3"><?php echo $hotel['distance_to_center']?> km</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>

