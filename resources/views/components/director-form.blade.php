<div class="lg:w-1/2 md:w-2/3 border-black border-solid  mx-auto">

<div class="text-xl mt-16">
   <h2> 監督情報</h2>
</div>
<div class="flex flex-wrap -m-2">
<div class="p-2 w-1/2">
    <div class="relative">
        <label for="director_name" class="leading-7 text-sm text-gray-600">監督名<span class="text-xs text-red-600">※必須</span></label>
        <input type="text" id="director_name" name="director_name" required value="{{ old('director_name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
</div>
<div class="p-2 w-1/2">
    <div class="relative">
        <label for="director_age" class="leading-7 text-sm text-gray-600">年齢(監督)</label><br/>
        <input type="text" id="director_age" name="director_age" value="{{ old('director_age') }}" class="w-1/4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">歳
    </div>
</div>
<div class="p-2 w-1/2">
    <div class="relative">
        <div class=" leading-7 text-sm text-gray-600">性別(監督)</div>
            <div class="w-full flex justify-around">
                <input type="radio" name="director_gender" value=0 {{ old('director_gender',0) == 1 ? 'checked' : '' }}>男性
                <input type="radio" name="director_gender" value=1 {{ old('director_gender',1) == 2 ? 'checked' : '' }}>女性
            </div>
    </div>
</div>
</div>
</div>

