<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <title>MPIDATA</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body> 
         <!--Primera mitad-->
        <div class="flex">
            <div class="fondo bg-fixed w-1/2 min-h-screen ">
                <div class="bg-fixed bg-black bg-opacity-75 min-h-screen">
                    <div class="flex justify-end ">
                        <div class="pt-10 md:pt-32"><img class="w-24 h-auto ml-4 mt-4 md:w-48 h-auto" src="img/logob.png" >
                        </div>
                        <div class="pt-8 md:pt-24 ">
                            <h1>pi</h1>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <div class="pl-1 text-white py-8 md:pt-2 md:pr-8 text-xl"><p>Administra tus datos de forma fácil y segura</p></div>
                    </div>
                   
                </div>
            </div>
            
            
            <!--Segunda mitad-->
            <div class=" w-1/2 bg-white">
                <div class=" w-1/3 flex justify-star">
                    <div class="text-teal-400 py-8 md:pt-24"><h1>data</h1></div>
                </div>
                <div class="px-4">
                    
                    <br>
                    <div class="text-xl w-full border-solid border-2 border-teal-500 md:px-4 bg-teal-400 md:w-1/3 md:rounded-full text-2xl"> <p><a href="{{ route('login') }}">iniciar sesión</a></p></div>
                </div>
            </div>
        
        
        </div>
    </body>
</html>
