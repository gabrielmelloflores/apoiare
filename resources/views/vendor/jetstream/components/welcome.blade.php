
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Ghostwind CSS : Tailwind Toolbox</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">

</head>
<body class="bg-gray-200 font-sans leading-normal tracking-normal">

<!--Header-->
<div class="w-full m-0 p-0 bg-cover bg-bottom" style="background-image:url('images/apoiare.png'); height: 50vh; max-height:460px;background-repeat: no-repeat; background-size: contain;margin-bottom: 50px;">
    <div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
        <!--Title-->
        {{-- <p class="text-black font-extrabold text-3xl md:text-5xl">
            Apoiare
        </p>
        <p class="text-xl md:text-2xl text-gray-500">Bem-vindo</p> --}}
    </div>
</div>

<!--Container-->
<div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">

    <div class="mx-0 sm:mx-6">

        <!--Nav-->
        <nav class="mt-0 w-full">
            <div class="container mx-auto flex items-center">

                <div class="flex w-1/2 pl-4 text-sm">
                    {{-- <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                        <li class="mr-2">
                            <a class="inline-block py-2 px-2 text-white no-underline hover:underline" href="post.html">POST</a>
                        </li>
                        <li class="mr-2">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-2" href="#">LINK</a>
                        </li>
                        <li class="mr-2">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-2" href="#">LINK</a>
                        </li>
                        <li class="mr-2">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-2" href="post_vue.html">POST_VUE</a>
                        </li>
                    </ul> --}}
                </div>


                 <div class="flex w-1/2 justify-end content-center">
                     <a class="inline-block text-gray-500 no-underline hover:text-white hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 avatar" data-tippy-content="@twitter_handle" href="https://twitter.com/intent/tweet?url=#">
                        <svg class="fill-current h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M30.063 7.313c-.813 1.125-1.75 2.125-2.875 2.938v.75c0 1.563-.188 3.125-.688 4.625a15.088 15.088 0 0 1-2.063 4.438c-.875 1.438-2 2.688-3.25 3.813a15.015 15.015 0 0 1-4.625 2.563c-1.813.688-3.75 1-5.75 1-3.25 0-6.188-.875-8.875-2.625.438.063.875.125 1.375.125 2.688 0 5.063-.875 7.188-2.5-1.25 0-2.375-.375-3.375-1.125s-1.688-1.688-2.063-2.875c.438.063.813.125 1.125.125.5 0 1-.063 1.5-.25-1.313-.25-2.438-.938-3.313-1.938a5.673 5.673 0 0 1-1.313-3.688v-.063c.813.438 1.688.688 2.625.688a5.228 5.228 0 0 1-1.875-2c-.5-.875-.688-1.813-.688-2.75 0-1.063.25-2.063.75-2.938 1.438 1.75 3.188 3.188 5.25 4.25s4.313 1.688 6.688 1.813a5.579 5.579 0 0 1 1.5-5.438c1.125-1.125 2.5-1.688 4.125-1.688s3.063.625 4.188 1.813a11.48 11.48 0 0 0 3.688-1.375c-.438 1.375-1.313 2.438-2.563 3.188 1.125-.125 2.188-.438 3.313-.875z"></path></svg>
                    </a>
                </div> 

            </div>
        </nav>

        <div class="w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t">

            <!--Lead Card-->
            <div class="flex h-full rounded overflow-hidden shadow-lg">
                    <div class="w-full md:w-1/3 flex flex-col flex-grow flex-shrink">
                        <div class="flex-1 rounded-t rounded-b-none overflow-hidden shadow-lg bg-transparent">
                            <div class="w-full font-bold text-xl text-gray-900 px-6 mb-5">👋 Bem-Vindas
                            </div>
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                Nos chamamos Apoiare Puerpério, somos um site cujo objetivo é atuarmos como rede de apoio para você e sua família!
                            </p>
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                Que essa experiência seja desafiadora e cheia de descobertas!
                            </p>
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                Você não está sozinha!
                            </p>
                        </div>

                        </div>
                    </div>
            </div>
            <!--/Lead Card-->


            <!--Posts Container-->
            <div class="flex flex-wrap justify-between pt-12 mx-6">
                @foreach($posts as $post)
                    <x-post-card-welcome :post="$post"></x-post-card-welcome>
                @endforeach
            </div>
{{--            <!--/ Post Content-->--}}

        </div>

        <!--Author-->
        <div class="flex w-full items-center font-sans p-8 md:p-24">
            <div class="flex-1">
                <p class="text-base font-bold text-base md:text-xl leading-none">SOBRE O PROJETO</p>
                <p class="text-gray-600 text-xs md:text-base">O Projeto Apoiare Puerpério surgiu como produto tecnológico da estudante Betina Pereira Horba, orientada pela professora Josiane Lieberknecht Wathier Abaid, vinculado ao Mestrado em Saúde Materno Infantil e apoiado pelo Laboratório Avançado de Produtos do Mestrado em Saúde Materno Infantil. Tem como objetivo auxiliar às mães na orientação nos períodos de pós parto, favorecendo um melhor relacionamento entra a mãe e o recém-nascido.</p>
            </div>
            <div class="justify-end">
                <button class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Todas publicações</button>
            </div>
        </div>
        <!--/Author-->

    </div>


</div>


<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@4"></script>
<script>
    //Init tooltips
    tippy('.avatar')
</script>
</body>
</html>
