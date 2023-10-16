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
            <p class="ml-6">UPDATE</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
       Permite al usuario Autenticado atualizar una de sus publicaciones.<br>
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>POST</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/note/{id_note}</p>
        </div>
</div>

<div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR<br/>* Debe colocar el id de la nota en la url<br/> * Debe cargar el token</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/note_update_token.jpg" alt="">
        </div>
    </div>
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><br/>* Completar el formulario</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/note_update_enviar.jpg" alt="">
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
    <span style="color:red;">"data"</span>: {
        <span style="color:red;">"id"</span>: <span style="color:green;">5</span>,
        <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"angel"</span>,
        <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
        <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
        <span style="color:red;">"title"</span>: <span style="color:blue;">"Título modificado"</span>,
        <span style="color:red;">"content"</span>: <span style="color:blue;">"\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\""</span>,
        <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/6pyRu3djacUrQ5qeiyINackQm6yH3SlPA5x0me0t.jpg"</span>,
        <span style="color:red;">"comentarios 2"</span>: [
            {
                <span style="color:red;">"usuario"</span>: <span style="color:blue;">"kevin"</span>,
                <span style="color:red;">"user_id"</span>: <span style="color:green;">5</span>,
                <span style="color:red;">"comentario"</span>: <span style="color:blue;">"Veniam facilis non et aut suscipit dolorem. Corporis autem sed totam facilis. Molestiae error veritatis minus error est blanditiis."</span>
            },
            {
                <span style="color:red;">"usuario"</span>: <span style="color:blue;">"gabriel"</span>,
                <span style="color:red;">"user_id"</span>: <span style="color:green;">2</span>,
                <span style="color:red;">"comentario"</span>: <span style="color:blue;">"Id voluptatum eius laboriosam omnis soluta velit. Debitis laborum quia natus possimus. Ullam voluptatem fugiat maiores rerum. Corrupti sapiente modi labore eos."</span>
            }
        ],
        <span style="color:red;">"reacciones 2"</span>: [
            {
                <span style="color:red;">"id"</span>: <span style="color:green;">2</span>,
                <span style="color:red;">"usuario"</span>: <span style="color:blue;">"kevin"</span>,
                <span style="color:red;">"user_id"</span>: <span style="color:green;">5</span>,
                <span style="color:red;">"reaction"</span>: <span style="color:blue;">"Me divierte"</span>,
                <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">3</span>
            },
            {
                <span style="color:red;">"id"</span>: <span style="color:green;">12</span>,
                <span style="color:red;">"usuario"</span>: <span style="color:blue;">"kevin"</span>,
                <span style="color:red;">"user_id"</span>: <span style="color:green;">5</span>,
                <span style="color:red;">"reaction"</span>: <span style="color:blue;">"No me gusta"</span>,
                <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">2</span>
            }
        ],
        <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 6 días"</span>,
        <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
    },
    <span style="color:red;">"res"</span>: <span style="color:blue;">true</span>,
    <span style="color:red;">"msj"</span>: <span style="color:blue;">"updated note"</span>
}
            </code>
        </pre>
        </div>
    </div>
</div>

<style>
    .size {
        height: 282.3px;
        width: 800px;
        }
</style>
