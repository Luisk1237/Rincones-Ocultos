<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cavernas Cuatro Puertas - Recomendaciones de Hoteles y Vuelos</title>
    <link rel="stylesheet" href="estiloMenu.css">
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #808080; /* Color gris elegante */
}
        .center-text {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
        }
        .section {
            margin: 20px 0;
        }
        .hotels, .flights {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .hotel-card, .flight-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 10px;
            padding: 15px;
            width: calc(33.33% - 20px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .hotel-card:hover, .flight-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .hotel-card img, .flight-card img {
            width: 100%;
            border-radius: 10px;
        }
        .hotel-card p, .flight-card p {
            font-size: 16px;
            margin: 10px 0;
        }
        .hotel-card a, .flight-card a {
            display: block;
            text-align: center;
            color: white;
            background-color: #4CAF50;
            padding: 10px;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .hotel-card a:hover, .flight-card a:hover {
            background-color: #45a049;
        }
        h1 {
            color: #080808;
            text-align: center;
            margin-top: 20px;
        }
        .buttons {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .buttons a {
            display: block;
            text-align: center;
            color: white;
            background-color: #f44336;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
            margin: 0 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .buttons a:hover {
            background-color: #d32f2f;
        }
        .buttons a:nth-child(2) {
            background-color: #2196F3;
        }
        .buttons a:nth-child(2):hover {
            background-color: #1976D2;
        }
    </style>
</head>
<body>
    <div class="center-text">
        <h1>Cavernas Cuatro Puertas</h1>
        <h2>Recomendaciones de Hoteles y Vuelos</h2>
    </div>
    <div class="buttons">
        <a href="cerrar_sesion.php">Cerrar sesión</a>
        <a href="forma_pago.php">Agregar forma de pago</a>
    </div>
    <div class="container">
        <!-- Recomendaciones de Hoteles -->
        <div class="section hotels">
            <h2>Hoteles Recomendados</h2>
            <?php
            // Datos simulados de hoteles
            $hoteles = [
                [
                    'nombre' => 'Hyatt',
                    'imagen' => 'img/hotel1.jpg',
                    'enlace' => 'https://www.hyatt.com/es-ES/shop/rooms/TIJZT?rooms=1&adults=2&checkinDate=2024-06-25&checkoutDate=2024-06-26&kids=0&currency=MXN&src=google_paidmeta_TIJZT_localuniversal_1_MX_desktop_2024-06-25_selected_11756638482__standard_sponsored&gclid=Cj0KCQjwvb-zBhCmARIsAAfUI2tXmGOj25PibFhM6RNFclvZ8V1WYC7NS1UR8RqXrVzZ47I7pft-JzIaAvp9EALw_wcB&hmGUID=29bbc752-daa6-434b-8589-5a0884f978b0'
                ],
                [
                    'nombre' => 'Baja Inn',
                    'imagen' => 'img/hotel_2.jpg',
                    'enlace' => 'https://n9.cl/2mx89'
                ],
                [
                    'nombre' => 'One Tijuana',
                    'imagen' => 'img/hotel3.jpg',
                    'enlace' => 'https://reservations.onehoteles.com/107879?adults=2&children=0&currency=MXN&datein=06/25/2024&domain=www.google.com&gclid=Cj0KCQjwvb-zBhCmARIsAAfUI2vEaM2qx7SFYg70oalPqM5MlcLD-Le8XsirH8sme-EkAiDoDXHnHPgaAvm7EALw_wcB&gdp=hotelfinder&hotelID=107879&languageid=2&nights=1&rateplanID=4030383&roomtypeID=454369&subchan=GOOGLE_MX_desktop&utm_campaign=ds_19851321093&utm_content=HPA_107879_localuniversal_1_MX_desktop_2024-06-25_selected_19851321093__standard&utm_medium=meta&utm_source=googleha#/accommodation/room'
                ]
            ];

            foreach ($hoteles as $hotel) {
                ?>
                <div class="hotel-card">
                    <img src="<?php echo $hotel['imagen']; ?>" alt="<?php echo $hotel['nombre']; ?>">
                    <p><?php echo $hotel['nombre']; ?></p>
                    <a href="<?php echo $hotel['enlace']; ?>" target="_blank">Ver Hotel</a>
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Apartado para Vuelos -->
        <div class="section flights">
            <h2>Vuelos Recomendados</h2>
            <?php
            // Datos simulados de vuelos
            $vuelos = [
                [
                    'nombre' => 'Vuelo 1',
                    'imagen' => 'img/vuelo1.jpg',
                    'enlace' => 'https://secure.lastminute.com/hdp/checkout/carts/3CA5D39050A9F6D3923F6791848017580FBA0CB7'
                ],
                [
                    'nombre' => 'Vuelo 2',
                    'imagen' => 'img/vuelo2.jpg',
                    'enlace' => 'https://www.vivaaerobus.com/es-mx/book/options?itineraryCode=PBC_TIJ_20240622.TIJ_PBC_20240706&passengers=A1'
                ],
                [
                    'nombre' => 'Vuelo 3',
                    'imagen' => 'img/vuelo1.jpg',
                    'enlace' => 'https://www2.edestinos.com.mx/booking/P5ORWYIDL9DAO3XDSJC2/1?partner_id=JETCOSTMXD&ctags=jetcostclickid:1718654121064da07ce1901d1'
                ]
            ];

            foreach ($vuelos as $vuelo) {
                ?>
                <div class="flight-card">
                    <img src="<?php echo $vuelo['imagen']; ?>" alt="<?php echo $vuelo['nombre']; ?>">
                    <p><?php echo $vuelo['nombre']; ?></p>
                    <a href="<?php echo $vuelo['enlace']; ?>" target="_blank">Ver Vuelo</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
