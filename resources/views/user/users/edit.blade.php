
<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-8">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">編集</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">各項目を編集してください。</p>
    </div>
    <form form method="post" action="{{ route('user.users.update',['user' => $userData->id])}}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="flex flex-wrap-m-2">

                    <div class="p-2 w-1/4 h-4">
                        <div class="relative ">
                            現在の画像
                            <img class="h-40 rounded 1/4 object-cover object-center mb-6" src="{{ asset('storage/images/'.$userData->user_image) }}" alt="content">
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="user_image" class="leading-7 text-sm text-gray-600">アイコン</label>
                            <input type="file" id="user_image" name="user_image" multiple accept="image/jpg,image/jpeg,image/png" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></input>
                        </div>
                    </div>

                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">名前<span class="text-xs text-red-600">※必須</span></label>
                            <input type="text" id="name" name="name" required value="{{ old('name',$userData->name) }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">メール<span class="text-xs text-red-600">※必須</br></label>
                            <input type="email" id="email" name="email" required  value="{{ old('email',$userData->email) }}" class="w-1/4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="information" class="leading-7 text-sm text-gray-600">自己紹介</label>
                            <textarea id="information" name="information"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{old('infomation',$userData->information)}}</textarea>
                        </div>
                    </div>



                    <div class="mt-16 flex justify-around p-2 w-full">
                            <button type="button" onclick="location.href='{{route('user.users.index')}}'" class="text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">登録する</button>
                    </div>
</section>
