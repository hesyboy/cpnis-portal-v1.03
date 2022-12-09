@extends('layouts.master')

@section('content')





<div class="h-screen w-full flex items-center justify-center ">
    <div class="w-full md:w-1/4">
        <div class=" bg-slate-800 rounded-xl px-5 py-3">

          <form  action="{{route('login')}}" method="post" class="">
            @csrf
            <h4 class="text-5xl font-semibold text-center text-slate-300">CPNIS Portal</h4>

            <p class="mb-8 text-center text-xl font-semibold my-3 text-slate-200">Please login to your account</p>

            <div class="grid grid-cols-1 gap-2 my-2">
                @foreach ($errors->all() as $error)
                    <div class="text-xs bg-red-200 text-red-500 px-2 py-2 rounded">
                        {{$error}}
                    </div>
                @endforeach
            </div>

            <div class="mb-4">
              <input
                type="text" name="email"
                class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-md transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                @error('email')
                    border-red-500
                @enderror"
                id="exampleFormControlInput1"
                placeholder="Username"
              />
            </div>
            <div class="mb-4">
              <input
                type="password" name="password"
                class="form-control block w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-md transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                @error('password')
                    border-red-500
                @enderror"
                id="exampleFormControlInput1"
                placeholder="Password"
              />
            </div>
            <div class="text-center my-3">
              <button
                class="inline-block px-6 py-4 bg-emerald-600 text-white font-medium leading-tight uppercase rounded-md shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                type="submit"
              >
                Log in
              </button>
              <a href="/register" class="block w-full p-3 bg-gray-900 text-white rounded-md" >Create New Account</a>

              {{-- <a class="text-gray-500" href="#!">Forgot password?</a> --}}
            </div>
            {{-- <div class="flex items-center justify-between pb-6">
              <p class="mb-0 mr-2">Don't have an account?</p>
              <button
                type="button"
                class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
              >
                Danger
              </button>
            </div> --}}
          </form>
        </div>
      </div>
</div>








@endsection

















