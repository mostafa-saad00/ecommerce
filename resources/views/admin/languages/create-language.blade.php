@extends('layouts.admin.master')

@section('title', 'Create Language')

@section('content')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Create Language
                            <small>Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Languages </li>
                        <li class="breadcrumb-item active">Create Language </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add Language</h5>
                    </div>
                    @include('layouts.admin.includes.alerts.success')
                    @include('layouts.admin.includes.alerts.errors')
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Language info</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <form action="{{ route('admin.language.store') }}" method="POST" class="needs-validation user-add">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Abbr</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" name="abbr">
                                        @error('abbr')
                                        <div class="col-xl-3 col-md-4"></div>
                                        <span class="text-danger"><span>*</span>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Locale</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom1" name="locale" type="text">
                                        @error('locale')
                                        <div class="col-xl-3 col-md-4"></div>
                                        <span class="text-danger"><span>*</span>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Name</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom0" name="name" type="text">
                                        @error('name')
                                        <div class="col-xl-3 col-md-4"></div>
                                        <span class="text-danger"><span>*</span>{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Direction</label>
                                        <select class="custom-select col-md-7" name="direction">
                                            <option value="ltr">ltr</option>
                                            <option value="rtl">rtl</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        
                                        <label for="validationCustom0" class="col-xl-3 col-md-4"><span style="color: red">*</span> Status</label>
                                        
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
                                    
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    
                                </form>
                            </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection