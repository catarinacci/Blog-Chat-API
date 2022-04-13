<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Note API</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>

            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            <style>
            .pre1{border:1px solid #ccc;padding:10px;margin:12px 0 10px;font-size:0,9em;
            }
            .body {
                font-family: 'Nunito', sans-serif;
            }
             </style>
    </head>
    <body >

        <div class="container justify-center bg-green-100 sm:items-center py-4 sm:pt-0">

            <div class="container bg-lime-100 mt-9 max-w-30rem rounded overflow-hidden shadow-lg mb-9">
               <div class="px-6 py-4">
                <h1 class="text-gray-900 text-3xl font-bold mb-2 underline">    Note API  </h1>
                <p class="text-gray-700 text-base">
                    Note Api s un sistema que realiza los métodos básicos de una red social, los mismos son crear un post con contenido de texto e imágenes, realizar comentarios y aplicar una reacción (me gusta, no me gusta, etc.). Cuenta con un sistema de login mediante token y la posibilidad de subir y descargar una imagen.
                </p>
               </div>

            </div>
            <a href="#register">Regiter</a>
            <a href="#loging">Login</a>
            <a href="#logout">logout</a>
            <a href="#notas_all">Todas las notas</a>
            <a href="#notas_user">Las notas del usuario</a>
            <a href="#notas_create">Crear una nota</a>
            <a href="#notas_update">Modificar una nota</a>
            <a href="#notas_delete">Eliminar una nota</a>
            <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4 ">
                    <div class="font-bold text-xl mb-2">
                        <h2 class="text-gray-900">REGISTER</h2>
                    </div>
                    <p class="text-gray-700 text-base">
                        Crea un nuevo usuario
                    </p>
                    <br>
                    <p class="font-bold"> POST&nbsp;&nbsp;&nbsp;&nbsp; https://catarinacci.herokuapp.com/api/register</p>
                    <br>
<pre>
    Enviar:
    {
            "name": "tito",
            "email": "tito@tito.com",
            "password": "12345678"
    }
    ---------------------------------------------------------------------
    Respuesta:
    {
        "user": {
            "name": "tito",
            "email": "tito@tito.com",
            "updated_at": "2022-02-20T21:04:15.000000Z",
            "created_at": "2022-02-20T21:04:15.000000Z",
            "id": 12
        },
        "res": true,
        "msg": "Usuario registrado correctamente"
    }
</pre>

                </div>
            </div>


            <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4 ">
                    <div class="font-bold text-xl mb-2">
                        <h2 class="text-gray-900">LOGIN</h2>
                    </div>
                    <p class="text-gray-700 text-base">
                        El usuario se loguea en el sistema y se le asigna un token de seguridad
                    </p>
                    <br>
                    <p class="font-bold">  POST&nbsp;&nbsp;&nbsp;&nbsp;https://catarinacci.herokuapp.com/api/login</p>
                    <br>
<pre>
    Enviar:
    {

         "email": "tito@tito.com",
         "password": "12345678"
    }
    --------------------------------------------------------------------
    Respuesta:
    {
        "res": true,
        "token": "8|Vtv8aBDlZe0Tpz2CXMoLIam0frraAc7iXiwRId6j"
    }

</pre>
                </div>
            </div>

            <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4 ">
                    <div class="font-bold text-xl mb-2">
                        <h2 class="text-gray-900">LOGOUT</h2>
                    </div>
                    <p class="text-gray-700 text-base">
                        El usuario cierra seción y se le elimina el token asignado.
                    </p>
                    <br>
                    <p class="font-bold">  POST&nbsp;&nbsp;&nbsp;&nbsp;https://catarinacci.herokuapp.com/api/logout</p>
                    <br>
<pre>
    Respuesta:

    {
        "res": true,
        "msg": "Token Eliminado Correctamente"
    }

</pre>
                </div>
            </div>

            <div class="container bg-lime-100 mt-9 max-w-30rem rounded overflow-hidden shadow-lg mb-9">
                <div class="px-6 py-4 text-center">
                 <h1 class="text-gray-900 text-3xl font-bold mb-2 ">   NOTAS  </h1>
                </div>
             </div>

             <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4 ">
                    <div class="font-bold text-xl mb-2">
                        <h2 class="text-gray-900">Todas las notas</h2>
                    </div>
                    <p class="text-gray-700 text-base">
                        Listado de todas las notas, con sus comentarios, reacciones y cuanto hace que se creó.
                        Las mismas están paginadas de 10 en 10 y ordenado de forma descendente por fecha de actialización.

                    </p>
                    <br>
                    <p class="font-bold">  GET&nbsp;&nbsp;&nbsp;&nbsp;https://catarinacci.herokuapp.com/api/note</p>
                    <br>

<pre>
    {
        "id": 6,
        "creador de la nota": "Judd Veum",
        "email": "bernice.deckow@example.org",
        "user_id": "/api/user/3",
        "content": "Porro accusantium tempora quas iste velit. Aut esse dicta natus ducimus autem ipsum. Praesentium dolore sunt quas culpa ex soluta enim.",
        "image": "public/notas/g2WsbIXDxjI8liw4h0HzbqQggsAMf9RSeNK8Ap1z.jpg", //imagen de la nota tambien puede ser null
        "comentarios 2": [    // tiene dos comentarios
            {
                "usuario": "Maximilian Glover",
                "user_id": 8,
                "comentario": "Magnam eligendi ducimus laboriosam eaque qui. Culpa velit dolore sit vel ullam et. Ullam aut enim rem provident placeat molestias voluptatum. Quo doloribus sit totam aliquid."
            },
            {
                "usuario": "Shanon Macejkovic III",
                "user_id": 2,
                "comentario": "Voluptatum cumque ea error accusantium illum est. Aliquam accusantium velit facilis ea ad nostrum. Consequuntur ullam exercitationem eos nisi inventore cumque est."
            }
        ],
        "reacciones 1": [       //tiene una reación
            {
                "id": 5,
                "usuario": "Judd Veum",
                "user_id": 3,
                "reaction": "Me divierte",
                "typereaction_id": 3
            }
        ],
        "nota creada ": "Hace 5 horas" // cuanto tiempo hace desde que se creó la nota
    },
//*
    ................. //las demás notas
//*

"links": {                      //paginación
    "self": "link-value",
    "first": "http://localhost/api/note?page=1",
    "last": "http://localhost/api/note?page=3",
    "prev": null,
    "next": "http://localhost/api/note?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 3,
        "links": [
            {
                "url": null,
                "label": "&laquo; Anterior",
                "active": false
            },
            {
                "url": "http://localhost/api/note?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://localhost/api/note?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://localhost/api/note?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://localhost/api/note?page=2",
                "label": "Siguiente &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost/api/note",
        "per_page": 10,
        "to": 10,
        "total": 22
    }
</pre><br>
            </div>
        </div>
            <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4 ">
                    <div class="font-bold text-xl mb-2">
                        <a name="notas_user"><h2 class="text-gray-900">Notas del Usuario</h2></a>

            </div>
                <p class="text-gray-700 text-base">
                    Muestra un listado de todas las notas creadas por el usuario logueado, con sus comentarios, reacciones y cuanto hace que se creó.
                        Las mismas están paginadas de 10 en 10 y ordenado de forma descendente por fecha de actualización.
                </p>
                <br>
                <p class="font-bold">  GET&nbsp;&nbsp;&nbsp;&nbsp;https://catarinacci.herokuapp.com/api/note_user</p>
                <br>

<pre>
    Respuesta:

    {
        "data": [
            {
                "id": 22,
                "creador de la nota": "tito",
                "email": "tito@tito.com",
                "user_id": "/api/user/11",
                "content": "asaddasda",
                "image": "public/notas/5AFyBsB0v97IuHcQrP2AnoShSYnoUDhELlIJVsH1.jpg",
                "comentarios 0": "No tiene comentarios",
                "reacciones 0": "No tiene reacciones",
                "nota creada ": "Hace 4 horas"
            },
            {
                "id": 21,
                "creador de la nota": "tito",
                "email": "tito@tito.com",
                "user_id": "/api/user/11",
                "content": "buena nota",
                "image": null,
                "comentarios 0": "No tiene comentarios",
                "reacciones 0": "No tiene reacciones",
                "nota creada ": "Hace 4 horas"
            }
            //*
                 ................. //las demás notas
            //*
        ],                                                              //paginacón
        "links": {
            "self": "link-value",
            "first": "http://localhost/api/note_user?page=1",
            "last": "http://localhost/api/note_user?page=1",
            "prev": null,
            "next": null
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 1,
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Anterior",
                    "active": false
                },
                {
                    "url": "http://localhost/api/note_user?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Siguiente &raquo;",
                    "active": false
                }
            ],
            "path": "http://localhost/api/note_user",
            "per_page": 10,
            "to": 2,
            "total": 2
        }
    }
</pre><br>
                </div>
            </div>


                    <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4 ">
                            <div class="font-bold text-xl mb-2">
                                <h2 class="text-gray-900">Crear una Nota</h2>
                    </div>
                        <p class="text-gray-700 text-base">
                           Se le permite al usuario logueado crear una nota conmpletando el campo "contet" que es obligatorio y el campo "image"
                           que puede ser NULL.
                        </p>
                        <br>
                        <p class="font-bold"> POST&nbsp;&nbsp;&nbsp;&nbsp;https://catarinacci.herokuapp.com/api/note</p>
                        <br>
                        <p>Enviar:</p>
                        <br>
                        <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/guardar_nota.jpg" height="1200" width="900" alt="">
                        <br>
                        <br>
                        <p>Respuesta:</p>
<pre>
    {
        "nota": {
            "id": 23,
            "creador de la nota": "tito",
            "email": "tito@tito.com",
            "user_id": "/api/user/11",
            "content": "titulo original",
            "image": "public/notas/ZLDfNWBz7VyYJIa4oIaWB6y39seNcE3RH1koC7ka.jpg",
            "comentarios 0": "No tiene comentarios",
            "reacciones 0": "No tiene reacciones",
            "nota creada ": "Hace 0 segundos"
        },
        "res": true,
        "msg": "Nota Creada Correctamente"
    }
</pre>
                    </div>
                </div>

                <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4 ">
                        <div class="font-bold text-xl mb-2">
                            <h2 class="text-gray-900">Modificar Nota</h2>
                </div>
                    <p class="text-gray-700 text-base">
                        Se le permite al usuario modificar el campo "content" e "image", siempre y cuando sea el autor de la nota.
                        El usuario debe ingrear por Url el id de la nota que desea modificar.
                    </p>
                    <br>
                    <p class="font-bold">  POST&nbsp;&nbsp;&nbsp;&nbsp;https://catarinacci.herokuapp.com/api/note/23</p>
                    <br>
                    <p>Enviar:</p>
                    <br>
                    <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/actualizar_nota.jpg" width="900" height="500" alt="">

<pre>
    <br>
    <p>Respuesta:</p>
{
    "data": {
        "id": 23,
        "creador de la nota": "tito",
        "email": "tito@tito.com",
        "user_id": "/api/user/11",
        "content": "titulo modificado",             //se modificó el contenido
        "image": "public/notas/cdEqKY6Y1I4balAOIyTWR4AeD9KmiAJB5NZgWxrQ.jpg",    //se cambió la foto
        "comentarios 0": "No tiene comentarios",
        "reacciones 0": "No tiene reacciones",
        "nota creada ": "Hace 10 minutos"
    }
}
</pre><br>
                    </div>
                </div>

                <div class="container mt-9 bg-violet-100 max-w-30rem rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4 ">
                        <div class="font-bold text-xl mb-2">
                            <h2 class="text-gray-900">Eliminar Nota</h2>
                </div>
                    <p class="text-gray-700 text-base">
                        Se le permite al usuario eliminar una nota , siempre y cuando sea el autor de la nota.
                        El usuario debe ingrear por Url el id de la nota que desea eliminar.
                    </p>
                    <br>
                    <p class="font-bold">  DELETE&nbsp;&nbsp;&nbsp;&nbsp;https://catarinacci.herokuapp.com/api/note/23</p>
                    <br>
<pre>
    <br>
    <p>Respuesta:</p>
    {
        "res": "La nota 23 se eliminó correctamente"
    }
</pre><br>
                    </div>
                </div>


        </div>
    </div>
    </body>
</html>
