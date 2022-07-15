<div>
    <nav class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-80 overflow-y-auto text-center bg-gray-900">
       <div class="text-gray-100 text-2xl">
            <div class="p-2  flex items-center justify-between">
                {{-- <i class="bi bi-app-indicator px-2 py-1 bg-blue-600 rounded"></i> --}}
               <img class="w-12 h-12" src="https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/Free_Sample_By_Wix(6)logo.jpg" alt="">
                <p class="font-extrabold text-green-400 -ml-5 ">MENU</p>
                <i class="bi bi-x-circle  cursor-pointer mr-2" onclick=" Openbar()"></i>
            </div>
            <hr class="my-1 text-gray-600">
       </div>
       <script>
           function Openbar(){
               document.querySelector('.sidebar').classtoggle('left-[-300px]')
           }
       </script>
    </nav>
</div>
