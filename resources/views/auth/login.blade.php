@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Login
                </h2>
            </header>
            <div id="uncorrect" class="text-red-500 mt-1 text-xs"></div>
            <form id="form">
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Email</label
                    >
                    <input
                        id="email"
                        type="email"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    />
                </div>
                <div class="mb-6">
                    <label
                        for="password"
                        class="inline-block text-lg mb-2"
                    >
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password"
                        value="{{ old('password') }}"
                        required
                    />   
                </div>
                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        const form = document.getElementById('form');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const errorElement = document.getElementById('uncorrect');
        form.addEventListener('submit',function(e){
            e.preventDefault();
            var data = JSON.stringify({
            'email': email.value,
            'password': password.value 
            });
            var config = {
            method: 'post',
            url: 'http://localhost/api/login',
            headers: { 
                'Accept': 'application/json', 
                'Content-Type': 'application/json'
            },
            data : data
            };
            axios(config)
            .then(function (response) {
                console.log(JSON.stringify(response.data));
                localStorage.setItem('token',response.data.token);
                window.location.replace("http://localhost/page1");
            })
            .catch(function (error) {
                console.log(error);
                if(error.message){
                    errorElement.innerHTML = 'Email or Password is incorrect';
                }
            }); 
      })
    </script>
@endsection