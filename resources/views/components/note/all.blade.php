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
            <p class="ml-6">ALL_NOTES</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
       Permite al usuario Autenticado visualizar todas las publicaciones paginadas de 10 en 10 y ordenadas por fecha de actualización en forma descendente.<br>
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-green-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>GET</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/note</p>
        </div>
</div>

<div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR<br/><br/>* Debe cargar el token</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/select_enviar.jpg" alt="">
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
        <span style="color:red;">"id"</span>: <span style="color:green;">3</span>,
        <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"angel"</span>,
        <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
        <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
        <span style="color:red;">"title"</span>: <span style="color:blue;">"modi rerum est"</span>,
        <span style="color:red;">"content"</span>: <span style="color:blue;">"Mollitia blanditiis consequatur ab ut. Esse expedita eum totam at est repellat minima. Cum quo aut perferendis."</span>,
        <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/image_note_prueba.jpg"</span>,
        <span style="color:red;">"comentarios 1"</span>: [
            {
                <span style="color:red;">"usuario"</span>: <span style="color:blue;">"angel"</span>,
                <span style="color:red;">"user_id"</span>: <span style="color:green;">1</span>,
                <span style="color:red;">"comentario"</span>: <span style="color:blue;">"Illo qui earum recusandae. Rem cum dicta necessitatibus illum est. Quibusdam qui nihil expedita est ratione laborum."</span>
            }
        ],
        <span style="color:red;">"reacciones 2"</span>: [
            {
                <span style="color:red;">"id"</span>: <span style="color:green;">5</span>,
                <span style="color:red;">"usuario"</span>: <span style="color:blue;">"angel"</span>,
                <span style="color:red;">"user_id"</span>: <span style="color:green;">1</span>,
                <span style="color:red;">"reaction"</span>: <span style="color:blue;">"Me gusta"</span>,
                <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">1</span>
            },
            {
                <span style="color:red;">"id"</span>: <span style="color:green;">15</span>,
                <span style="color:red;">"usuario"</span>: <span style="color:blue;">"alberto"</span>,
                <span style="color:red;">"user_id"</span>: <span style="color:green;">4</span>,
                <span style="color:red;">"reaction"</span>: <span style="color:blue;">"Me gusta"</span>,
                <span style="color:red;">"typereaction_id"</span>: <span style="color:green;">1</span>
            }
        ],
        <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 1 hora"</span>,
        <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
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
