<x-app-layout>

    <section class="py-12 mb-12 bg-gray-700">
        <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure>
                @isset($course->image)
                    <img class="object-cover w-full h-60" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                    <img class="object-cover w-full h-60" src="https://static.fundacion-affinity.org/cdn/farfuture/PVbbIC-0M9y4fPbbCsdvAD8bcjjtbFc0NSP3lRwlWcE/mtime:1643275542/sites/default/files/los-10-sonidos-principales-del-perro.jpg" alt="">
                @endisset
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="mb-3 text-xl">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class="fas "></i>Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Matriculados: {{$course->students_count}}</p>
                <p class="mb-2"><i class="far fa-star"></i>Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="mb-12 card">
                <div class="card-body">
                    <h1 class="mb-2 text-2xl font-bold">Lo que aprenderás</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-base text-gray-700"><i class="mr-2 text-gray-600 fas fa-check"></i>{{$goal->name}}</li>
                        @endforeach
                    </ul>

                </div>
            </section>

            <section class="mb-12">
                <h1 class="mb-2 text-3xl font-bold">Temario</h1>

                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" 
                    @if ($loop->first)
                        x-data="{open:true}"
                    @else
                        x-data="{open:false}"
                    @endif>
                        <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer" x-on:click="open = !open">
                            <h1 class="text-lg font-bold text-gray-600">{{$section->name}}</h1>
                        </header>

                        <div class="px-4 py-2 bd-white" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                 @foreach ($section->lessons as $lesson)
                                    <li class="text-base text-gray-700"><i class="mr-2 text-gray-600 fas fa-play-circle"></i>{{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>

                    </article>
                @endforeach

            </section>

            <section class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-base text-gray-700">{{$requirement->name}}</li>
                    @endforeach
                </ul>

            </section>

            <section class="">
                <h1 class="text-3xl font-bold text-gray-800">Descripción</h1>

                <div class="text-base text-gray-700">
                    {!!$course->description!!}
                </div>

            </section>

            @if ($course->reviews->count() > 0)
                @livewire('courses-reviews', ['course' => $course])
            @endif


        </div>

        <div class="order-1 lg:order-2">
            <section class="mb-4 card">
                <div class="card-body">

                    <div class="flex items-center">
                        
                        <img class="object-cover w-12 h-12 rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        
                        <div class="ml-4">
                            <h1 class="text-lg text-gray-500 font-fold">Prof: {{$course->teacher->name}}</h1>
                            <a class="text-sm font-bold text-blue-400" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>

                    </div>

                    @can('enrolled', $course)

                        <a class="mt-4 btn btn-danger btn-block" href="{{ route('courses.status', $course) }}">Continuar con el curso</a>
                    
                    @else

                        @if ($course->price->value == 0)
                            <p class="mt-3 mb-2 text-2xl font-bold text-gray-500">GRATIS</p>
                            <form action="{{route('courses.enrolled', $course)}}" method="post">
                                @csrf
                                <button class="btn btn-danger btn-block">Llevar este curso</button>
                            </form>
                        @else
                            <p class="mt-3 mb-2 text-2xl font-bold text-gray-500">US$ {{ $course->price->value }}</p>
                            <a href="{{ route('payment.checkout', $course) }}" class="btn btn-danger btn-block">Comprar este curso</a>
                        @endif
                    

                    @endcan


                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        @isset($similar->image)
                            <img class="object-cover w-40 h-32" src="{{Storage::url($similar->image->url)}}" alt="">
                        @else
                            <img class="object-cover w-40 h-32" src="https://static.fundacion-affinity.org/cdn/farfuture/PVbbIC-0M9y4fPbbCsdvAD8bcjjtbFc0NSP3lRwlWcE/mtime:1643275542/sites/default/files/los-10-sonidos-principales-del-perro.jpg" alt="">
                        @endisset

                        <div class="ml-3">
                            <h1>
                                <a class="mb-3 font-bold text-gray-500" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title,40)}}</a>
                            </h1>

                            <div class="flex items-center mb-2">
                                <img class="object-cover w-8 h-8 rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                                <p class="ml-2 text-sm text-gray-700">{{$similar->teacher->name}}</p>
                            </div>

                            <div class="flex items-center justify-between">
                                <p class="text-sm"><i class="mr-2 text-yellow-400 fas fa-star"></i>{{$similar->rating}}</p>

                                @if ($course->price->value == 0)
                                    <p class="mt-3 mb-2 text-sm font-bold text-gray-500">GRATIS</p>
                                @else
                                    <p class="mt-3 mb-2 text-sm font-bold text-gray-500">US$ {{ $course->price->value }}</p>
                                @endif
                            </div>

                        </div>

                    </article>
                @endforeach
            </aside>

        </div>
    </div>

</x-app-layout>