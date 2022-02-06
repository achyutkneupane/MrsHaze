<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Error || Mrs. Haze</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class='w-screen h-screen bodyView'>
        <div class='w-full h-full bg-center bg-no-repeat bg-cover lg:bg-left lg:bg-contain bgImage'>
            <div class="flex justify-end w-full h-full bgOpacityTurquise lg:bgTurquise">
                <div class='flex flex-col items-center justify-center w-full gap-8 px-4 text-black xl:w-1/2 lg:w-2/5 xl:mx-16 lg:mx-2'>
                    <h1 class='font-bold text-center text-8xl lg:text-9xl'>
                        404
                    </h1>
                    <h4 class='text-4xl'>
                        Page Not Found
                    </h4>
                    <div class='text-2xl'>
                        <a href='/' class='p-4 text-black bg-white rounded-xl'>
                            Go To Home Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



<style>
    .bgImage {
        background-image: url("{{ asset('assets/Subani-Moktan-mrshaze.webp') }}")
    }
</style>