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
            <p class="ml-6">LOGIN</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
        Permite al usuario acceder al sistema por medio de sus credenciales,
        el sistema le asigna un <code>user_authtoken</code> con un tiempo de expiración de 20 minutos
        y un <code>user_refreshtoken</code> con un tiempo de expiración de 120 minutos.<br/>
        También muestra el campo <code>email_verified_at</code> para ver si el usuario ha verificado su correo electrónico,
        si aún no lo ha realizado, el sistema no permitirá que utilice las demás funcionalidades.
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>POST</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/login</p>
        </div>
</div>
<div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/login_enviar.jpg" alt="">
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
    <span style="color:red;">"res"</span>: <span style="color:blue;">true</span>,
    <span style="color:red;">"email_verified_at"</span>: <span style="color:blue;">null</span>,
    <span style="color:red;">"user_authtoken"</span>: {
        <span style="color:red;">"accessToken"</span>: {
            <span style="color:red;">"name"</span>: <span style="color:blue;">"api"</span>,
            <span style="color:red;">"abilities"</span>: [
                <span style="color:blue;">"auth"</span>
            ],
            <span style="color:red;">"expired_at"</span>: <span style="color:blue;">"2022-10-28T17:12:27.000000Z"</span>,
            <span style="color:red;">"tokenable_id"</span>: <span style="color:green;">1</span>,
            <span style="color:red;">"tokenable_type"</span>: <span style="color:blue;">"App\\Models\\User"</span>,
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-10-28T16:52:27.000000Z"</span>,
            <span style="color:red;">"created_at"</span>: <span style="color:blue;">"2022-10-28T16:52:27.000000Z"</span>,
            <span style="color:red;">"id"</span>: <span style="color:green;">1</span>
        },
        <span style="color:red;">"plainTextToken"</span>: <span style="color:blue;">"9ABdQ0cf9fwNSwOLi1DnZhMm13Fvyygtb6EBel1A"</span>
    },
    <span style="color:red;">"user_refreshtoken"</span>: {
        <span style="color:red;">"accessToken"</span>: {
            <span style="color:red;">"name"</span>: <span style="color:blue;">"api"</span>,
            <span style="color:red;">"abilities"</span>: [
                <span style="color:blue;">"refresh"</span>
            ],
            <span style="color:red;">"expired_at"</span>: <span style="color:blue;">"2022-10-28T18:52:27.000000Z"</span>,
            <span style="color:red;">"tokenable_id"</span>: <span style="color:green;">1</span>,
            <span style="color:red;">"tokenable_type"</span>: <span style="color:blue;">"App\\Models\\User"</span>,
            <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-10-28T16:52:27.000000Z"</span>,
            <span style="color:red;">"created_at"</span>: <span style="color:blue;">"2022-10-28T16:52:27.000000Z"</span>,
            <span style="color:red;">"id"</span>: <span style="color:green;">2</span>
        },
        <span style="color:red;">"plainTextToken"</span>: <span style="color:blue;">"ydCS4ZUnzokgUaaQAaf22ncPeBSY83Zjlb4ieQN3"</span>
    }
}
                </code>
            </pre>
        </div>
    </div>

</div>

<style>
    .size {
        height: 271px;
        width: 800px;
        }
        .size_code {
        height: 350px;
        width: 800px;
        }

</style>
