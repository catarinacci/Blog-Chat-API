<div class="p-6 sm:px-6 lg:px-12 sm:rounded-t-lg bg-white border-b border-gray-200">
    <div class="flex text-opacity-25 items-center justify-center text-2xl bg-green-200 shadow-xl rounded-lg">
        <div class="text-gray-900 mr-4 ml-4  ">
            <i class="bi bi-chat-left-dots-fill"></i>
        </div>
        <div class=" font-bold  ">
            COMMENT
        </div>
    </div>

    <div class="mt-6 text-xl lg:grid grid-cols-2 gap-2 items-center  ">
        <div class="  bg-indigo-400 rounded-lg ">
            <p class="ml-6">DELETE</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
       Permite al usuario Autenticado bloquear uno de sus comentarios.<br>
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-red-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>DELETE</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/comment/{id_comment}</p>
        </div>
</div>

<div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR<br/>* Debe cargar el token<br/>* Debe colocar el id del comentario en la URL</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/comment_delete_token.jpg" alt="">
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
        <span style="color:red;">"id"</span>: <span style="color:green;">21</span>,
        <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
        <span style="color:red;">"name"</span>: <span style="color:blue;">"angel"</span>,
        <span style="color:red;">"content"</span>: <span style="color:blue;">"Comentario nota 20"</span>,
        <span style="color:red;">"note_id"</span>: <span style="color:blue;">"/api/note/20"</span>,
        <span style="color:red;">"comentario creado "</span>: <span style="color:blue;">"Hace 0 segundos"</span>
    }
}
            </code>
        </pre>
        </div>
    </div>
</div>

<style>
    .size {
        height: 310px;
        width: 800px;
        }
</style>
