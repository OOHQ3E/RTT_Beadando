@extends('layouts.app')

@section('title') {{'Beállítások'}} @endsection

@section('content')

  @if (Auth::check())

  @if (Session::has('message'))
    <div id="responseText" class="flex justify-center font-sans text-center">
      <div class="w-full md:w-1/2 mb-10">
        <div class="px-5 text-2xl text-gray-100 font-light">{{ Session::get('message') }}</div>
      </div>
    </div>
  @endif

  <div class="p-5 text-center m-auto lg:w-3/4 sm:w-72">
    <a id="AddNewQuestion" href="{{ asset('create') }}" class="text-2xl text-black">
          <div class="bg-green-500 text-white uppercase rounded-full py-3 px-6 transition hover:bg-green-400 hover:text-white w-full">
           Új kérdés
          </div>
    </a>
  </div>

    <div class="flex justify-center">
        <div class="xl:w-3/4 p-5 sm:w-11/12">

          <h2 class="text-3xl font-light text-left text-gray-100 py-3">Kérdések</h2><br>
            <div class="bg-gray-100 rounded-lg overflow-auto">
                <table class="m-5 p-2">
                    <thead class="text-center">
                        <td class="w-5/6 pt-4"></td>
                        <td class="w-min pt-4"></td>
                        <td class="w-min pt-4"></td>
                    </thead>
                    <tbody>

                      @forelse ($questions as $question)

                        @switch($question->correct)
                          @case(0)
                          <?php $ans = $question->ans0; ?>
                            @break
                            @case(1)
                          <?php $ans = $question->ans1; ?>
                            @break
                            @case(2)
                          <?php $ans = $question->ans2; ?>
                            @break
                            @case(3)
                            <?php $ans = $question->ans3; ?>
                              @break
                        @endswitch

                      <tr class="pb-10">
                        <td>
                          <ul>
                            <li>{{ $question->question }} </li>
                            <br>
                            <li>1. Válasz: {{ $question->ans0 }} </li>
                            <br>
                            <li>2. Válasz: {{ $question->ans1 }} </li>
                            <br>
                            @if ($question->ans2 != "")
                            <li>3. Válasz: {{ $question->ans2 }} </li>
                            <br>
                            @endif
                            @if ($question->ans3 != "")
                            <li>4. Válasz: {{ $question->ans3 }}</li>
                            <br>
                            @endif

                            <?php
                              echo '<li>Helyes: '.$ans.'</li>';
                            ?>

                          </ul>
                          <br>
                           <hr class="pt-5 border-blue-300">
                        </td>
                        <td id="modify" class="p-2 m-1/3"><a href="/settings/{{ $question -> id }}/edit">
                         <p class="p-2 text-center rounded-lg bg-yellow-300 transition hover:bg-yellow-400"> Módosítás </p>
                        </a>
                        <td id="delete" class="p-2 m-1/3 text-white">
                          <form action="/delete" method="POST">
                              @csrf
                              <button class="p-2 text-center rounded-lg bg-red-600 transition hover:bg-red-800"   name="id" type="submit" value="{{ $question -> id }}">Törlés</button>

                           </form>
                       </td>
                      </tr>

                      @empty

                      <div class="flex justify-center font-sans font-bold text-2xl text-black">
                        <h1>Nincsenek jelenleg kérdések a rendszerben!</h1>
                      </div>

                      @endforelse
                    </tbody>
                  </table>
            </div>

        </div>

    </div>

  @else
    <div class="flex justify-center font-sans font-bold text-2xl text-white">
      <h1>Jelentkezzen be a beállítások megtekintéséhez!</h1>
    </div>

  @endif

@endsection
