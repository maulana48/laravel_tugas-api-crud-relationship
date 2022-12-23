@extends('components.parent')
@section('content')
<!-- component -->
<div class="mb-4">
    <a href="{{ route('category.list') }}" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back to
        home</a>
</div>
<div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
    style="background-image: url(https://images.unsplash.com/photo-1621243804936-775306a8f2e3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
    <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
    <div class="sm:max-w-lg min-w-full p-10 bg-white rounded-xl z-10">


        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                        alt="Workflow">
                    <div class="text-center">
                        <div class="d-flex my-4">
                            <h1 class="text-center text-green-300 text-[30px] font-bold">Create Category</h1>
                        </div>
                        <p class="mt-2 text-sm text-gray-400">Lorem ipsum is placeholder text.</p>
                    </div>
                </div>

                <div class="rounded bg-white max-w-md rounded overflow-hidden shadow-xl p-5">

                    <form class="mt-8 space-y-3" action="{{ route('category.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="remember" value="True">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="grid gap-6">
                                <div class="col-span-12">
                                    <label for="nama_category" class="block text-sm font-medium text-gray-700">Nama
                                        Category</label>
                                    <input type="text" name="nama_category" id="nama_category" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('nama_category') }}">
                                </div>
                                @error('nama_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="col-span-12">
                                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                    <input type="text" name="slug" id="slug" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('slug') }}">
                                </div>
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="col-span-12">
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="deskripsi" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('deskripsi') }}">
                                </div>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <!-- Heroicon name: solid/lock-closed -->

                                </span>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .has-mask {
        position: absolute;
        clip: rect(10px, 150px, 130px, 10px);
    }
</style>
<script>
    const title = document.querySelector("#nama_category");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;			
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();	
        });

</script>
@endsection