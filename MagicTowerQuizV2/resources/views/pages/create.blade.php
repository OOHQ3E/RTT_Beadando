@extends('layouts.app')

@section('title') {{'Új kérdés'}} @endsection

@section('content')
@if (Auth::check())

<div class="m-auto w-1/2 py-2">
    <div class="text-center">
            <h1 class="text-2xl text-white font-sans pb-5 uppercase font-light">
                Új kérdés felvétele
            </h1>
    </div>
</div>

@if ($errors->any())
    <ul id="error" class="bg-red-600 rounded-lg py-2 px-2 w-1/3 m-auto">

  @foreach ($errors->all() as $error)

    @switch($error)

    @case("validation.max.string")
    <?php $err = "A mezők legfeljebb 255 karakter hosszúak lehetnek!"; ?>
      @break

          @case("validation.required")
        <?php $err = "A mező kitöltése kötelező!"; ?>
          @break

          @default
          <?php $err = "váratlan hiba!"; ?>
      @endswitch
      <li class="p-5 text-center list-none text-white">
      {{ $err }}
      </li>
  @endforeach
    </ul>
  @endif

<div class="m-auto text-center">
<form action="/create/store" method="POST" class="xl:w-1/2 px-10 py-5 bg-gray-100 rounded-lg my-5 form-input sm:mx-auto">

    @csrf

    <input id="QuestionTitle" type="text" class="truncate ... w-11/12 my-5 py-5 px-3 rounded-md" name="question" placeholder="Kérdés" class="rounded mt-5 mb-3  p-3 text" required>
    <br>
    <input id="Ans1" type="text" class="truncate ... w-11/12 my-3 px-3 rounded-md" id="0" name="ans0" placeholder="1. válasz" class="rounded mt-5 mr-5 mb-3 " required>
    <br>
    <input id="Ans2" type="text" class="truncate ... w-11/12 my-3 px-3 rounded-md" id="1" name="ans1" placeholder="2. válasz" class="rounded mt-5 mr-5 mb-3 " required>
    <br>
    <input id="Ans3" type="text" class="truncate ... w-11/12 my-5 px-3 rounded-md" id="2" name="ans2" placeholder="3. válasz" class="rounded mt-5 mr-5 mb-3 ">
    <br>
    <input id="Ans4" type="text" class="truncate ... w-11/12 my-5 px-3 rounded-md" id="3" name="ans3" placeholder="4. válasz" class="rounded mt-5 mr-5 mb-3 ">
    <br>

    <div class="text-left w-11/12 mx-6">
    <label for="correct" class="my-5 flex">Melyik válasz a helyes?</label>

    <select name="correct" id="correct" class="mb-5">
      <option value="0">1. válasz</option>
      <option value="1">2. válasz</option>
      <option value="2">3. válasz</option>
      <option value="3">4. válasz</option>
    </select>
    </div>
    <br>
<div class="text-center text-gray-50">
  <button id="Submit" type="submit" class="truncate bg-gradient-to-b from-green-500 via-green-600 to-green-700 rounded-full lg:w-1/4 sm:w-1/2 text-center  py-3 px-3 transition  hover:from-green-500 hover:via-green-700 hover:to-green-800">Hozzáadás</button>
  <button id="Reset" type="reset" class="truncate bg-gradient-to-b from-red-500 via-red-600 to-red-700 rounded-full lg:w-1/4 sm:w-1/2 text-center  py-3 px-3 transition  hover:from-red-500 hover:via-red-700 hover:to-red-800">Adatok törlése</button>

  <a id="Cancel" href="{{ asset('settings') }}" >
    <button type="button" class="truncate bg-gradient-to-b from-blue-500 via-blue-600 to-blue-700 rounded-full lg:w-1/4 sm:w-1/2 text-center  py-3 px-3  hover:from-blue-500 hover:via-blue-700 hover:to-blue-800">
       Mégse
    </button>
</a>
</div>

  </form>

</div>



@else
<div class="flex justify-center font-sans font-bold text-2xl text-white">
  <h1>Jelentkezzen be a megtekintéshez!</h1>
</div>

@endif

  @endsection
