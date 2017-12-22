# Prueba técnica Plyzer

Con esta prueba pretendemos evaluar tus conocimientos de OOP en PHP, y también nociones muy básicas de la infraestructura web. Para ello, usaremos una versión extremadamente simplificada de Plyzer.

## Dominio
Plyzer es un comparador de precios de productos de parafarmacia. Plyzer almacena productos, y, para cada producto, el precio que cuesta en distintos establecimientos. Con esta información, Plyzer nos dice en qué establecimiento resulta más barato comprar un producto! 
 
Las entidades de nuestro dominio, y sus propiedades, son las siguientes:

* Producto
    - número de referencia (identificador único)
    - nombre
* Precio
    - valor
* Establecimiento
    - nombre

## Instalación y ejecución

El proyecto necesita que el desarrollador disponga de `PHP7` y `composer` previamente instalados. El resto de dependencias ya vienen incluidas en el proyecto. **NO** hay que interactuar con (ni instalar) más infraestructura de la que se da (p.ej. el filesystem, o una base de datos).

Instalación de dependencias:

```bash
composer install
```

La ejecución del proyecto se hace mediante el web server built-in de PHP:

```bash
cd ./public
php -S localhost:8081
```

Deberíamos ver un formulario en el navegador al visitar `http://localhost:8081`.

## Caso de uso a implementar

En esta prueba se pide la implementación (back-end y front-end) de un caso de uso sencillo sobre la base existente. El caso de uso es el siguiente:

> Obtener información de un Producto a través de su número de referencia.

1. El usuario introduce el número de referencia de un producto en un formulario (p.ej. 901001).
2. Si el producto con ese número de referencia no existe, se comunica debidamente al usuario.
3. Si el producto con ese número de referencia existe, se muestra al usuario la siguiente información sobre éste:
    - Número de referencia del producto.
    - Nombre del producto.
    - Valor en € del mejor precio para este producto.
    - Nombre del establecimiento al que pertenece el mejor precio.
    - Porcentaje de ahorro del precio más barato respecto al más caro del producto.

## Estructura del proyecto

El proyecto base ya contiene una cierta estructura que hay que respetar. 

### Front-end

En el fichero `/public/index.html` se encuentra nuestro front-end: un formulario que recoge el número de referencia de un producto y que en su estado actual no funciona. jQuery y Twitter Bootstrap ya vienen incluidos para facilitar el desarrollo.

### Back-end

En el fichero `/public/getInfo.php` se encuentra nuestro (único) end-point de back-end, que se tiene que llamar para conseguir la información del producto que queremos. Este fichero **NO** debe modificarse, pero sí mirar qué hace.

En el fichero `/src/UseCase/GetProducInfo/GetProductInfoService.php` hay un "contrato" que os pedimos que uséis y respetéis a la hora de implementar la lógica de negocio del caso de uso pedido. 

## Juego de pruebas

La aplicación deberá disponer del siguiente conjunto de datos:

### Productos
|Referencia|Nombre|
|---|---|
|901001|Pasta de dientes|
|901002|Jarabe para la tos|
|901003|Pack pañales|
|901004|Crema solar|

### Precios
|Producto|Valor (€)|Establecimiento|
|---|---|---|
|Pasta de dientes|1.50|Promofarma|
||2.50|Farmacia Martorell|
||2.15|Missfarma|
||3.00|Farmacia Orjales|
|Jarabe para la tos|3.60|Farmacia Vence|
||2.52|Openfarma|
||2.55|Missfarma|
||3.15|Farmasky|
||3.20|Promofarma|
|Pack pañales|16.25|Farmasky|
||9.75|Openfarma|
||13.50|Farmacia Martorell|
|Crema solar|6.89|Farmacia Martorell|
||6.35|Openfarma|
||7.62|Promofarma|

Por otro lado, el proyecto trae un test de aceptación para la lógica de negocio del caso de uso que se ha pedido implementar, en el que se comprueba (dado el conjunto de datos pre-establecidos de arriba) que éste se ha desarrollado correctamente. Para ejecutarlo: 

```bash
./vendor/bin/phpunit tests/Acceptance
```

Este test debe pasar al entregar la prueba, y **NO** debe modificarse en ningún momento.

## Se valorará positivamente

* Capacidad de entender y desenvolverse en el framework existente.
* Entrega del caso de uso completo:
    - Funcionando desde el formulario web.
    - Pasando el test de aceptación (sin modificarlo).
* Correcta aplicación de principios OOP y buenas prácticas.
* Atención a la gestión de errores.
* Testeo unitario de componentes desarrollados (a criterio propio). Colocar esos tests en `/tests/Unit/` y ejecutar con `./vendor/bin/phpunit tests/Unit`.

Suerte!
