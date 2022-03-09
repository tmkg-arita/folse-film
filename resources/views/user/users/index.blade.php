<section class="text-gray-600 body-font ">
<h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ユーザー情報</h1>

  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{asset('storage/images/'.$userData->user_image)}}">
    <div class="text-center lg:w-2/3 w-full">

      <p class="mb-8 leading-relaxed">{{$userData->name}}</p>
      <p class="mb-8 leading-relaxed">{{$userData->information}}</p>

      <div class="flex justify-center">
        <button type="button" onclick="location.href='{{route('user.dashboard')}}'" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button>
        <button type="submit" onclick="location.href='{{route('user.users.edit',['user'=>$userData->id])}}'"class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">編集する</button>
      </div>
    </div>
  </div>
</section>
