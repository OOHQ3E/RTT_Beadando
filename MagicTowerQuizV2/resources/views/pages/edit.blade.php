@extends('layouts.app')

@section('title') {{'Kérdés szerkesztése'}} @endsection

@section('content')

@if (Auth::check())

<div id="Edit" class="m-auto w- py-2">
    <div class="text-center">
            <h1 class="text-2xl text-white font-sans pb-5 uppercase font-light">
                Kérdés szerkesztése
            </h1>
    </div>
</div>

@if ($errors->any())
    <ul class="bg-red-600 rounded-lg py-2 px-2 w-1/3 m-auto">
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

<form action="/settings/{{ $question->id }}" method="POST" enctype="multipart/form-data" class="xl:w-1/2 px-10 py-5 bg-gray-100 rounded-lg my-5 form-input sm:mx-auto">

    @csrf
    @method('PUT')

    <input id="QuestionTitle" class="truncate ... w-11/12 my-5 py-5 px-3 rounded-md" type="text" name="question" value="{{ $question -> question }}" class="rounded mt-5 mr-5 mb-3 p-3 text" required>
    <br>
    <input id="Ans1"class="truncate ... w-11/12 my-3 px-3 rounded-md" type="text" id="0" name="ans0" value="{{ $question -> ans0 }}" class="rounded mt-5 mr-5 mb-3" required>
    <br>
    <input id="Ans2" class="truncate ... w-11/12 my-3 px-3 rounded-md" type="text" id="1" name="ans1" value="{{ $question -> ans1 }}" class="rounded mt-5 mr-5 mb-3" required>
    <br>
    <input id="Ans3" class="truncate ... w-11/12 my-3 px-3 rounded-md" type="text" id="2" name="ans2" value="{{ $question -> ans2 }}" class="rounded mt-5 mr-5 mb-3">
    <br>
    <input id="Ans4" class="truncate ... w-11/12 my-3 px-3 rounded-md" type="text" id="3" name="ans3" value="{{ $question -> ans3 }}" class="rounded mt-5 mr-5 mb-3">
    <br>
    <div class="text-left w-11/12 mx-6">
    <label for="correct" class="my-5 flex">Melyik válasz a helyes?</label>
    <select name="correct" id="correct" class="mb-5">

      @for ($i = 0; $i < 4; $i++)
        @if ($i == $question -> correct)
          <option selected value="{{ $i }}">{{ $i+1 }}. válasz</option>
        @endif
        @if ($i != $question -> correct)
          <option value="{{ $i }}">{{ $i+1 }}. válasz</option>
        @endif
      @endfor
    </select>
  </div>
    <br>

    <div class="text-center text-gray-50">

      <button id="submit" type="submit"
              class="truncate bg-gradient-to-b from-green-500 via-green-600 to-green-700 rounded-full lg:w-1/3 sm:w-1/2 text-center  py-3 px-3  hover:from-green-500 hover:via-green-700 hover:to-green-800">
        Mentés
      </button>

    <a href="{{ asset('settings') }}" >
      <button id="cancel" type="button" class="truncate bg-gradient-to-b from-blue-500 via-blue-600 to-blue-700 rounded-full lg:w-1/3 sm:w-1/2 text-center  py-3 px-3  hover:from-blue-500 hover:via-blue-700 hover:to-blue-800">
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
