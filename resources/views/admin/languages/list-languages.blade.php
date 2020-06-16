@extends('layouts.admin.master')

@section('title', 'Languages')

@section('content')



<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Languages List
                            <small>Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Languages</li>
                        <li class="breadcrumb-item active">Languages List</li>
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
                <h5>Languages Details</h5>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                    <tr>
                        <th>Language</th>
                        <th>abbr</th>
                        <th>locale</th>
                        <th>direction</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)    
                    <tr>                        
                        <td>{{ $language->name }}</td>
                        <td>{{ $language->abbr }}</td>
                        <td>{{ $language->locale }}</td>
                        <td>{{ $language->direction }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.language.edit', $language->id) }}"><i class="fa fa-edit mr-2 font-success"></i></a>
                                <a href=""><i class="fa fa-trash font-danger"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection