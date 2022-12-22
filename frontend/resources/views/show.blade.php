@extends('components.parent')
@section('content')
<div class="p-10">
    <div class="mb-4">
        <a href="{{ route('book.list') }}" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back to
            home</a>
    </div>
    <!--Card 1-->
    <div class=" w-full lg:max-w-full lg:flex border border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 ">
        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center object-fill" title="Mountain">
            <img src="http://localhost:8000/{{ $book[0]['sampul'] }}" alt="">
        </div>
        <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <p class="text-gray-900 font-bold text-sm mb-2">Judul :<span> {{ $book[0]['judul'] }} </span> </p>
                <p class="text-gray-900 font-bold text-sm mb-2">Category :<span> {{ $book[2]['nama_category'] }} </span> </p>
                <p class="text-gray-900 font-bold text-sm mb-2">Penulis :<span> {{ $book[1]['nama_author'] }} </span> </p>
                <p class="text-gray-900 font-bold text-sm mb-2">Penerbit :<span> {{ $book[0]['penerbit'] }} </span> </p>
                <p class="text-gray-900 font-bold text-sm mb-2">Kota Penerbitan :<span> {{ $book[0]['kota_penerbitan'] }} </span> </p>
                <p class="text-gray-900 font-bold text-sm mb-2">ISBN :<span> {{ $book[0]['ISBN'] }} </span> </p><td class="py-4 px-6">
                
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('book.edit', $book[0]['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                <p>|</p>
                <div class="text-sm">
                    <form id="delete" action="{{ route('book.destroy', $book[0]['id']) }}" method="post">
                        @csrf
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection