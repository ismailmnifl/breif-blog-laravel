@extends('userpostlayout')
@section('content')
            <div id="layoutSidenav_content">
                
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-3">
                            <div class="card-header">
                              <i class="fas fa-table"></i> Posts
                              <a href="{{route('userDash.create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>detail</th>
                                      <th>Image</th>
                                      <th>Full</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>Detail</th>
                                      <th>Image</th>
                                      <th>Full</th>
                                      <th>Action</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                      @foreach($data as $post)
                                      <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->detail}}</td>
                                        <td><img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width="100" /></td>
                                        <td><img src="{{ asset('imgs/full').'/'.$post->full_img }}" width="100" /></td>
                                        <td>
                                          <a class="btn btn-info btn-sm" href="{{route('postup',$post->id)}}">Update</a>
                                          <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{route('postdel',$post->id)}}">Delete</a>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                          </div>
                    </div>
@endsection
              