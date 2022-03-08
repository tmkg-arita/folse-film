<section class="text-gray-600 body-font">
    @foreach ($users as $user)

  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ユーザー情報</h1>
    <div class="p-2 w-1/2">
                        <div class="relative">
                            現在の画像
                            <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('storage/images/'.$user->user_image) }}" alt="content">
                        </div>
                    </div>
    <div class="text-center lg:w-2/3 w-full">
            <p class="mb-8 leading-relaxed">{{$user->name}}</p>
            <p class="mb-8 leading-relaxed">{{$user->email}}</p>
            <p class="mb-8 leading-relaxed">{{$user->information}}</p>

      <div class="flex justify-center">
            <button onclick="location.href='{{route('user.users.edit',['user' => $user -> id])}}'" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</button>
      </div>
    </div>
  </div>


    @endforeach
</section>


