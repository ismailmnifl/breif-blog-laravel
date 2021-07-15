@extends('frontlayout')
@section('content')
    
           <div class="row">
                <div class="col-md-9">
                    @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                    @endif
                    <div class="card">
                        <h5 class="card-header">
                            {{$detail->title}}
                        </h5>
                        <img src="{{asset('imgs/full/'.$detail->full_img)}}" class="card-img-top" alt="{{$detail->title}}">
                        <div class="card-body">
                            {{$detail->detail}}
                        </div>
                    </div>
                    @auth
                        <!-- Add Comment -->
                        <div class="card my-5">
                            <h5 class="card-header">Add Comment</h5>
                            <div class="card-body">
                                <form method="post" action="{{url('save-comment/'.$detail->id)}}">
                                @csrf
                                <textarea name="comment" class="form-control"></textarea>
                                <input type="submit" class="btn btn-dark mt-2" />
                            </div>
                        </div>
                    @endauth
                
                <!-- Fetch Comments -->
				<div class="card my-4">
					<h5 class="card-header">Comments <span class="badge badge-dark">{{count($detail->comments)}}</span></h5>
					<div class="card-body">
						@if($detail->comments)
							@foreach($detail->comments as $comment)
								<blockquote class="blockquote">
								  <p class="mb-0">{{$comment->comment}}</p>
                                  @if($comment->user_id==0)
								  <footer class="blockquote-footer">Admin</footer>
								  @else
								  <footer class="blockquote-footer">{{$comment->user->name}}</footer>
								  @endif
								</blockquote>
                                <hr>
							@endforeach
						@endif
					</div>
				</div>
                </div>
                <div class="col-md-3">
                    <!--search-->
                    <div class="card mb-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control"/>
                                <button class="btn btn-dark" type="button">Button</button>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header">Recent Post</h5>
                            <div class="list-group list-group-flush">
                                    @if($recent_posts)
                                        @foreach($recent_posts as $post)
                                            <a href="#" class="list-group-item">{{$post->title}}</a>
                                        @endforeach
						            @endif

                            </div>
                            </div>
                    </div>
                </div>
           </div>
@endsection