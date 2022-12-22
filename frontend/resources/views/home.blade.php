@extends('components.parent')
@section('content')
<div class="flex justifiy-between">
    <div class="mb-4 flex gap-4">
        <a href="{{ route('book.list') }}" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back to
            home</a>
        <a href="{{ route('book.create') }}" class="py-[10px] px-[15px] rounded-lg bg-green-500 text-white">Create</a>
    </div>
    {{-- <div class="mb-4 flex gap-4">
        <a href="{{ route('book.author-list') }}" class="py-[10px] px-[15px] rounded-lg bg-grey-500 text-white">Author</a>
        <a href="{{ route('book.category-list') }}" class="py-[10px] px-[15px] rounded-lg bg-salmon-500 text-white">Category</a>
    </div> --}}
</div>
    <table class="max-w-[1000px] text-sm text-left text-gray-500 dark:text-gray-400 border-4 border-gray text-center m-auto">
        <thead class="text-xs text-white uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    No
                </th>
                <th scope="col" class="py-3 px-6">
                    Judul
                </th>
                <th scope="col" class="py-3 px-6">
                    Category
                </th>
                <th scope="col" class="py-3 px-6">
                    Author
                </th>
                <th scope="col" class="py-3 px-6">
                    Penerbit
                </th>
                <th scope="col" class="py-3 px-6">
                    Kota Penerbitan
                </th>
                <th scope="col" class="py-3 px-6">
                    ISBN
                </th>
                <th scope="col" class="py-3 px-6">
                    Tahun Terbit
                </th>
                <th scope="col" class="py-3 px-6">
                    Sampul
                </th>
                <th scope="col" class="py-3 px-6">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book as $b)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $b['judul'] }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('book.category-list', $b['slug']) }}">{{ $b['nama_category'] }}</a>
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('book.author-list', $b['author_id']) }}">{{ $b['nama_author'] }}</a>
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $b['penerbit'] }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $b['kota_penerbitan'] }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $b['ISBN'] }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $b['tahun_terbit'] }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="http://localhost:8000/{{ $b['sampul'] }}" alt="">
                        </th>
                        <td class="py-4 px-6">
                            <a href="{{ route('book.show', $b['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                            <form id="delete" action="{{ route('book.destroy', $b['id']) }}" method="post">
                            @csrf
                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>

<script>
    $('#delete').submit(function(event){
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            
            $.ajax({
                url: url,
                method: "POST",
                data: form,
                processData: false,
                contentType: false,
                success: _ => {
                    console.log('SUCCESS');
                },
                error: err => {
                    console.log('ERROR');
                    console.log(err);
                }
            });
        });
</script>
@endsection