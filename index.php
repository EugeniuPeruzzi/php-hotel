<?php
    //<?php ? >
    include __DIR__.'/partials/variables.php';

?>
<!-- Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G Stampare tutti i nostri hotel con tutti i dati disponibili. Iniziate in modo graduale. 
Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella. -->


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="table-content mt-5 text-center">
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
                                    <td class="p-3"><?php echo $hotel['parking'] ?></td> <!-- parcheggio non lo stampa visto che e un valore booleano -->
                                    <td class="p-3"><?php echo $hotel['vote'] ?></td>
                                    <td class="p-3"><?php echo $hotel['distance_to_center']?>km</td>
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

