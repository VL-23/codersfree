@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{ $course->image ? Storage::url($course->image->url) : 'https://static.fundacion-affinity.org/cdn/farfuture/PVbbIC-0M9y4fPbbCsdvAD8bcjjtbFc0NSP3lRwlWcE/mtime:1643275542/sites/default/files/los-10-sonidos-principales-del-perro.jpg' }} " alt="">
    {{-- <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt=""> --}}
    <div class="card-body">
        <h1 class="card-title">{{ Str::limit($course->title,40) }}</h1>
        <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>

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
        
        <a href="{{route('courses.show', $course)}}" class="mt-4 btn btn-primary btn-block">
            Más información
        </a>

    </div>
</article>