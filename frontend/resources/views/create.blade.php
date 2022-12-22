@extends('components.parent')
@section('content')
<div class="mb-4">
    <a href="{{ route('book.list') }}" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back to
        home</a>
</div>
<!-- component -->
<div class="mb-4">
    <a href="{{ route('book.list') }}" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back to
        home</a>
</div>
<div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
    style="background-image: url(https://images.unsplash.com/photo-1621243804936-775306a8f2e3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
    <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
    <div class="sm:max-w-lg min-w-full p-10 bg-white rounded-xl z-10">
        <div class="text-center">
            <div class="d-flex my-4">
                <h1 class="text-center text-green-300 text-[30px] font-bold">Edit Book</h1>
            </div>
            <p class="mt-2 text-sm text-gray-400">Lorem ipsum is placeholder text.</p>
        </div>
        <form class="mt-8 space-y-3" action="{{ route('book.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 space-y-2">
                <label for="judul" class="text-sm font-bold text-gray-500 tracking-wide">judul</label>
                <input
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    type="text" placeholder="Insert book judul" @error('judul') is-invalid @enderror" name="judul"
                    id="judul" autofocus value="{{ old('judul') }}">

                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="category" class="text-sm font-bold text-gray-500 tracking-wide">Select Category</label>
                <select
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    name="category_id" id="category_id">
                    <option disabled @if (!old('category_id')) selected @endif> -- select an
                        option
                        -- </option>
                    @foreach ([1, 2, 3, 4, 5] as $category)
                    @if (old('category_id'))
                    <option value="{{ $category }}" selected>{{ $category }}</option>
                    @else
                    <option value="{{ $category }}">{{ $category }}</option>
                    @endif
                    @endforeach
                </select>

                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="author" class="text-sm font-bold text-gray-500 tracking-wide">Select Author</label>
                <select
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    name="author_id" id="author">
                    <option disabled @if (!old('author_id')) selected @endif> -- select an option -- </option>
                    @foreach ([1, 2, 3, 4, 5] as $author)
                    @if (old('author_id'))
                    <option value="{{ $author }}" selected>{{ $author }}</option>
                    @else
                    <option value="{{ $author }}">{{ $author }}</option>
                    @endif
                    @endforeach
                </select>

                @error('author_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="penerbit" class="text-sm font-bold text-gray-500 tracking-wide">Penerbit</label>
                <input
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    type="text" placeholder="Masukkan penerbit buku" @error('penerbit') is-invalid @enderror
                    name="penerbit" id="penerbit" required autofocus
                    value="{{ old('penerbit') }}">

                @error('penerbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="kota_penerbitan" class="text-sm font-bold text-gray-500 tracking-wide">Kota
                    Penerbitan</label>
                <input
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    type="text" placeholder="Masukkan kota penerbitan buku" @error('kota_penerbitan') is-invalid
                    @enderror name="kota_penerbitan" id="kota_penerbitan" required autofocus
                    value="{{ old('kota_penerbitan') }}">

                @error('kota_penerbitan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="ISBN" class="text-sm font-bold text-gray-500 tracking-wide">ISBN</label>
                <input
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    type="text" placeholder="Masukkan ISBN buku" @error('ISBN') is-invalid @enderror name="ISBN"
                    id="ISBN" required autofocus value="{{ old('ISBN') }}">

                @error('ISBN')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label for="tahun_terbit" class="text-sm font-bold text-gray-500 tracking-wide">Tahun Terbit</label>
                <input
                    class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    type="date" placeholder="Masukkan tahun_terbit buku" @error('tahun_terbit') is-invalid @enderror
                    name="tahun_terbit" id="tahun_terbit" required autofocus
                    value="{{ old('tahun_terbit') }}">

                @error('tahun_terbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Tambahkan Foto Sampul</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                        <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10 justify-center">
                                <img class="has-mask h-36 object-center"
                                    src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                    alt="freepik image">
                            </div>
                            <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here
                                <br /> or
                                <a id="" class="text-blue-600 hover:underline">select a file</a> from your computer
                            </p>
                        </div>
                        <input type="file" name="sampul" id="sampul" class="hidden">
                    </label>
                </div>
            </div>
            <p class="text-sm text-gray-300">
                <span>File type: doc,pdf,types of images</span>
            </p>
            <div>
                <button type="submit"
                    class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full
                										font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                    Upload
                </button>
            </div>

        </form>
    </div>
</div>

<style>
    .has-mask {
        position: absolute;
        clip: rect(10px, 150px, 130px, 10px);
    }
</style>
@endsection