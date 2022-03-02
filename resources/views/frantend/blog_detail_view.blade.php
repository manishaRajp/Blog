@extends('frantend.layouts.master')
<style>
    .anyClass {
        height: 200px;
        overflow-y: scroll;
    }
</style>
@section('content')
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
<div class="container">
    <div class="col-md-12 col-lg-12">
        <article class="post vt-post">
            <div class="row">
                <a href="{{ route('home') }}"> <button class="btn btn-warning"><i class="fa fa-thermometer-full"></i> | Go to Home</button></a>
                <br>
                <br>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                    <div class="post-type post-img">
                        <img src="{{asset('storage/profile/'.$blog['image'])}}" class="img-responsive" alt="image post">
                        </a>
                        <br>
                        <div class="dropright">
                            @if($blog->user_id == auth()->user()->id)
                            <h4>You Can Edit Your Blog Here </h4>
                            <button type="button" class="dropdown-toggle badge  " style="border: none; color: orange; font-size:20px;" data-toggle="dropdown">
                                &#x1F6E0; Edit</button>
                            <div class="dropdown-menu">
                                <h5 class="dropdown-header">Choise Is Yours</h5>
                                <a class="dropdown-item js_edit_comment" href="{{route('edit_blog',$blog->slug)}}">Edit</a>
                                <a class="dropdown-item js_delete_comment" data-token="{{ csrf_token() }}" href="{{route('delete_blog',$blog->slug)}}">Delete</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="author-info author-info-2">
                        <ul class="list-inline">
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <div class="caption">
                        <h3 class="md-heading"><a href="#">{{$blog->title}}</a></h3>
                        <p> {!!$blog->description!!} </p>
                    </div>
                    @if($like_user)
                    <a href="{{ route ('dislikes', $blog->id) }}"><button class="btn1" style="color:red"><i class="fa fa-heart"></i></button></a>
                    @else
                    <a href="{{ route ('like', $blog->id) }}" title=" {{ App\Models\Like::with('likes')->where('blog_id', $blog->id)->count() }}"> <button class="btn1"><i class="fa fa-heart"></i></button></a>
                    @endif
                    <a href="#textarea"><button class="btn2" title="{{ App\Models\Comment::with('blogComment')->where('blog_id', $blog->id)->count() }}"><i class=" fa fa-comment"></i></button></a>
                    <br>
                    </br>
                    <form method="post" action="{{route('submit_comment',$blog->id)}}">
                        @csrf
                        <div class="form-group">
                            <textarea id="textarea" class="status-box" name="comment" rows="3" cols="60" placeholder="Enter your comment here..."></textarea>
                            <input type="submit" name="post" class="btn btn-primary" value="POST" title="Post YOur Comment">
                        </div>
                        <div class="button-group pull-CENTERt anyClass">
                            @foreach($blog->blogComment as $comment_details)
                            <div class="col-10 details comment_parent_div ">
                                <div class="dropright float-right">
                                    <button type="button" class="dropdown-toggle float-right" style="border: none; color: red; font-size:20px;" data-toggle="dropdown" title="click here to edit comment">
                                    </button>
                                    <div class="dropdown-menu">
                                        <h5 class="dropdown-header">Action</h5>
                                        <a class="dropdown-item js_edit_comment" href="#">Edit</a>
                                        <a class="dropdown-item js_delete_comment" data-token="{{ csrf_token() }}">Delete</a>
                                    </div>
                                </div>
                                <div class="overflow-auto">
                                    <h6>{{$comment_details->name}}</h6>
                                    <small>{{$comment_details->created_at}}</small>
                                    <p class="my_comment_id" hidden></p>
                                    <b>
                                        <p class="my_comment">{{$comment_details->comment}}</p>
                                    </b>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </div>
</div>
@endsection