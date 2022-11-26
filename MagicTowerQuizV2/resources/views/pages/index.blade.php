@extends('layouts.app')

@section('title') {{'Előoldal'}} @endsection

@section('content')

    <div class="flex justify-center font-sans">
        <div class="flex justify-center @if ($numberOfQuestions < 1) w-full @endif">
            <div class="bg-white shadow-2xl p-7 rounded-lg content-center px-10">
                @if ($numberOfQuestions < 1)
                    <p class="w-full p-5 text-center">Jelenleg nincs kérdés az adatbázisban!</p>
                @else

@if ($errors->any())
    <ul id="Error" class="bg-red-600 rounded-lg py-2 px-2 m-auto">
  @foreach ($errors->all() as $error)

  @switch($error)
  @case("validation.min.string")
<?php $err = "A név legalább 3 karakter hosszú legyen!"; ?>
  @break

  @case("validation.max.string")
<?php $err = "A név legfeljebb 25 karakter hosszú lehet!"; ?>
  @break

  @case("validation.required")
<?php $err = "A név megadása kötelező!"; ?>
  @break

@endswitch
      <li class="p-5 text-center list-none text-white">
      {{ $err }}
      </li>
  @endforeach
    </ul>
  @endif
                    <form action="/quiz" method="POST" class="px-10 py-5 bg-gray-100 shadow-lg rounded-lg my-5 text-center">
                        @csrf
                        <label for="name" class="text-2xl font-light m-5">Név:</label>
                        <input type="text" id="name" value="{{ old('name') }}" name="name" required class="w-full p-3 rounded bg-white my-5"><br>
                        <label for="noq" class="text-2xl font-light m-5">Kérdések száma:</label>
                        <input type="number" id="noq" class="w-20 text-center p-3 rounded bg-white m-5" name="number_of_questions" @if (5 > $numberOfQuestions) value="{{ $numberOfQuestions }}" @else value="5" @endif @if (10 > $numberOfQuestions) min="1" @else min="5" @endif max="{{ $numberOfQuestions }}" required><br>
                        <button id="StartQuiz" type="submit" class="w-full text-xl bg-gradient-to-b from-blue-500 to-blue-700 rounded-full py-3 px-6 text-gray-50 transition hover:from-blue-500 hover:to-blue-800" >Kezdés</button>
                    </form>

                @endif
            </div>
        </div>

    </div>
@endsection
