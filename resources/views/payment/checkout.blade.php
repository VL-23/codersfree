<x-app-layout>

    <div class="container">
        <h1 class="text-3xl font-bold text-gray-500">Detalle del pedido</h1>

        <div class="text-gray-600 card">
            <div class="card-body">
                <article class="flex items-center">
                    @isset($course->image)
                        <img class="object-cover w-12 h-12" src="{{Storage::url($course->image->url)}}" alt="">
                    @else
                        <img class="object-cover w-12 h-12" src="https://static.fundacion-affinity.org/cdn/farfuture/PVbbIC-0M9y4fPbbCsdvAD8bcjjtbFc0NSP3lRwlWcE/mtime:1643275542/sites/default/files/los-10-sonidos-principales-del-perro.jpg" alt="">
                    @endisset

                    <h1 class="ml-2 text-lg">{{ $course->title }}</h1>

                    <p class="ml-auto text-xl font-bold">US$ {{ $course->price->value }}</p>

                </article>

                <div class="flex justify-end mt-2 mb-4">
                    <a href="{{ route('payment.pay', $course) }}" class="btn btn-primary">Comprar este curso</a>
                </div>

                <hr>

                <p class="mt-4 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium sed ad nobis quas? Sint, fuga. Obcaecati autem nobis, numquam odit unde sint est sequi ea id, saepe tempora molestias fugiat? <a class="font-bold text-red-500" href="">Terminos y condiciones</a></p>


            </div>
        </div>
    </div>

</x-app-layout>