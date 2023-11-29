<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">
        
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
        
                    <ul class="text-sm text-gray-600 mb-4">

                        <li class="leading-7 mb-1 border-l-4  border-transparent pl-2">
                            <a href="{{route('instructor.courses.index', $course)}}"><i class="fas fa-tasks text-blue-500 mr-2"></i>Lista de cursos</a>
                        </li>

                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit', $course)}}"><i class="fas fa-info-circle text-blue-500 mr-2"></i>Información del curso</a>
                        </li>
                        
                        <li class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum', $course)}}"><i class="fas fa-book text-blue-500 mr-2"></i>Lecciones del curso</a>
                        </li>
                        
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals', $course)}}"><i class="fas fa-flag-checkered text-blue-500 mr-2"></i>Metas del curso</a>
                        </li>
                        
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.students', $course)}}"><i class="fas fa-users text-blue-500 mr-2"></i>Estudiantes</a>
                        </li>
                    </ul>

                    @switch($course->status)
                        @case(1)
                            <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Solicitar revisión</button>
                            </form>
                            @break
                        @case(2)
                        <div class="card text-gray-500">
                            <div class="card-body">
                                Este curso se encuentra en revisión
                            </div>
                        </div>
                            @break
                        @case(3)
                            <div class="card text-gray-500">
                                <div class="card-body">
                                    Este curso se encuentra publicado
                                </div>
                            </div>
                            @break
                        @default
                            
                    @endswitch

        
                </aside>
        
                <div class="col-span-4 card">
                    <main class="card-body text-gray-600">
                        
                        {{$slot}}
        
                    </main>
                </div>
        
            </div>

        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset

    </body>
</html>
