@props(['course'])

<article class="bd-white shadow-lg rounded overflow-hidden">
    {{-- {{$course->image->url}} --}}
    {{ $course->image ? Storage::url($course->image->url) : 'https://imagen_prueba.com' }}
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
        
        <a href="{{route('courses.show', $course)}}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Más información
        </a>

    </div>
</article>