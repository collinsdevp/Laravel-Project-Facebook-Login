@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="py-4 px-2 bg-green-400">
                    {{ __('You are logged in!') }}
                    </div>
                    <br/>
                    <div>
                    @if(session()->has('error'))
                    <div class="py-4 px-2 bg-red-300">{{session()->get('error')}}</div>
                    @endif
                    </div>

                    <br/><br/>
                    <h1>Enter Stock Quote: </h1>
                    <br/>
                    <form action="{{route('home.getquote')}}" method="post">
                        @csrf
                        <label  class="block text-gray-700 text-sm font-bold mb-2" for="quote">Stock Quote:</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="quote" type="text" placeholder="Stock Quote">
                       
                         <input type="submit" value="Get Quote" class="bg-gray-500 text-white font-bold py-2 px-4 rounded"/>
                         
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
