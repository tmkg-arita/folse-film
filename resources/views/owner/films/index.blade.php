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


            <button onclick="location.href='{{route('owner.films.create')}}'" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">新規登録</button>

      </div>
     <!-- ここのフラッシュメッセージはjavascriptで作りたい。 -->
      @if (session('flash_message'))
                <div class="flash_message text-red-700 text-xl">
                    {{ session('flash_message') }}
                </div>
      @endif
  </div>
    <!-- ここにforeachが入る -->




        <div class="m-4">
        <div class="sm:flex justify-around flex-wrap m-4">
            @foreach ($films as $film )
            <div>
                <a href="{{route('owner.films.edit', ['film' => $film->id])}}">
                    <div class="bg-gray-800 bg-opacity-40 p-6 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('storage/images/'.$film->movie_image) }}" alt="content">
                        <h2 class="text-lg tracking-widest text-blue-400 font-medium title-font">{{$film -> name}}</h2>
                        <h3 class="text-xs text-white font-medium title-font mb-4">あらすじ</h3>
                        <div>
                            <p class="leading-relaxed text-base">{{$film -> information}}</p>
                        </div>
                        <!-- 削除ボタンclass指定が出来ない -->


                    </div>
                </a>
                    <form method="post" action="{{ route('owner.films.destroy', ['film' => $film->id]) }}">
                    @csrf
                    @method('delete')
                    <div class="md:px-4 py-3">
                        <button type="submit" onclick="return confirm('本当に削除しますか？')" class="text-white bg-pink-400 border-0 py-1 px-1 focus:outline-none hover:bg-blue-500 rounded">削除する</button>
                    </div>
                </form>
            </div>
            @endforeach
            </div>
        </div>


  {{$films->links()}}
</section>
</x-app-layout>
