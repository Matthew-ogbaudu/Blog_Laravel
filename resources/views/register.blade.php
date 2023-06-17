<x-layout>
    <section class="px-6 py-5">
<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
    <h1 class="text-center font-bold text-xl">Register</h1>
    <form method="POST" action="/register">
        @csrf
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-gray-700" for="name">
                Name

            </label>

            <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{old('name')}}">
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="username">
            Username

        </label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" value="{{old('username')}}"> </div>
        @error('username')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-gray-700" for="email">
                Email

            </label>

            <input class="border border-gray-400 p-2 w-full" type="text" name="email" id="email" value="{{old('email')}}"> </div>

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-gray-700" for="password">
                Password
            </label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="password" id="password"> </div>
        </div>

        <div class="mb-6">
          <button type="submit" class="bg-blur 400 text-black rounded py-2 px-4 hover:bg-blue-500">
              Submit

            </button>
        </div>
        @if($errors->any())
<ul>
@foreach($errors->all() as $error)
    <li class="text-red-500 text-xs"> {{$error}}</li>


        @endforeach
</ul>
        @endif
    </form>
</main>
    </section>
</x-layout>
