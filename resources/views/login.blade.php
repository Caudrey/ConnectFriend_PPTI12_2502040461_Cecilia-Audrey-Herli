@extends('layout.master')

@section('title', 'Login')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger bg-red-600 text-white z-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex flex-row h-screen justify-center">
        <div class="w-full bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    ConnectFriend
                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                        <form class="w-full items-center" caction="/login" method="POST">
                            @csrf
                            <div class="px-10 mb-3 flex flex-col">
                                <label for="email" class="text-white">Email address</label>
                                <input name="email" type="text" class="" value="{{ old('email') }}" id="email">
                                @error('email')
                                    <div id="emailHelp">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="px-10 mb-3 w-full flex flex-col">
                                <label for="password" class="form-label text-white">Password</label>
                                <input name="password" type="password" class="form-control" id="password">
                                @error('password')
                                    <div id="passwordHelp">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Submit
                            </button>
                        </form>
                        <span class="text-white">
                            Don't have an account yet? <a href="\register">Register</a>
                        </span>
                        {{-- <form class="space-y-4 md:space-y-6" action="#">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                    </div>
                                    <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                    </div>
                                </div>
                                <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                            </div>
                            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                            </p>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="w-1/2 flex h-screen  items-center justify-center">
            <img class="w-4/6" src="wedding.png" alt="">
        </div> --}}
    </div>

    {{-- <div class="flex flex-row h-screen justify-center">
        <div class="w-1/2 flex flex-col h-screen items-center justify-center">
            <h1>ConnectFriend</h1>
            <div class="flex flex-col bg-red-100 container w-5/6 items-center justify-center">
                    <h2 class="fw-bold">Login</h2>
                    <form class="w-full items-center" caction="/login" method="POST">
                        @csrf
                        <div class="px-10 mb-3 flex flex-col">
                            <label for="email">Email address</label>
                            <input name="email" type="text" class="" value="{{ old('email') }}" id="email">
                            @error('email')
                                <div id="emailHelp">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-10 mb-3 w-full flex flex-col">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                            @error('password')
                                <div id="passwordHelp">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            Submit
                        </button>
                    </form>
                    <p>Copyright@cecil2023</p>
                </div>
            </div>
    </div> --}}
@endsection
