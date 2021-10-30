@extends('admin.layouts.app')

@section('title', 'User Create')

@section('main_content')

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">    
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @break
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <!-- users create start -->    
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Invoice</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- users account form start -->
                            <form action="{{ route('invoice.store') }}" method="POST" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Customer Name</label>
                                                <select class="form-control" name="user">
                                                    <option value="null">Select Customer</option>
                                                    @foreach($users as $key => $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Service</label>
                                                <input type="text" class="form-control" placeholder="Service name" name="service" value="{{ old('service') }}" required data-validation-required-message="This service field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Amount</label>
                                                <input type="number" class="form-control" placeholder="Amount" name="price" value="{{ old('price') }}" required data-validation-required-message="This amount field is required">
                                            </div>
                                        </div>                                                                               
                                        <div class="col-12 d-flex flex-sm-row flex-column mt-3">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-1">Save</button>
                                            <a href="{{ route('invoice.index') }}" class="btn btn-info">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- users account form ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- users create ends -->

@endsection

@section('page-script')

@endsection