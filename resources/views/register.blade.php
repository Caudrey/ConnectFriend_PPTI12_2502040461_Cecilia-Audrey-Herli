@extends('layout.master')

@section('title', 'Register')

@section('content')
@php
    $priceWithDots = number_format($price, 0, '', '.');
@endphp

<div class="flex flex-row justify-center">
    <div class="w-1/2 flex flex-col items-center justify-center">
        <form method="POST" class="flex flex-col" action="/register" enctype="multipart/form-data" id="formPayment">
            @csrf
                <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">{{ __('form.register') }}</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">{{ __('form.welcome') }}</p>
                    <div class="border-b border-gray-900/10 pb-3 mb-3"></div>

                    <span class="ms-4 font-semibold">{{ __('form.price') }}{{ $priceWithDots }}</span>
                    <input type="hidden" name="price" id="price" value="{{ $price }}">

                    <div class="border-b border-gray-900/10 pb-3"></div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">LinkedIn Username</label>
                        <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <span class="flex select-none items-center pl-3 pr-3 text-gray-500 sm:text-sm">https://www.linkedin.com/in/</span>
                            <input type="text" name="username" id="username" autocomplete="username" value="{{ old('username') }}" class="block rounded-r rounded-br flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="{{ __('form.username') }}">
                            @error('username')
                                <div class="text-red-500 text-xl">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <div class="mb-2 w-5/6 flex flex-col">
                            <label for="name">{{ __('form.name') }}</label>
                            <input name="name" type="text" class="w-full" value="{{ old('name') }}" id="name">
                            @error('name')
                                <div class="text-red-500 text-xl">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-full">
                        <div class="mb-3 w-5/6 flex flex-col">
                            <label for="email">{{ __('form.email') }}</label>
                            <input name="email" type="email" class="w-full" value="{{ old('email') }}" id="email">
                            @error('email')
                                <div id="emailError">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-full">
                        <div class="mb-2 w-5/6 flex flex-col">
                            <label for="birthdate">{{ __('form.birthdate') }}</label>
                            <input name="birthdate" type="date" value="{{ old('birthdate') }}" id="birthdate">
                            @error('birthdate')
                                <div id="birthdateError">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-full">
                        <div class="mb-2 w-5/6 flex flex-col">
                            <label for="gender">{{ __('form.gender') }}</label>
                            <select name="gender" id="gender">
                                <option>Select gender</option>
                                <option @if (old('gender') == 'male') selected @endif value="male">Male</option>
                                <option @if (old('gender') == 'female') selected @endif value="female">Female</option>
                            </select>
                            @error('gender')
                                <div id="genderError">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-full">
                        <fieldset>
                            <legend class="text-sm font-semibold leading-6 text-gray-900">{{ __('form.work') }}</legend>
                            <div class="mt-6 space-y-6">
                            @foreach ($works as $work)
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                    <input id="{{ $work->job }}" name="{{ $work->job }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                    <label for="{{ $work->job }}" class="font-medium text-gray-900">{{ $work->job }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="text-sm leading-6">
                                <label for="candidates" class="font-medium text-gray-900">Candidates</label>
                                </div>
                            </div>
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="text-sm leading-6">
                                <label for="offers" class="font-medium text-gray-900">Offers</label>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                        {{-- <div class="mb-2 w-5/6 flex flex-col">
                            <label for="work">{{ __('form.work') }}</label>
                            <select name="work" id="work">
                                <option>Select Your Interest Field Work</option>
                                <option @if (old('work') == 'male') selected @endif value="male">Male</option>
                                <option @if (old('work') == 'female') selected @endif value="female">Female</option>
                            </select>
                            @error('gender')
                                <div id="genderError">{{ $message }}</div>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="col-span-full">
                        <div class="mb-2 w-5/6 flex flex-col">
                            <label for="phoneNumber">{{ __('form.phone') }}</label>
                            <input name="phoneNumber" type="number" value="{{ old('phoneNumber') }}"
                                id="phoneNumber">
                            @error('phoneNumber')
                                <div id="phoneNumberError">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-full">
                        <div class="mb-2 w-5/6 flex flex-col">
                            <label for="image">{{ __('form.image') }}</label>
                            <input name="image" type="file" id="image"
                                accept="image/png, image/gif, image/jpeg">
                            @error('image')
                                <div id="imageError">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-full">
                        {{-- <div class="flex w-5/6 justify-between"> --}}
                                <div class="mb-2 w-5/6 flex flex-col">
                                    <label for="password">{{ __('form.password') }}</label>
                                    <input name="password" type="password" id="password">
                                    @error('password')
                                        <div id="passwordError">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-2 w-5/6 flex flex-col">
                                    <label for="passwordConfirmation">{{ __('form.confirm') }}</label>
                                    <input name="passwordConfirmation" type="password" id="passwordConfirmation">
                                    @error('passwordConfirmation')
                                    <div id="passwordConfirmationError">{{ $message }}</div>
                                @enderror
                                </div> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="col-span-full">
                        {{-- <button type="submit" class="w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            {{ __('form.submit') }}
                        </button> --}}
                        <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                        class="w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            {{ __('form.submit') }}
                        </button>
                    </div>
                    <div>
                        <!-- Main modal -->
                        <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Payment
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="staticModal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        {{ __('form.price') }}{{ $priceWithDots }}
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <div class="border-2 h-10 w-full relative bg-transparent">
                                                <input type="number" id="paid" class="text-center text-center w-full text-md " name="paid">
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-6 border-gray-200">
                                            <button type="submit" onclick="checkAmount()" class=" px-5 py-3 text-white bg-blue-700">
                                                Pay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <script>
                        function checkAmount() {
                            var amount = document.getElementById('paid');
                            var price = document.getElementById('price');
                            if(amount.value > price.value){
                                alert('You are still underpaid' . price-amount)
                            } elseif(amount.value = price.value){
                                confirm('Sorry you overpaid' . amount-price. ', would you like to enter a balance?')
                            }
                            var form = document.getElementById('formPayment');

                            // Create a new input element for the additional data
                            var additionalInput = document.createElement('input');
                            additionalInput.type = 'hidden'; // Hidden input type to not display the field
                            additionalInput.name = 'wallet'; // Replace 'additional_field' with the actual name of the field in your form
                            additionalInput.value = amount-price; // Replace 'Additional Data' with the value you want to add

                            // Append the additional input to the form
                            form.appendChild(additionalInput);

                            // Submit the form
                            form.submit();
                        };
                    </script>
                </div>
        </form>
        <span class="text-white">
            Have an account yet? <a href="\login">Login</a>
        </span>
    </div>
</div>
@endsection
