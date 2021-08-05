Prueba tecnica Para Pisos.com

Como las instrucciones lo indicaban he creado tres endpoints que puedes encontrar en routes\api.php

get('/properties') te permite acceder a la lista de propiedades y tiene la posibilidad de filtarse por agencyID
post('/properties') te permite subir una nueva porpiedad
y put('/properties/{id}') te permite editar una propiedad ya existente enviando solo los campos que quieras modificar 

Puedes encontrar las fuciones en app\Http\Controllers\Api\PropertyController.php y los test en tests\Feature\PropertyTest.php

modelado de la base de datos en database\migrations

modelos en app\Models

configuracion de factorys en database\factories\PropertyFactory.php

para installar el proyecto utilizar el comando "composer update" y para correr los tests utilizar el comando "php artisan test"
