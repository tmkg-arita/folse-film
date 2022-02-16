<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="text-gray-400 body-font bg-gray-900">
  <div class="container px-5 py-24 mx-auto">

      <div class="mx-auto flex flex-wrap w-full justify-around lg:w-1/2 w-full mb-6 lg:mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-mideRed">映画一覧</h1>
        <div class="h-1 w-20 bg-blue-500 rounded"></div>

            <button onclick="location.href='{{route('owner.films.create')}}'" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">新規登録</button>

      </div>
  </div>
    <!-- ここにforeachが入る -->

    @foreach ($films as $film )
    <a href="{{route('owner.films.edit', ['film' => $film->id])}}">
        <div class="sm:flex flex-wrap m-4">
            <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-800 bg-opacity-40 p-6 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('image/'.$film->movie_image) }}" alt="content">
                        <h2 class="text-lg tracking-widest text-blue-400 font-medium title-font">{{$film -> name}}</h2>
                        <h3 class="text-xs text-white font-medium title-font mb-4">あらすじ</h3>
                        <div>
                            <p class="leading-relaxed text-base">{{$film -> infomation}}</p>
                        </div>
                    </div>
            </div>

        </div>
    </a>
  @endforeach
</section>
</x-app-layout>
