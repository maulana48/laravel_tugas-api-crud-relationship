@extends('components.parent')
@section('content')
    <!-- component -->
    <div class="mb-4">
        <a href="{{ route('author.list') }}" class="py-[10px] px-[15px] rounded-lg bg-blue-500 text-white">Back to
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
                                    <h1 class="text-center text-green-300 text-[30px] font-bold">Edit Author</h1>
                                </div>
                                <p class="mt-2 text-sm text-gray-400">Lorem ipsum is placeholder text.</p>
                            </div>
                    </div>
            
                    <div class="rounded bg-white max-w-md rounded overflow-hidden shadow-xl p-5">
            
                        <form class="mt-8 space-y-3" action="{{ route('author.update', $author['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="remember" value="True">
                            <div class="rounded-md shadow-sm -space-y-px">
                                <div class="grid gap-6">
                                    <div class="col-span-12">
                                        <label for="nama_author" class="block text-sm font-medium text-gray-700">Nama Author</label>
                                        <input type="text" name="nama_author" id="nama_author" autocomplete="given-name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('nama_author', $author['nama_author']) }}">
                                    </div>
                                    @error('nama_author')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="col-span-12">
                                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                        <input type="text" name="username" id="username" autocomplete="given-name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('username', $author['username']) }}">
                                    </div>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="col-span-12">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" autocomplete="given-name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('email', $author['email']) }}">
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="col-span-12">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                        <input type="password" name="password" id="password" autocomplete="given-name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('password') }}">
                                    </div>
                                    @error('password')
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

    </script>
@endsection
