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
            <p class="ml-6">REGISTER</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
        Crea un nuevo usuario con los siguientes campos:<br>
        Name: puede ser nulo<br>
        Surname: puede ser nulo<br>
        Nickname: puede ser nulo<br>
        Email: obligatorio<br>
        Password: obligatorio<br>
        Password_confirmation: obligatorio<br/>
        Image: puede ser nulo, si es así carga una imagen de perfil por defecto.<br>
        También envía un correo electrónico con un código de 6 dígitos para realizar la verificación de su cuenta de
        correo.

    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>POST</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/register</p>
        </div>
</div>

<div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/register_enviar.jpg" alt="">
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
    <span style="color:red;">"user"</span>: {
        <span style="color:red;">"name"</span>: <span style="color:blue;">"Gabriel"</span>,
        <span style="color:red;">"surname"</span>: <span style="color:blue;">"Catarinacci"</span>,
        <span style="color:red;">"nickname"</span>: <span style="color:blue;">"Gabi"</span>,
        <span style="color:red;">"email"</span>: <span style="color:blue;">"systemredsys@gmail.com"</span>,
        <span style="color:red;">"image_profile_path"</span>: <span style="color:blue;">"https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/yXnKnqUfRkRaXV2M9dMvZ4UdgxvSS16RxdoNNaRK.jpg"</span>,
        <span style="color:red;">"email_verified_at"</span>: <span style="color:blue;">null</span>,
        <span style="color:red;">"updated_at"</span>: <span style="color:blue;">"2022-10-23T16:36:12.000000Z"</span>,
        <span style="color:red;">"created_at"</span>: <span style="color:blue;">"2022-10-23T16:36:12.000000Z"</span>,
        <span style="color:red;">"id"</span>: <span style="color:green;">1</span>
    },
    <span style="color:red;">"res"</span>: <span style="color:blue;">true</span>,
    <span style="color:red;">"msg"</span>: <span style="color:blue;">"Usuario registrado correctamente"</span>,
    <span style="color:red;">"email verification"</span>: <span style="color:blue;">"Se envió un email con un código de verificación"</span>
}
            </code>
        </pre>
        </div>
    </div>

</div>

<div class="p-6 sm:px-10 sm:rounded-b-lg bg-indigo-200 border-b border-gray-300 ">
    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">EMAIL</div>
    </div>
    <div class=" mt-5 overflow-auto bg-slate-100">
        <div class="size">
            <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/register_email_verify.jpg" alt="">
        </div>
    </div>
</div>

<style>
    .size {
        height: 314px;
        width: 800px;
        }
</style>
