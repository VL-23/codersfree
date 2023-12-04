@props(['course'])

<article class="flex flex-col card">

    @isset($course->image)
        <img class="object-cover w-full h-36" src="{{ Storage::url($course->image->url) }} " alt="">
    @else
        <img class="object-cover w-full h-36" src="https://static.fundacion-affinity.org/cdn/farfuture/PVbbIC-0M9y4fPbbCsdvAD8bcjjtbFc0NSP3lRwlWcE/mtime:1643275542/sites/default/files/los-10-sonidos-principales-del-perro.jpg " alt="">
    @endisset

    <div class="flex flex-col flex-1 card-body">
        <h1 class="card-title">{{ Str::limit($course->title,40) }}</h1>
        <p class="mt-auto mb-2 text-sm text-gray-500">Prof: {{ $course->teacher->name }}</p>

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

            <p class="ml-auto text-sm text-gray-500">
                <i class="fas fa-users"></i>
                ({{$course->students_count}})
            </p>
            
        </div>

        @if ($course->price->value == 0)
            <p class="my-2 text-sm font-bold text-green-800 ">
                GRATIS
            </p>
        @else
            <p class="my-2 text-sm font-bold text-gray-500 ">
                US$ {{ $course->price->value }}
            </p>
        @endif
        
        <a href="{{route('courses.show', $course)}}" class="btn btn-primary btn-block">
            Más información
        </a>

    </div>
</article>