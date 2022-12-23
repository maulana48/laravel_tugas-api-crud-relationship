@extends('components.parent')
@section('content')
<div class="flex justifiy-between">
    <div class="mb-4 flex gap-4">
        <a href="{{ route('book.list') }}" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back to
            home</a>
        <a href="{{ route('author.create') }}" class="py-[10px] px-[15px] rounded-lg bg-green-500 text-white">Create</a>
    </div>
</div>
    <table class="max-w-[1000px] text-sm text-left text-gray-500 dark:text-gray-400 border-4 border-gray text-center m-auto">
        <thead class="text-xs text-white uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    No
                </th>
                <th scope="col" class="py-3 px-6">
                    Nama Author
                </th>
                <th scope="col" class="py-3 px-6">
                    Username
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($author as $a)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $a['nama_author'] }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('book.author-list', $a['username']) }}">{{ $a['username'] }}</a>
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $a['email'] }}
                        </th>
                        <td class="py-4 px-6">
                            <a href="{{ route('author.edit', $a['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                            <form id="delete" action="{{ route('author.destroy', $a['id']) }}" method="post">
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