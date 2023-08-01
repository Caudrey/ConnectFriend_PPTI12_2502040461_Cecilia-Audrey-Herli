@extends('layout.master')

@section('title', 'Login')

@section('content')
<form action="/storeRegister" id="formPayment"></form>
    <input type="hidden" name="name" value="{{ $name }}">
    <input type="hidden" name="fields_of_interest" value="{{ $fields_of_interest }}">
    <input type="hidden" name="username" value="{{ $username }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="" value="{{ $price }}">
    <input type="hidden" name="price" value="{{ $price }}">
    <input type="hidden" name="price" value="{{ $price }}">
    <div class="border-b border-gray-900/10 pb-3 mb-3"></div>

    <span class="ms-4 font-semibold">Price: IDR{{ $priceWithDots }}</span>
    <input type="hidden" name="price" value="{{ $price }}">

    <div class="border-b border-gray-900/10 pb-3"></div>
    Enter Your Payment
    <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="price" placeholder="{{__('form.price')}}" required />
    @error('price')
        <h1 class="text-red-600 text-xl">
            {{ $message }}
        </h1>
    @enderror


    <script>
        function submitForm() {
            // Get the form element by its ID
            var form = document.getElementById('formPayment');

            // Create a new input element for the additional data
            var additionalInput = document.createElement('input');
            additionalInput.type = 'hidden'; // Hidden input type to not display the field
            additionalInput.name = 'additional_field'; // Replace 'additional_field' with the actual name of the field in your form
            additionalInput.value = 'Additional Data'; // Replace 'Additional Data' with the value you want to add

            // Append the additional input to the form
            form.appendChild(additionalInput);

            // Submit the form
            form.submit();
        }
        </script>
@endsection
