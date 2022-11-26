@extends('layouts.app')

@section('title') {{'Kvíz'}} @endsection

@section('content')

<div class="flex justify-center font-sans">
    <div class="bg-white p-7 rounded-lg content-center px-10">
        <form action="/quiz/evaluation" method='POST' class="px-10 py-5 bg-gray-100 rounded-lg my-5">
            @csrf
            @for ($i = 0; $i < $numberOfQuestions; $i++)
                <p class="text-lg font-semibold">{{ $questions[$i]->question }}</p>
                <input type="hidden" name="q{{ $i }}" value="{{ $questions[$i]->id }}">
                <table class="m-1 lg:m-5 w-full">
                    <td class="flex flex-col flex-no wrap lg:table-row">
                        <td class="w-auto text-left lg:text-center p-2">
                            <input type="radio" id="a0-{{ $i }}" name="a{{ $i }}" value="0" class="rounded mr-2 mb-3"><label for="a0-{{ $i }}" class="text-lg mr-6">{{ $questions[$i]->ans0 }}</label>
                        </td>
                        <td class="w-auto text-left lg:text-center p-2">
                            <input type="radio" id="a1-{{ $i }}" name="a{{ $i }}" value="1" class="rounded mr-2 mb-3"><label for="a1-{{ $i }}" class="text-lg mr-6">{{ $questions[$i]->ans1 }}</label>
                        <td class="w-auto text-center p-2">
                            @if (isset($questions[$i]->ans2))
                            <td class="w-auto text-left lg:text-center p-2">
                                <input type="radio" id="a2-{{ $i }}" name="a{{ $i }}" value="2" class="rounded mr-2 mb-3"><label for="a2-{{ $i }}" class="text-lg mr-6">{{ $questions[$i]->ans2 }}</label>
                            </td>
                            @endif
                            @if (isset($questions[$i]->ans3))
                            <td class="w-auto text-left lg:text-center p-2">
                                <input type="radio" id="a3-{{ $i }}" name="a{{ $i }}" value="3" class="rounded mr-2 mb-3"><label for="a3-{{ $i }}" class="text-lg mr-6">{{ $questions[$i]->ans3 }}</label>
                            </td>
                            @endif
                        </td>
                    </tr>
                </table>
                <hr class="my-5 border-blue-300">
            @endfor
            <div id="FinishQuiz" class="text-center">
                <button type="submit" class="done_btn bg-gradient-to-b from-blue-500 to-blue-700 text-lg rounded-full py-3 px-6 text-gray-50 transition hover:from-blue-500 hover:to-blue-800">Kész</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('optioinal_style')
<style>
    @media (min-width: 400px) {
        .done_btn {
            width: 40%
        }
    }
  </style>
@endsection
