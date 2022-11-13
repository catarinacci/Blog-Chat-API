<div class="p-6 sm:px-6 lg:px-12 sm:rounded-t-lg bg-white border-b border-gray-200">
    <div class="flex text-opacity-25 items-center justify-center text-2xl bg-green-200 shadow-xl rounded-lg">
        <div class="text-gray-900 mr-4 ml-4  ">
            <i class="bi bi-file-earmark-post-fill"></i>
        </div>
        <div class=" font-bold  ">
            NOTE
        </div>
    </div>

    <div class="mt-6 text-xl lg:grid grid-cols-2 gap-2 items-center  ">
        <div class="  bg-indigo-400 rounded-lg ">
            <p class="ml-6">MY_NOTES</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
        Permite al usuario Autenticado visualizar sus publicaciones paginadas de 10 en 10 y ordenadas por fecha de actualización en forma descendente.<br>
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-green-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>GET</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/notes-user</p>
        </div>
    </div>

    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR<br />
            * Debe cargar el token</div>
        </div>
        <div class=" mt-5 overflow-auto">
            <div class="size ">
                <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/select_enviar.jpg"
                    alt="">
            </div>
        </div>
    </div>

    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">RESPUESTA</div>
        </div>
        <div class=" mt-5 overflow-auto bg-slate-100">
            <div class="size">
                <pre>
            <code data-lang="php" >
{
    <span style="color:red;">"data"</span>: [
        {
            <span style="color:red;">"id"</span>: <span style="color:green;">3</span>,
            <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"angel"</span>,
            <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
            <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
            <span style="color:red;">"title"</span>: <span style="color:blue;">"Título modificado nota tres"</span>,
            <span style="color:red;">"content"</span>: <span style="color:blue;">"\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\""</span>,
            <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/kjpeUYU5YLrz3lYIJD0tghJrt0CgGRBqv1A9oV3H.jpg"</span>,
            <span style="color:red;">"comentarios 1"</span>: [
                {
                    <span style="color:red;">"usuario"</span>: <span style="color:blue;">"alberto"</span>,
                    <span style="color:red;">"user_id"</span>: <span style="color:green;">4</span>,
                    <span style="color:red;">"comentario"</span>: <span style="color:blue;">"Ipsa dolor itaque voluptatem fugit. Cumque molestiae perferendis doloribus laborum illum sunt et. Suscipit voluptates laudantium hic tempora quo."</span>
                }
            ],
            <span style="color:red;">"reacciones 0"</span>: <span style="color:blue;">"No tiene reacciones"</span>,
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-11-12T20:29:54.000000Z"</span>,
            <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 12 minutos"</span>,
            <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
        },
        {
            <span style="color:red;">"id"</span>: <span style="color:green;">1</span>,
            <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"angel"</span>,
            <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
            <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
            <span style="color:red;">"title"</span>: <span style="color:blue;">"Título modificado nota uno"</span>,
            <span style="color:red;">"content"</span>: <span style="color:blue;">"\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\""</span>,
            <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/vAuPYgIan55WKUPWnCvDErlr2iOYRrD3FSDf3yRr.jpg"</span>,
            <span style="color:red;">"comentarios 0"</span>: <span style="color:blue;">"No tiene comentarios"</span>,
            <span style="color:red;">"reacciones 1"</span>: [
                {
                    <span style="color:red;">"id"</span>: <span style="color:green;">12</span>,
                    <span style="color:red;">"usuario"</span>: <span style="color:blue;">"gabriel"</span>,
                    <span style="color:red;">"user_id"</span>: <span style="color:green;">2</span>,
                    <span style="color:red;">"reaction"</span>: <span style="color:blue;">"Me enoja"</span>,
                    <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">4</span>
                }
            ],
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-11-12T20:28:56.000000Z"</span>,
            <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 12 minutos"</span>,
            <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
        },
        <span style="color:green;">//</span>
        <span style="color:green;">-</span>
        <span style="color:green;">-</span>
        <span style="color:green;">-</span>
        <span style="color:green;">-</span>
        <span style="color:green;">-</span>
        <span style="color:green;">-</span>
        <span style="color:green;">//</span>
        {
            <span style="color:red;">"id"</span>: <span style="color:green;">13</span>,
            <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"angel"</span>,
            <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
            <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
            <span style="color:red;">"title"</span>: <span style="color:blue;">"temporibus autem quas"</span>,
            <span style="color:red;">"content"</span>: <span style="color:blue;">"Alias vel vero voluptatem vel ullam porro. Ut quia ea aspernatur cum. Atque sint sed aut eius."</span>,
            <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg"</span>,
            <span style="color:red;">"comentarios 0"</span>: <span style="color:blue;">"No tiene comentarios"</span>,
            <span style="color:red;">"reacciones 0"</span>: <span style="color:blue;">"No tiene reacciones"</span>,
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-11-12T20:17:25.000000Z"</span>,
            <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 12 minutos"</span>,
            <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
        }
    ],

    <span style="color:red;">"links"</span>: {
        <span style="color:red;">"self"</span>: <span style="color:blue;">"link-value"</span>,
        <span style="color:red;">"first"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/notes-user?page=1"</span>,
        <span style="color:red;">"last"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/notes-user?page=1"</span>,
        <span style="color:red;">"prev"</span>: <span style="color:blue;">null</span>,
        <span style="color:red;">"next"</span>: <span style="color:blue;">null</span>
        },
        <span style="color:red;">"meta"</span>: {
            <span style="color:red;">"current_page"</span>: <span style="color:green;">1</span>,
            <span style="color:red;">"from"</span>: <span style="color:green;">1</span>,
            <span style="color:red;">"last_page"</span>: <span style="color:green;">1</span>,
            <span style="color:red;">"links"</span>: [
            {
                <span style="color:red;">"url"</span>: <span style="color:blue;">null</span>,
                <span style="color:red;">"label"</span>: <span style="color:blue;">"&laquo; Anterior"</span>,
                <span style="color:red;">"active"</span>: <span style="color:blue;">false</span>
            },
            {
                <span style="color:red;">"url"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/notes-user?page=1"</span>,
                <span style="color:red;">"label"</span>: <span style="color:blue;">"1"</span>,
                <span style="color:red;">"active"</span>: <span style="color:blue;">true</span>
            },
        ],
        <span style="color:red;">"path"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/notes-user"</span>,
        <span style="color:red;">"per_page"</span>: <span style="color:green;">10</span>,
        <span style="color:red;">"to"</span>: <span style="color:green;">4</span>,
        <span style="color:red;">"total"</span>: <span style="color:green;">4</span>
    }
}
            </code>
        </pre>
            </div>
        </div>
    </div>

    <style>
        .size {
            height: 283px;
            width: 800px;
        }
    </style>
