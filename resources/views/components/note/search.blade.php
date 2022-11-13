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
            <p class="ml-6">SEARCH_NOTES</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
        Permite al usuario Autenticado buscar publicaciones por titulo o contenido. Las publicaciones son paginadas de 10 en 10 y ordenadas por fecha de actualización en forma descendente.<br>
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-green-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>GET</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/search</p>
        </div>
    </div>

    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR<br />
            * Debe cargar el token <br/> * Debe poner la palabra a buscar en la URL</div>
        </div>
        <div class=" mt-5 overflow-auto">
            <div class="size ">
                <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/notes_search_token.jpg"
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
            <span style="color:red;">"id"</span>: <span style="color:green;">2</span>,
            <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"angel"</span>,
            <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
            <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
            <span style="color:red;">"title"</span>: <span style="color:blue;">"consectetur voluptatibus et"</span>,
            <span style="color:red;">"content"</span>: <span style="color:blue;">"Rerum cum recusandae voluptatem fuga fugit aut. Suscipit aut voluptates distinctio omnis voluptatem nesciunt aperiam. Quo earum numquam fugit possimus eaque corporis delectus."</span>,
            <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg"</span>,
            <span style="color:red;">"comentarios 1"</span>: [
                {
                    <span style="color:red;">"usuario"</span>: <span style="color:blue;">"kevin"</span>,
                    <span style="color:red;">"user_id"</span>: <span style="color:green;">5</span>,
                    <span style="color:red;">"comentario"</span>: <span style="color:blue;">"Officia error quidem qui vel minima sunt nemo eum. Sed perferendis vel eum ut et quo doloribus nulla. Dignissimos sequi nemo sed."</span>
                }
            ],
            <span style="color:red;">"reacciones 2"</span>: [
                {
                    <span style="color:red;">"id"</span>: <span style="color:green;">14</span>,
                    <span style="color:red;">"usuario"</span>: <span style="color:blue;">"gabriel"</span>,
                    <span style="color:red;">"user_id"</span>: <span style="color:green;">2</span>,
                    <span style="color:red;">"reaction"</span>: <span style="color:blue;">"No me gusta"</span>,
                    <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">2</span>
                },
                {
                    <span style="color:red;">"id"</span>: <span style="color:green;">20</span>,
                    <span style="color:red;">"usuario"</span>: <span style="color:blue;">"angel"</span>,
                    <span style="color:red;">"user_id"</span>: <span style="color:green;">1</span>,
                    <span style="color:red;">"reaction"</span>: <span style="color:blue;">"Me gusta"</span>,
                    <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">1</span>
                }
            ],
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-11-12T20:17:25.000000Z"</span>,
            <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 23 horas"</span>,
            <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
        },
        {
            <span style="color:red;">"id"</span>: <span style="color:green;">7</span>,
            <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"gabriel"</span>,
            <span style="color:red;">"email"</span>: <span style="color:blue;">"catarinacci@gmail.com"</span>,
            <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/2"</span>,
            <span style="color:red;">"title"</span>: <span style="color:blue;">"qui et voluptatibus"</span>,
            <span style="color:red;">"content"</span>: <span style="color:blue;">"Repellat rem dolor dignissimos accusamus quo veritatis vero vel. Omnis quasi nisi consectetur quisquam nemo porro. Neque dignissimos non neque explicabo delectus."</span>,
            <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg"</span>,
            <span style="color:red;">"comentarios 1"</span>: [
                {
                    <span style="color:red;">"usuario"</span>: <span style="color:blue;">"ignacio daniel"</span>,
                    <span style="color:red;">"user_id"</span>: <span style="color:green;">3</span>,
                    <span style="color:red;">"comentario"</span>: <span style="color:blue;">"Hic a aut impedit rerum. Dolorum consequuntur quia nihil consequatur blanditiis omnis. Modi placeat numquam tempora facere."</span>
                }
            ],
            <span style="color:red;">"reacciones 1"</span>: [
                {
                    <span style="color:red;">"id"</span>: <span style="color:green;">18</span>,
                    <span style="color:red;">"usuario"</span>: <span style="color:blue;">"ignacio daniel"</span>,
                    <span style="color:red;">"user_id"</span>: <span style="color:green;">3</span>,
                    <span style="color:red;">"reaction"</span>: <span style="color:blue;">"No me gusta"</span>,
                    <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">2</span>
                }
            ],
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-11-12T20:17:25.000000Z"</span>,
            <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 23 horas"</span>,
            <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
        }
    ],
    <span style="color:red;">"links"</span>: {
        <span style="color:red;">"self"</span>: <span style="color:blue;">"link-value"</span>,
        <span style="color:red;">"first"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/search/voluptatibus?page=1"</span>,
        <span style="color:red;">"last"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/search/voluptatibus?page=1"</span>,
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
                <span style="color:red;">"url"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/search/voluptatibus?page=1"</span>,
                <span style="color:red;">"label"</span>: <span style="color:blue;">"1"</span>,
                <span style="color:red;">"active"</span>: <span style="color:blue;">true</span>
            },
            {
                <span style="color:red;">"url"</span>: <span style="color:blue;">null</span>,
                <span style="color:red;">"label"</span>: <span style="color:blue;">"Siguiente &raquo;"</span>,
                <span style="color:red;">"active"</span>: <span style="color:blue;">false</span>
            }
        ],
        <span style="color:red;">"path"</span>: <span style="color:blue;">"http://www.noteapi.ga/api/search/voluptatibus"</span>,
        <span style="color:red;">"per_page"</span>: <span style="color:green;">10</span>,
        <span style="color:red;">"to"</span>: <span style="color:green;">2</span>,
        <span style="color:red;">"total"</span>: <span style="color:green;">2</span>
    }
}
            </code>
        </pre>
            </div>
        </div>
    </div>

    <style>
        .size {
            height: 274.3px;
            width: 800px;
        }
    </style>
