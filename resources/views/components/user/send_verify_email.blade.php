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
            <p class="ml-6">SEND VERIFY EMAIL</p>
        </div>
    </div>

    <div class="mt-6 mb-6 leading-7 text-gray-800">
        A veces, un usuario puede perder o eliminar accidentalmente el correo
        electrónico de verificación de la dirección de correo electrónico.
        Para adaptarse a esto, es posible definir una ruta para
        permitir que el usuario solicite que se vuelva a enviar
        el correo electrónico de verificación.<br />
        NOTA: El usuario debe tener el <code>user_authtoken</code> que se asigna
        al momento de Autenticarse o Regitrarse.
    </div>
    <div class=" flex mb-6 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
        <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
            <span>POST</span>
        </div>
        <div>
            <p class=" ml-6 text-lg ">www.noteapi.ga/api/send-verify-email</p>
        </div>
    </div>
    <div class="p-6 sm:px-6 lg:px-12  bg-indigo-200 border-b border-gray-400 ">
        <div class="flex items-center overflow-auto">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">

                ENVIAR:<br />
                * Primero en la pestaña <code>Authorization</code>, selccionar la opción <code>Bearer Token</code> y
                cargar el <code>user_authtoken</code> asignado al momento de Registrarse o Autenticarse.<br />
            </div>
        </div>
        <div class=" mt-5 overflow-auto">
            <div class="size">
                <img src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/send_verify_email_enviar.jpg"
                    alt="">
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
    <span style="color:red;">"status"</span>: <span style="color:blue;">"verification-link-sent"</span>
}
                    </code>
                </pre>
            </div>
        </div>

    </div>
    <style>
        .size {
            height: 270px;
            width: 800px;
        }
        .size_code{
            height: 100;
            width: 800px
        }
    </style>
