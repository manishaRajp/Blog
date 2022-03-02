<!-- here show welcome page -->

@extends('frantend.layouts.master')

@section('content')
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
<section class="page-section1" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading  text-uppercase" style="color:black;">**** blog ****</h2>
        </div>
        <ul class="timeline">
            <!-- here add a condition if user login than dont show the login on click like button -->
            @if(auth()->user())
            @if(count($blogs))
            @foreach($blogs as $key => $value)
            <li class="{{($key%2 ==0) ? 'timeline-inverted' : '' }}">
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{asset('storage/profile/'.$value['image'])}}" alt="..." />
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <a href="{{ route('detail-blog', $value->slug) }}">
                            <h4 class="red-text" style="color: black;">{{ ($value->created_at) }}</h4>
                        </a>
                        <h3 style=" color:black; font-size:20px">Writen By ME:-{{ ($value->user_id) }} </h3>
                        <a href="{{ route('home') }}">
                            <h4 class="text-uppercase" style="color:black; font-size:18px"> {{ ($value->title) }}</h4>
                        </a>
                    </div>
                    <div class="timeline-body">
                        <!-- <a href="{{ route ('like', $value->id) }}"><button class="btn1"><i class="fa fa-heart"></i></button></a> -->
                        <a href="{{ route ('home') }}"><button class="btn1"><i class="fa fa-heart"></i></button></a>
                    </div>
                </div>
            </li>
            @endforeach
            @else
            <p>no blog found</p>
            @endif
            @else
            @if(count($blogs))
            @foreach($blogs as $key => $value)
            <li class="{{($key%2 ==0) ? 'timeline-inverted' : '' }}">
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="{{asset('storage/profile/'.$value['image'])}}" alt="..." />
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <a href="{{ route('login') }}">
                            <h4 class="red-text" style="color: black;">{{ ($value->created_at) }}</h4>
                        </a>
                        <h3 style=" color:black; font-size:20px">Writen By ME:-{{ ($value->user_id) }} </h3>
                        <a href="{{ route('login') }}">
                            <h4 class="text-uppercase" style="color:black; font-size:18px"> {{ ($value->title) }}</h4>
                        </a>
                    </div>
                    <div class="timeline-body">
                        <a href="{{ route('login') }}"><button class="btn1"><i class="fa fa-heart"></i></button></a>
                    </div>
                </div>
            </li>
            @endforeach
            @else
            <p>no blog found</p>
            @endif
            @endif
        </ul>
    </div>
    <br>
    <br>
</section>
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
@endsection