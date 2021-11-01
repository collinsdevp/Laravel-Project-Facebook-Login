
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
                    <div id="quote" style="background-color:white;color:white;">
                @if(isset($data["Global Quote"]["01. symbol"]))
                    {{$data["Global Quote"]["01. symbol"]}}
                    </div>

                    <div>
                    <ul>
                        <li>Stock Symbol : {{$data["Global Quote"]["01. symbol"]}}</li>
                        <li>High : {{$data["Global Quote"]["03. high"]}}</li>
                        <li>Low : {{$data["Global Quote"]["04. low"]}}</li>
                        <li>Price : {{$data["Global Quote"]["05. price"]}}</li>
                    </ul>
                    @if($id==0)

                    @else
                      <form action="{{route('home.storequote')}}" method="post" id="formsubmit">
                      @csrf
                     <input type="hidden"  name="symbol" value="{{$data['Global Quote']['01. symbol']}}">
                     <input type="hidden"  name="high" value="{{$data['Global Quote']['03. high']}}">
                     <input type="hidden"  name="low" value="{{$data['Global Quote']['04. low']}}">
                     <input type="hidden"  name="price" value="{{$data['Global Quote']['05. price']}}">
                      </form>
                    @endif
                      
                @else

                    <script>window.location.href = "http://localhost:8000/errorquote";</script>

                @endif
               </div>

                   <a href="{{route('home')}}"> <i class="fas fa-long-arrow-alt-left mx-1"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
window.addEventListener('load', function () {
        document.getElementById('formsubmit').submit();
})
</script>