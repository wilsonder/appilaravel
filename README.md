# OperWeb

Proyecto backend desarrollado en Laravel para guardado, actualización, eliminación y consulta de datos usando APIRest.

## Especificaciones

-   Laravel 8
-   Composer
-   PHP >= 7.0
-   NodeJS
-   MySQL

## Instalaciones

-   Descargar el proyecto de Github
-   Instalar Composer de acuerdo a su sistema operativo, seguir las intrucciones en el siguiente link (https://getcomposer.org/download/)
-   Instalar dependencias con el siguiente comando: `composer install`

## Configuración bases de datos

-   Crear la base de datos con el nombre `appi_laravel`
-   Configurar la conexion a la base de datos editando las constantes DB_DATABASE, DB_USERNAME, DB_PASSWORD de acuerdo a sus configuraciones en el archivo .env

## Migración base de datos

-   Ejecutar eel siguiente comando para la migración de la base de datos: `php artisan migrate`
-   Si desea llenar datos aleatorios para cada una de las tablas de la base de datos, ejecutar el siguiente comando para cada tabla: `php artisan db:seed --class=Nombre del Seed`

## Seeds

-   CategoriasSeed
-   ComentariosSeed
-   PostsSeed

## Ejecución

-   Una vez realizado lo pasos anteriores ejecutar el proyecto por medio del siguiente comando : `php artisan serve`
-   Finalmente ingresar al navegador usando la siguiente url (http://localhost:8000/)
-   Para probar los APIs se recomienda usar Postman, lo puede descargar por medio del siguiente link (https://www.postman.com/)

# APIs

# Crear CSRF Token

## Endpoint

```http
GET /token
```

## Responses

```javascript
903TTJSt3zM8NytJJ2QAG3s1e2kry1DmPfcEujlI
```

# CRUD Posts

# Crear

## Endpoint

```http
POST /posts/create
```

Crea posts y los guarda en la base de datos

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

**Parámetros (form-data)**

| Parameter      | Type      | Description                |
| :------------- | :-------- | :------------------------- |
| `categoria_id` | `integer` | **Required**. Categoria ID |
| `titulo`       | `string`  | **Required**. Título       |
| `contenido`    | `string`  | **Required**. Contenido    |

## Responses

```javascript
El post fue creado
```

# Actualizar

## Endpoint

```http
PUT /posts/update/{id}
```

Actualiza el post de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

**Parámetros (form-data)**

| Parameter      | Type      | Description                |
| :------------- | :-------- | :------------------------- |
| `categoria_id` | `integer` | **Optional**. Categoria ID |
| `titulo`       | `string`  | **Optional**. Título       |
| `contenido`    | `string`  | **Optional**. Contenido    |

## Responses

```javascript
El post se ha actualizado correctamente
```

# Eliminar

## Endpoint

```http
DELETE /posts/delete/{id}
```

Elimina el post de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

## Responses

```javascript
El post ha sido eliminado
```

# Editar

## Endpoint

```http
GET /posts/edit/{id}
```

Muestra el post a actualizar de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 2,
        Categorias_id: 10,
        titulo: "quia",
        contenido:
            "Aspernatur ipsa quos vel veniam. Eos ullam molestiae sunt qui. Fuga voluptatem aut quidem nihil ut doloremque.",
        created_at: "2014-08-29 08:15:17",
        updated_at: "2005-01-09 17:34:29",
    },
];
```

# Ver

## Endpoint

```http
GET /posts/ver/{id}
```

Ver el post de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 2,
        Categorias_id: 10,
        titulo: "quia",
        contenido:
            "Aspernatur ipsa quos vel veniam. Eos ullam molestiae sunt qui. Fuga voluptatem aut quidem nihil ut doloremque.",
        created_at: "2014-08-29 08:15:17",
        updated_at: "2005-01-09 17:34:29",
    },
];
```

# Ver Todo

## Endpoint

```http
GET /posts/vertodo
```

Ver todos los posts guardados en la base de datos

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 2,
        Categorias_id: 10,
        titulo: "quia",
        contenido:
            "Aspernatur ipsa quos vel veniam. Eos ullam molestiae sunt qui. Fuga voluptatem aut quidem nihil ut doloremque.",
        created_at: "2014-08-29 08:15:17",
        updated_at: "2005-01-09 17:34:29",
    },
    {
        id: 2,
        Categorias_id: 10,
        titulo: "quia",
        contenido:
            "Aspernatur ipsa quos vel veniam. Eos ullam molestiae sunt qui. Fuga voluptatem aut quidem nihil ut doloremque.",
        created_at: "2014-08-29 08:15:17",
        updated_at: "2005-01-09 17:34:29",
    },
    {
        id: 3,
        Categorias_id: 1,
        titulo: "aspernatur",
        contenido:
            "Inventore hic sit neque quas omnis. Dolor ipsam impedit illo. Adipisci est non voluptate et voluptas quia molestiae. Omnis velit necessitatibus aut recusandae porro facilis.",
        created_at: "1997-11-23 14:34:13",
        updated_at: "2005-05-17 01:29:45",
    },
];
```

# CRUD Comentarios

# Crear

## Endpoint

```http
POST /comentarios/create
```

Crea comentarios y los guarda en la base de datos

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

**Parámetros (form-data)**

| Parameter   | Type      | Description             |
| :---------- | :-------- | :---------------------- |
| `Posts_id`  | `integer` | **Required**. Posts ID  |
| `contenido` | `string`  | **Required**. contenido |

## Responses

```javascript
El comentario fue creado
```

# Actualizar

## Endpoint

```http
PUT /comentarios/update/{id}
```

Actualiza los comentarios de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

**Parámetros (form-data)**

| Parameter   | Type      | Description             |
| :---------- | :-------- | :---------------------- |
| `Posts_id`  | `integer` | **Optional**. Posts ID  |
| `contenido` | `string`  | **Optional**. contenido |

## Responses

```javascript
El Comentario se ha actualizado correctamente
```

# Eliminar

## Endpoint

```http
DELETE /comentarios/delete/{id}
```

Elimina los comentarios de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

## Responses

```javascript
El comentario ha sido eliminado
```

# Editar

## Endpoint

```http
GET /comentarios/edit/{id}
```

Muestra los comentarios a actualizar de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 1,
        Posts_id: 9,
        contenido: "est",
        created_at: "1981-04-04 06:19:36",
        updated_at: "1987-03-12 22:45:07",
    },
];
```

# Ver

## Endpoint

```http
GET /comentarios/ver/{id}
```

Ver los comentarios de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 1,
        Posts_id: 9,
        contenido: "est",
        created_at: "1981-04-04 06:19:36",
        updated_at: "1987-03-12 22:45:07",
    },
];
```

# Ver Todo

## Endpoint

```http
GET /comentarios/vertodo
```

Ver todos los comentarios guardados en la base de datos

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 1,
        Posts_id: 9,
        contenido: "est",
        created_at: "1981-04-04 06:19:36",
        updated_at: "1987-03-12 22:45:07",
    },
    {
        id: 2,
        Posts_id: 4,
        contenido: "et",
        created_at: "1978-12-12 13:22:27",
        updated_at: "1992-01-13 18:06:52",
    },
    {
        id: 3,
        Posts_id: 9,
        contenido: "sit",
        created_at: "2021-01-28 17:31:14",
        updated_at: "2013-08-26 01:39:19",
    },
    {
        id: 4,
        Posts_id: 1,
        contenido: "et",
        created_at: "1997-11-28 23:34:00",
        updated_at: "2016-07-22 09:28:41",
    },
    {
        id: 5,
        Posts_id: 7,
        contenido: "enim",
        created_at: "1990-11-28 02:15:20",
        updated_at: "1987-03-14 07:58:03",
    },
    {
        id: 6,
        Posts_id: 5,
        contenido: "laborum",
        created_at: "2018-04-04 22:53:57",
        updated_at: "1970-02-06 01:00:27",
    },
    {
        id: 7,
        Posts_id: 6,
        contenido: "corporis",
        created_at: "1970-08-31 05:08:40",
        updated_at: "1978-12-04 05:42:32",
    },
    {
        id: 8,
        Posts_id: 8,
        contenido: "sit",
        created_at: "1970-09-14 16:05:52",
        updated_at: "1981-10-16 15:17:13",
    },
    {
        id: 9,
        Posts_id: 7,
        contenido: "et",
        created_at: "1970-02-12 09:35:46",
        updated_at: "1981-09-03 07:31:59",
    },
    {
        id: 10,
        Posts_id: 10,
        contenido: "soluta",
        created_at: "1980-08-07 15:11:03",
        updated_at: "2003-04-16 10:21:30",
    },
    {
        id: 11,
        Posts_id: 2,
        contenido: "la pelicula fue mala",
        created_at: "2022-03-13 02:35:01",
        updated_at: "2022-03-13 02:42:18",
    },
];
```

# CRUD Categorias

# Crear

## Endpoint

```http
POST /categorias/create
```

Crea categorias y los guarda en la base de datos

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

**Parámetros (form-data)**

| Parameter | Type     | Description          |
| :-------- | :------- | :------------------- |
| `nombre`  | `string` | **Required**. nombre |

## Responses

```javascript
La Categoria fue creada
```

# Actualizar

## Endpoint

```http
PUT /categorias/update/{id}
```

Actualiza las categorias de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

**Parámetros (form-data)**

| Parameter | Type     | Description          |
| :-------- | :------- | :------------------- |
| `nombre`  | `string` | **Optional**. nombre |

## Responses

```javascript
La categoria se ha actualizado correctamente
```

# Eliminar

## Endpoint

```http
DELETE /categorias/delete/{id}
```

Elimina las categorias de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                                                 |
| :------------- | :------- | :---------------------------------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Required**. CSRF Token (generado en el endpoint anterior) |
| `Content-Type` | `string` | **Required**. application/json                              |

## Responses

```javascript
La categoria ha sido eliminado
```

# Editar

## Endpoint

```http
GET /categorias/edit/{id}
```

Muestra las categorias a actualizar de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 1,
        nombre: "fugit",
        created_at: "2003-01-16 10:21:47",
        updated_at: "2011-11-22 17:22:36",
    },
];
```

# Ver

## Endpoint

```http
GET /categorias/ver/{id}
```

Ver las categorias de acuerdo al valor del ID

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 1,
        nombre: "fugit",
        created_at: "2003-01-16 10:21:47",
        updated_at: "2011-11-22 17:22:36",
    },
];
```

# Ver Todo

## Endpoint

```http
GET /categorias/vertodo
```

Ver todas las categorias guardados en la base de datos

**Headers**

| Parameter      | Type     | Description                    |
| :------------- | :------- | :----------------------------- |
| `Content-Type` | `string` | **Required**. application/json |

## Responses

```javascript
[
    {
        id: 1,
        nombre: "fugit",
        created_at: "2003-01-16 10:21:47",
        updated_at: "2011-11-22 17:22:36",
    },
    {
        id: 2,
        nombre: "hic",
        created_at: "2017-07-16 04:36:47",
        updated_at: "1986-07-14 17:17:27",
    },
    {
        id: 4,
        nombre: "quae",
        created_at: "2022-02-11 21:23:19",
        updated_at: "1983-02-19 21:46:57",
    },
    {
        id: 5,
        nombre: "officia",
        created_at: "1988-08-17 08:38:30",
        updated_at: "2008-07-30 14:19:59",
    },
    {
        id: 6,
        nombre: "esse",
        created_at: "1980-04-28 20:32:46",
        updated_at: "2002-09-17 02:54:46",
    },
    {
        id: 7,
        nombre: "magnam",
        created_at: "1992-04-11 19:08:37",
        updated_at: "1971-12-21 01:07:08",
    },
    {
        id: 8,
        nombre: "voluptatibus",
        created_at: "1977-11-19 04:27:43",
        updated_at: "1987-03-02 07:07:53",
    },
    {
        id: 9,
        nombre: "soluta",
        created_at: "1993-11-30 23:24:40",
        updated_at: "1994-09-08 02:20:43",
    },
    {
        id: 10,
        nombre: "cine",
        created_at: "1988-05-07 14:41:50",
        updated_at: "2022-03-13 03:13:36",
    },
    {
        id: 11,
        nombre: "colores",
        created_at: "2022-03-13 03:07:53",
        updated_at: "2022-03-13 03:13:59",
    },
];
```
