@extends('userpostlayout')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="container-fluid">

                            <!-- Breadcrumbs-->
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                              </li>
                              <li class="breadcrumb-item active">Overview</li>
                            </ol>
                  
                  
                            <!-- DataTables Example -->
                            <div class="card mb-3">
                              <div class="card-header">
                                <i class="fas fa-table"></i> Add Post
                                <a href="{{route('userDash.index')}}" class="float-right btn btn-sm btn-dark">All Data</a>
                              </div>
                              <div class="card-body">
                                <div class="table-responsive">
                                    
                                    @if($errors)
                                    @foreach($errors->all() as $error)
                                      <p class="text-danger">{{$error}}</p>
                                    @endforeach
                                  @endif
                  
                                  @if(Session::has('success'))
                                  <p class="text-success">{{session('success')}}</p>
                                  @endif
                  
                                  <form method="post" action="{{route('userDash.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-bordered">
                                      <tr>
                                        <th>Category<span class="text-danger">*</span></th>
                                        <td>
                                          <select class="form-control" name="category">
                                            @foreach($cats as $cat)
                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @endforeach
                                          </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Title<span class="text-danger">*</span></th>
                                        <td><input type="text" name="title" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <td><input type="file" name="post_thumb" /></td>
                                    </tr>
                                    <tr>
                                        <th>Full Image</th>
                                        <td><input type="file" name="post_image" /></td>
                                    </tr>
                                    <tr>
                                        <th>Detail<span class="text-danger">*</span></th>
                                        <td>
                                          <textarea class="form-control" name="detail"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tags</th>
                                        <td>
                                          <textarea class="form-control" name="tags"></textarea>
                                        </td>
                                    </tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />
                                            </td>
                                        </tr>
                                    </table>
                                  </form>
                                </div>
                              </div>
                              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                  
                          </div>
                    </div>
                </main>
@endsection