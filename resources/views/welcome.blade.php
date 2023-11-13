<x-app-layout>

    <section class="bg-cover" style="background-image: url({{asset('img/home/people-2557396_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Domina la tecnología web con Coders Free</h1>
                <p class="text-white text-lg mt-2 mb-4">En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollo web</p>
                
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Search">

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                    
                </div>

            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">Contenido</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/snail-8195174_640.jpg')}}" alt="">

                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                    </header>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem ut suscipit ipsa rem, tenetur exercitationem magni molestias .
                    </p>

                </figure>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/leaves-8336237_640.jpg')}}" alt="">

                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Manual de Laravel</h1>
                    </header>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem ut suscipit ipsa rem, tenetur exercitationem magni molestias .
                    </p>

                </figure>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/thailand-8299045_640.jpg')}}" alt="">

                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Blog</h1>
                    </header>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem ut suscipit ipsa rem, tenetur exercitationem magni molestias .
                    </p>

                </figure>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/forest-8355748_640.jpg')}}" alt="">

                    <header class="mt-2">
                        <h1 class="text-center text-xl text-gray-700">Desarrollo web</h1>
                    </header>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem ut suscipit ipsa rem, tenetur exercitationem magni molestias .
                    </p>

                </figure>
            </article>
        </div>

    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>
        
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catalogo de cursos
            </a>
        </div>

    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para seguir subiendo cursos</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <article class="bd-white shadow-lg rounded overflow-hidden">
                    {{-- {{$course->image->url}} --}}
                    {{-- {{ $course->image ? Storage::url($course->image->url) : 'https://imagen_prueba.com' }} --}}
                    {{-- {{ Storage::url($course->image->url) }} --}}
                    {{-- <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt=""> --}}
                    <div class="px-6 py-4">
                        <h1 class="text-xl textgray-700 mb-2 leading-6">{{ Str::limit($course->title,40) }}</h1>
                        {{-- <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teache->name }}</p> --}}

                        <div class="flex">
                            <ul class="flex text-sm">
                                <li class="mr-1">
                                    <i class="fas fa-star {{$course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                </li>
                                <li class="mr-1">
                                    <i class="fas fa-star {{$course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                </li>
                                <li class="mr-1">
                                    <i class="fas fa-star {{$course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                </li>
                                <li class="mr-1">
                                    <i class="fas fa-star {{$course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                </li>
                                <li class="mr-1">
                                    <i class="fas fa-star {{$course->rating == 5 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                </li>
                            </ul>

                            <p class="text-sm text-gray-500 ml-auto">
                                <i class="fas fa-users"></i>
                                ({{$course->students_count}})
                            </p>
                            
                        </div>
                        
                        <a href="{{route('course.show', $course)}}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Más información
                        </a>

                    </div>
                </article>
            @endforeach

        </div>

    </section>

</x-app-layout>