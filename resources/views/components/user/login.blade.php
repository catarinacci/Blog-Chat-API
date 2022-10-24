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
