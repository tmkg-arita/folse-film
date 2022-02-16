<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           新規登録
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-8">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">新規登録</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">各項目を記入してください。</p>
    </div>
    <form form method="post" action="{{ route('owner.films.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">題名<span class="text-xs text-red-600">※必須</span></label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="movie_time" class="leading-7 text-sm text-gray-600">上映時間<span class="text-xs text-red-600">※必須</br></label>
                            <input type="text" id="movie_time" name="movei_time" required  value="{{ old('movie_time') }}" class="w-1/4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">分
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="infomation" class="leading-7 text-sm text-gray-600">あらすじ<span class="text-xs text-red-600">※必須</label>
                            <textarea id="infomation" name="infomation" required  value="{{ old('infomation') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="movie_image" class="leading-7 text-sm text-gray-600">画像<span class="text-xs text-red-600">※必須</label>
                            <input type="file" id="movie_image" name="movie_image" required value="{{ old('movie_image') }}" multiple accept="image/jpg,image/jpeg,image/png" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></input>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <div class=" leading-7 text-sm text-gray-600">カテゴリー<span class="text-xs text-red-600">※必須</div>
                                <div class="w-full flex justify-around">
                                    <input type="radio" name="category" value=1 {{ old('category',1) == 1 ? 'checked' : '' }}>アクション映画
                                    <input type="radio" name="category" value=2 {{ old('category',2) == 2 ? 'checked' : '' }}>恋愛
                                    <input type="radio" name="category" value=3 {{ old('category',3) == 3 ? 'checked' : '' }}>アドベンチャー映画
                                    <input type="radio" name="category" value=4 {{ old('category',4) == 4 ? 'checked' : '' }}>ファンタジー映画
                                    <input type="radio" name="category" value=5 {{ old('category',5) == 5 ? 'checked' : '' }}>ホラー映画
                                    <input type="radio" name="category" value=6 {{ old('category',6) == 6 ? 'checked' : '' }}>サスペンス/クライムサスペンス映画
                                    <input type="radio" name="category" value=7 {{ old('category',7) == 7 ? 'checked' : '' }}>ミステリー映画
                                    <input type="radio" name="category" value=8 {{ old('category',8) == 8 ? 'checked' : '' }}>戦争映画
                                    <input type="radio" name="category" value=9 {{ old('category',9) == 9 ? 'checked' : '' }}>SF映画
                                    <input type="radio" name="category" value=10 {{ old('category',10) == 10 ? 'checked' : '' }}>ドキュメンタリー
                                </div>
                        </div>
                    </div>
                    <div class="mt-16 flex justify-around p-2 w-full">
                            <button type="button" onclick="location.href='{{route('owner.films.index')}}'" class="text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">登録する</button>
                    </div>









                </div>
             </div>
    </form>
  </div>
</section>
</x-app-layout>
