@extends('layouts.admin.master')

@section('title', 'Categories')

@section('content')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Category List
                            <small>Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <button type="button" class="btn btn-primary"  onclick="location.href='{{ route('admin.category.create') }}'">Add category</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add New Category</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.category.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                    <input class="form-control" name="name" id="validationCustom01" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Category Slug :</label>
                                                    <input class="form-control" name="slug" id="validationCustom01" type="text">
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="validationCustom02" class="mb-1">Category Photo :</label>
                                                    <input class="form-control" name="photo" id="validationCustom02" type="file">
                                                </div>
                                                <div class="row">
                                                    
                                                    <label for="validationCustom0" class="col-xl-3 col-md-4"> Status :</label>
                                                    
                                                    <div class="col-xl-9 col-sm-8">
                                                        <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                            <label class="d-block" for="edo-ani1">
                                                                <input class="radio_animated" id="edo-ani1" type="radio" value="1" name="active" checked>
                                                                active
                                                            </label>
                                                            <label class="d-block" for="edo-ani2">
                                                                <input class="radio_animated" id="edo-ani2" type="radio" value="0" name="active">
                                                                inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Category Details</h5>
            </div>
            @include('layouts.admin.includes.alerts.success')
            @include('layouts.admin.includes.alerts.errors')
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                    <tr>
                        <th>Category photo</th>
                        <th>Category Name</th>
                        <th>Category status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            <div class="d-flex vendor-list">
                                <img src="{{ $category->photo_url }}" alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                <span>{{ $category->slug }}</span>
                            </div>
                        </td>
                        
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->active }}</td>
                        
                        <td>
                            <div>
                                <a href="{{ route('admin.category.edit', $category->id) }}"><i class="fa fa-edit mr-2 font-success"></i></a>
                                <a href="#" data-categoryid="{{ $category->id }}" data-toggle="modal" data-target="#{{$category->id}}"><i class="fa fa-trash font-danger"></i></a>
                            </div>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST" action="{{ route('admin.category.destroy', $category->id) }}">
                              @csrf
                              @method('DELETE')

                              <div class="modal-body">
                                <p class="text-center">Are you sure you want to delete {{ $category->name }} category?</p>
                                
                                
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes, delete</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection