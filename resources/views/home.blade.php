@extends('frontlayout')
@section('content')
    
           <div class="row">
                <div class="col-md-9">
                   <div class="row mb-5">
                        @if(count($posts)>0)
                        @foreach($posts as $post)
                                <div class="col-md-4 m-1">
                                    <div class="card" style="width: 18rem;">
                                    <a href="{{url('detail/'.$post->id)}}"><img style="height:400px;overflow:hidden;" src="{{asset('imgs/thumb/'.$post->thumb)}}" class="card-img-top" alt="{{$post->title}}" /></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{url('detail/'.$post->id)}}">{{$post->title}}</a></h5>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                                @else
                                <p class="alert alert-danger">No Post Found</p>
                            @endif
                    </div>
                    <!--pagination-->
                    {{$posts->links()}}
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