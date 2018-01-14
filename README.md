**Pizza rendelő oldal** 
Az oldalt 24 óra alatt készített. <br>
Feladat:<br> 
- pizza rendelés felvétele
- admin oldal 
- rendelések megtekintése
- pizzák hozáadása, szerkesztése

**Általam készített állományok:** 

**Modelek:**<br>
app/Cart.php<br>
app/Order.php<br>
app/User.php<br>
app/UserData.php<br>
app/Pizza.php

**Controllerek:**<br>
app/Http/Controller/CartController.php<br>
app/Http/Controller/OrderController.php
app/Http/Controller/PizzaController.php

**Kinézet:**<br>
resource/views/

**Adatbázis táblák és alap adatok:**<br>
database/migrations/2014_10_12_000000_create_users_table.php<br>
database/migrations/2018_01_08_185003_create_pizzas_table.php<br>
database/migrations/2018_01_08_213753_create_carts_table.php<br>
database/migrations/2018_01_08_213810_create_orders_table.php<br>
database/migrations/2018_01_08_221731_create_user_datas_table.php

**Seeder -> admin hozzáadása:**<br>
database/seeds/UsersSeeder.php


**Method irányítások:**<br>
routes/web.php

**Felhasznált anyagok:**<br>
Css Framework -> Semantic-Ui<br>
PHP Framework -> Laravel 5.5<br>
JQuery


**Telepítés lépései:** 

1. Composer letöltés:
https://getcomposer.org/

2. Ezután parancssorral a letöltött tesztfeladat 
mappájában a következő parancsot kell futtatni: 
`composer update`

3. ".env.example" fájl kiterjesztés módositása a következőre: ".env" 

4. Applikáció kulcs létrehozása parancssorból:
`php artisan key:generate`

5. ".env" fájl adatbázis csatlakoztatása:<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=homestead<br>
DB_USERNAME=homestead<br>
DB_PASSWORD=homestead

6. Adatbázis feltöltése parancssorból:<br>
`php artisan migrate`
`php artisan db:seed`


7. Az index.php fájl a public mappában található, ahonnan az oldal indítható.
