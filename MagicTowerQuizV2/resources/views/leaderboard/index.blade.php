@extends('layouts.app')

@section('title') {{'Ranglista'}} @endsection

@section('content')
<div class="sm:mx-auto flex justify-center font-sans w-full xl:w-10/12">
    <div class="w-full mb-10 xl:text-left text-center">
        <label id="Leaderboard" class="text-4xl font-light text-gray-100">Ranglista</label><br>
        <form action="leaderboards" class="px-2 sm:px-10 py-5 bg-gray-100 shadow-2xl rounded-lg my-5 form-input" method="POST">
            @csrf
            <h2 class="font-light text-3xl w-full text-center mb-3">Keresés</h2>
            <ul class="list-none text-center w-full">
                <li class="my-2 inline-block">Név<br><input type="text" name="name" class="form-input" value="{{ $name }}"></li>
                <li class="my-2 inline-block md:ml-10">Kérdések száma<br><p class="inline-block">Min:<input type="number" name="min-noq" class="form-input w-20 ml-2 mr-5" value="{{ $minNumberOfQuestions }}" min="1" max="{{ $maxOfNumberOfQuestions }}"></p><p class="inline-block md:ml-5">Max:<input type="number" name="max-noq" class="form-input w-20 ml-2 mr-5" value="{{ $maxNumberOfQuestions }}" min="1" max="{{ $maxOfNumberOfQuestions }}"></p></li>
            </ul>
            <h3 class="text-xl mr-5 w-full text-center">Sorrend:</h3>
            <ul class="list-none text-center w-full">
                <li class="my-2 inline-block"><input type="radio" @if($order == 'desc') checked @endif id="csokkeno" name="order" value="desc" class="rounded mr-2 mb-3"><label for="csokkeno" class="text-lg mr-6">Csökkenő</label></li>
                <li class="my-2 inline-block md:ml-10"><input type="radio" @if($order == 'asc') checked @endif id="novekvo" name="order" value="asc" class="rounded mr-2 mb-3"><label for="novekvo" class="text-lg mr-6">Növekvő</label></li>
            </ul>
            <h3 class="text-xl mr-5 w-full text-center">Sorrend alapja:</h3>
            <ul class="list-none text-center w-full">
                <li class="my-2 inline-block"><input type="radio" @if($orderType == 'percentage') checked @endif id="szazalek" name="orderType" value="percentage" class="rounded mr-2 mb-3"><label for="szazalek" class="text-lg mr-6">Százalék</label></li>
                <li class="my-2 inline-block"><input type="radio" @if($orderType == 'points') checked @endif id="pont" name="orderType" value="points" class="rounded mr-2 mb-3"><label for="pont" class="text-lg mr-6">Pont</label></li>
                <li class="my-2 inline-block"><input type="radio" @if($orderType == 'name') checked @endif id="nev" name="orderType" value="name" class="rounded mr-2 mb-3"><label for="nev" class="text-lg mr-6">Név</label></li>
                <li class="my-2 inline-block"><input type="radio" @if($orderType == 'time') checked @endif id="ido" name="orderType" value="time" class="rounded mr-2 mb-5"><label for="ido" class="text-lg mr-6">Idő</label></li>
                <li class="my-2 inline-block"><input type="radio" @if($orderType == 'number_of_questions') checked @endif id="noq" name="orderType" value="number_of_questions" class="rounded mr-2 mb-5"><label for="noq" class="text-lg mr-6">Kérdések száma</label></li>
                <li class="my-2 inline-block"><input type="radio" @if($orderType == 'points_per_minute') checked @endif id="ppmin" name="orderType" value="points_per_minute" class="rounded mr-2 mb-5"><label for="ppmin" class="text-lg mr-6">Pont/perc</label></li>
            </ul>
            <div class="flex justify-center">
                <button type="submit" value="search" class="flex justify-center bg-green-600 rounded-full py-3 w-1/2 text-gray-50 text-2xl transition hover:bg-green-700">Szűrés</button>
            </div>
        </form>
        <div class="w-full mb-10 px-c py-5 bg-gradient-to-b from-white to-gray-100 rounded-lg my-5 shadow-2xl overflow-auto">
            <table class="w-full flex flex-row flex-no-wrap text-left lg:bg-white rounded-lg overflow-hidden lg:shadow-lg my-5">
                <thead class="text-white">
                    @forelse ($lboard as $row)
                    <tr class="bg-blue-600 flex flex-col flex-no wrap lg:table-row rounded-l-lg lg:rounded-none mb-2 lg:mb-0">
                        <th class="sm:px-3 px-1 py-3 text-left truncate h-12">Helyezés</th>
                        <th class="sm:px-3 px-1 py-3 text-left truncate h-12">Játékos neve</th>
                        <th class="sm:px-3 px-1 py-3 text-left truncate h-12">Elért szézalék</th>
                        <th class="sm:px-3 px-1 py-3 text-left truncate h-12">Elért pontszám</th>
                        <th class="sm:px-3 px-1 py-3 text-left truncate h-12">Elért Idő</th>
                        <th class="sm:px-3 px-1 py-3 text-left truncate h-12">Kérdések száma</th>
                        <th class="sm:px-3 px-1 py-3 text-left truncate h-12">Pont/perc</th>
                    </tr>
                    @empty

                    @endforelse
                </thead>
                <?php $index = 1 ?>
                <tbody class="flex-1 lg:flex-none">
                    @forelse ($lboard as $row)
                    <tr class="flex flex-col flex-no wrap lg:table-row mb-2 lg:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 sm:px-3 px-1 py-3 truncate h-12">{{ $index++ }}.</td>
                        <td class="border-grey-light border hover:bg-gray-100 sm:px-3 px-1 py-3 truncate h-12">{{ $row->name }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 sm:px-3 px-1 py-3 truncate h-12">{{ number_format($row->percentage,2) }}%</td>
                        <td class="border-grey-light border hover:bg-gray-100 sm:px-3 px-1 py-3 truncate h-12">{{ $row->points }} pont</td>
                        <td class="border-grey-light border hover:bg-gray-100 sm:px-3 px-1 py-3 truncate h-12">{{ (int)($row->time / 60) }} perc {{ $row->time % 60 }} másodperc</td>
                        <td class="border-grey-light border hover:bg-gray-100 sm:px-3 px-1 py-3 truncate h-12">{{ $row->number_of_questions }} db</td>
                        <td class="border-grey-light border hover:bg-gray-100 sm:px-3 px-1 py-3 truncate h-12">{{ $row->points_per_minute }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="p-4 text-center">@if ($numberOfEntries == 0) Üres a ranglista! @else A ranglistában nincs a keresési feltételeknek megfelelő adat! @endif</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('optioinal_style')
<style>

    @media (min-width: 1024px) {
      table {
        display: inline-table !important;
      }

      thead tr:not(:first-child) {
        display: none;
      }

      th {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
      }
    }

    @media (min-width: 1060px) {
      .px-c {
          padding-left: 10px;
          padding-right: 10px
      }
    }

    td:not(:last-child) {
      border-bottom: 0;
    }

    th {
        font-style: normal;
    }

    th:not(:last-child) {
      border-bottom: 2px solid rgba(0, 0, 0, .1);
    }
  </style>
@endsection
