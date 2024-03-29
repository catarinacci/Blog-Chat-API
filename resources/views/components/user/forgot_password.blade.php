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
            <p class="ml-6">FORGOT PASSWORD</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
        Permite al usuario reestablecer su contraseña.<br/>
        * Primero se envía un email con un código de 6 dìgitos para reestablecer su contraseña.<br/>
        * Luego se debe ingresar el código de 6 dìgitos, su dirección de correo y la nueva contraceña.

    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>POST</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/forgot-password</p>
        </div>
    </div>

    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR</div>
        </div>
        <div class=" mt-5 overflow-auto">
            <div class="size ">
                <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/forgot_passsword_enviar.jpg" alt="">
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
    <span style="color:red;">"succes"</span>: <span style="color:blue;">true</span>,
    <span style="color:red;">"messaje"</span>: <span style="color:blue;">" Please check your email for a 6 digit pin"</span>
}
                    </code>
                </pre>
            </div>
        </div>
    </div>
    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">EMAIL</div>
        </div>
        <div class=" mt-5 overflow-auto">
            <div class="size ">
                <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/forgot_password_email.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="mt-6 mb-6 text-xl lg:grid grid-cols-2 gap-2 items-center  ">
        <div class="  bg-indigo-400 rounded-lg ">
            <p class="ml-6">PASSWORD RESET</p>
        </div>
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>POST</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/reset-password</p>
        </div>
    </div>

    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR</div>
        </div>
        <div class=" mt-5 overflow-auto">
            <div class="size_reset ">
                <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/reset_password_enviar.jpg" alt="">
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
    <span style="color:red;">"succes"</span>: <span style="color:blue;">true</span>,
    <span style="color:red;">"messaje"</span>: <span style="color:blue;">" Updated password "</span>
}
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>
    <style>
        .size {
            height: 271px;
            width: 800px;
            }
            .size_reset {
            height: 275px;
            width: 800px;
            }
            .size_code {
            height: 100px;
            width: 800px;
            }

    </style>
