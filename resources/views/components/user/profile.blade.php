<div class="p-6 sm:px-6 lg:px-12 sm:rounded-t-lg bg-white border-b border-gray-200">
    <div class="flex text-opacity-25 items-center justify-center text-2xl bg-green-200 shadow-xl rounded-lg">
        <div class="text-gray-900 mr-4 ml-4  ">
            <i class=" bi-person-fill"></i>
        </div>
        <div class=" font-bold  ">
            USER
        </div>
    </div>

    <div class="mt-6 text-xl lg:grid grid-cols-2 gap-2 items-center  ">
        <div class="  bg-indigo-400 rounded-lg ">
            <p class="ml-6">PROFILE</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
        Permite ver los datos del usuario Autenticado, pasando por la URL el id de usuario.
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-green-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>GET</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/user/{id_user}</p>
        </div>
    </div>

    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR <br/> * Debe cargar el token.  </div>
        </div>
        <div class=" mt-5 overflow-auto">
            <div class="size ">
                <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/profile_enviar.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">RESPUESTA</div>
        </div>
        <div class=" mt-5 overflow-auto bg-slate-100">
            <div class="size_code">
                <pre>
                     <code data-lang="php" >
{
    <span style="color:red;">"data"</span>: {
        <span style="color:red;">"user"</span>: {
            <span style="color:red;">"id"</span>: <span style="color:green;">1</span>,
            <span style="color:red;">"name"</span>: <span style="color:blue;">"GABRIEL"</span>,
            <span style="color:red;">"surname"</span>: <span style="color:blue;">"CATARINACCI"</span>,
            <span style="color:red;">"nick_name"</span>: <span style="color:blue;">"Gabi"</span>,
            <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
            <span style="color:red;">"email_verified_at"</span>: <span style="color:blue;">"2022-11-03T15:42:55.000000Z"</span>,
            <span style="color:red;">"image_profile_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/kuDb7ebUh3az6nm1hnwpe0ZcQfwPqG5a1QJSfRxC.jpg"</span>,
            <span style="color:red;">"created_at"</span>: <span style="color:blue;">"2022-11-03"</span>,
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-11-03"</span>
        }
    },
    <span style="color:red;">"res"</span>: <span style="color:green;">true</span>
}
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>
<style>
    .size {
        height: 263px;
        width: 800px;
        }
        .size_code {
        height: 270px;
        width: 800px;
        }

</style>
