<div class="p-6 sm:px-20 sm:rounded-t-lg bg-white border-b border-gray-200">
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
        <div class=" flex mt-2 lg:mt-0 overflow-auto items-center bg-blue-100 rounded-lg ">
            <div class="bg-blue-700 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                {{-- <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg> --}}
                <span>POST</span>
            </div>
            <div>
                <p class=" ml-6 text-lg ">www.noteapi.ga/api/register</p>
            </div>

        </div>
    </div>

    <div class="mt-6 leading-7 text-gray-800">
        Crea un nuevo usuario con los siguientes campos:<br>
        Name: puede ser nulo<br>
        Surname: puede ser nulo<br>
        Nickname: puede ser nulo<br>
        Email: obligatorio<br>
        Password: obligatorio<br>
        Image: puede ser nulo, si es así carga una imagen de perfil por defecto.<br>
        También envía un correo electrónico con un código de 4 dígitos para realizar la verificación de su cuenta de
        correo.

    </div>
</div>
<div class="p-6 sm:px-20  bg-indigo-200 border-b border-gray-400 ">

    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">ENVIAR</div>
    </div>
    <div class=" mt-5 overflow-auto">
        <div class="size ">
            <img class=""
                src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/register_enviar.jpg"
                alt="">
        </div>
    </div>

</div>
<div class="p-6 sm:px-20 sm:rounded-b-lg bg-indigo-200 border-b border-gray-300 ">

    <div class="flex items-center">
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">RESPUESTA</div>
    </div>
    <div class=" mt-5 overflow-auto">
        {{-- <pre class="size bg-red-400">
            adwds
            dsasdasd
            adsd
        </pre> --}}
        <div class="relative code-block-wrapper bg-black ">
            <pre>
            <code data-theme="olaolu-palenight" data-lang="php" class="torchlight" style="background-color: #292D3E; --theme-selection-background: #7580B850;" id="clipText-14"><!-- Syntax highlighted by torchlight.dev -->
                <div class="line"><span style="color: #C792EA;">use</span><span style="color: #BFC7D5;"> Illuminate\Database\Schema\</span><span style="color: #FFCB8B;">Blueprint</span><span style="color: #BFC7D5;">;</span></div><div class="line"><span style="color: #C792EA;">use</span><span style="color: #BFC7D5;"> Illuminate\Support\Facades\</span><span style="color: #FFCB8B;">Schema</span><span style="color: #BFC7D5;">;</span></div><div class="line">&nbsp;</div><div class="line"><span style="color: #FFCB8B;">Schema</span><span style="color: #89DDFF;">::</span><span style="color: #82AAFF;">create</span><span style="color: #BFC7D5;">(</span><span style="color: #D9F5DD;">'</span><span style="color: #C3E88D;">users</span><span style="color: #D9F5DD;">'</span><span style="color: #BFC7D5;">, </span><span style="color: #C792EA;">function</span><span style="color: #BFC7D5;"> </span><span style="color: #D9F5DD;">(</span><span style="color: #FFCB8B;">Blueprint</span><span style="color: #BFC7D5;"> </span><span style="color: #BEC5D4;">$table</span><span style="color: #D9F5DD;">)</span><span style="color: #BFC7D5;"> {</span></div><div class="line"><span style="color: #BFC7D5;">    </span><span style="color: #BEC5D4;">$table</span><span style="color: #89DDFF;">-&gt;</span><span style="color: #82AAFF;">id</span><span style="color: #BFC7D5;">();</span></div><div class="line"><span style="color: #BFC7D5;">    </span><span style="color: #BEC5D4;">$table</span><span style="color: #89DDFF;">-&gt;</span><span style="color: #82AAFF;">string</span><span style="color: #BFC7D5;">(</span><span style="color: #D9F5DD;">'</span><span style="color: #C3E88D;">name</span><span style="color: #D9F5DD;">'</span><span style="color: #BFC7D5;">);</span></div><div class="line"><span style="color: #BFC7D5;">    </span><span style="color: #BEC5D4;">$table</span><span style="color: #89DDFF;">-&gt;</span><span style="color: #82AAFF;">string</span><span style="color: #BFC7D5;">(</span><span style="color: #D9F5DD;">'</span><span style="color: #C3E88D;">email</span><span style="color: #D9F5DD;">'</span><span style="color: #BFC7D5;">);</span></div><div class="line"><span style="color: #BFC7D5;">    </span><span style="color: #BEC5D4;">$table</span><span style="color: #89DDFF;">-&gt;</span><span style="color: #82AAFF;">timestamps</span><span style="color: #BFC7D5;">();</span></div><div class="line"><span style="color: #BFC7D5;">});</span></div>
            </code>
            </pre>
        </div>
    </div>

</div>
<style>
    .size {
        height: 314px;
        width: 800px;
</style>
