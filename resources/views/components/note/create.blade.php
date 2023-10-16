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
            <p class="ml-6">CREATE</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
       Permite al usuario Autenticado crear una publicación.<br>
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>POST</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/note</p>
        </div>
</div>

<div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR<br/>* Debe cargar el token</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/note_create_token.jpg" alt="">
        </div>
    </div>
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><br/>* Completar el formulario</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/note_create_enviar.jpg" alt="">
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
    <span style="color:red;">"nota"</span>: {
        <span style="color:red;">"id"</span>: <span style="color:green;">21</span>,
        <span style="color:red;">"creador de la nota"</span>: <span style="color:blue;">"angel"</span>,
        <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
        <span style="color:red;">"user_id"</span>: <span style="color:blue;">"/api/user/1"</span>,
        <span style="color:red;">"title"</span>: <span style="color:blue;">"Nota de prueba"</span>,
        <span style="color:red;">"content"</span>: <span style="color:blue;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tincidunt venenatis lobortis. Nunc ut odio ac diam pretium aliquam et id quam. Curabitur nisi ante, finibus non nisl id, porttitor suscipit justo. Praesent eu faucibus arcu. Mauris bibendum eu risus vitae mattis. Integer ipsum ligula, interdum a imperdiet sit amet, malesuada non sem. Nulla felis est, hendrerit sit amet imperdiet ac, auctor ut nisl."</span>,
        <span style="color:red;">"image_note_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/9OyNMkFJuS88RsGx5qrEPnKlYLqffRY7fo0DS7qm.jpg"</span>,
        <span style="color:red;">"comentarios 0"</span>: <span style="color:blue;">"No tiene comentarios"</span>,
        <span style="color:red;">"reacciones 0"</span>: <span style="color:blue;">"No tiene reacciones"</span>,
        <span style="color:red;">"nota creada "</span>: <span style="color:blue;">"Hace 0 segundos"</span>,
        <span style="color:red;">"status"</span>: <span style="color:blue;">"ACTIVE"</span>
    },
    <span style="color:red;">"res"</span>: <span style="color:blue;">true</span>,
    <span style="color:red;">"msg"</span>: <span style="color:blue;">"Nota Creada Correctamente"</span>
}
            </code>
        </pre>
        </div>
    </div>
</div>

<style>
    .size {
        height: 281px;
        width: 800px;
        }
</style>
