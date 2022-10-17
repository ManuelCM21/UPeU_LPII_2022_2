<x-app-layout>
    <div class="container bg-slate-400 ml-auto mr-auto py-3 px-3">
        <main>
            <section class="pb-20">
                <h1 class="text-3xl font-bold text-gray-200 mb-4 mt-4">{{ $post->name }}</h1>
                <div class="text-lg mb-2">
                    {{$post->extract}}
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- Contenido principal --}}
                    <div class="lg:col-span-2">
                        <figure>
                            <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}">
                        </figure>
                        <div class="text-base text-gray-800 mt-4">
                            {{$post->body}}
                        </div>
                    </div>
                    {{-- Contenido relacionado --}}
                    <aside>
                        <h1 class="text-2xl font-bold text-gray-100 mb-2">Más en {{$post->category->name}}</h1>
                        <ul>
                            @foreach ($similares as $item)
                                <li class="mb-3">
                                    <a class="flex" href="{{route('posts.show',$item)}}">
                                        <img class="w-40 object-cover object-center" src="{{Storage::url($item->image->url)}}">
                                        <span class="ml-2">{{$item->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>

            </section>

          </main>
    </div>
</x-app-layout>
