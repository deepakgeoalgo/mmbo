@extends('admin.layouts.app')

@section('title', 'User List Page')

@section('main_content')

@if($message = Session::get('success'))
<div class="alert alert-success" role="alert"> 
  <small>{{ $message }}</small>
</div>
@endif

    <!-- users list start -->   
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('invoice.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>Add Invoice</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Service</th>
                                            <th>Amount</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody> 
                                   @foreach($data as $key => $invoice)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $invoice->getUser->name }}</td>
                                            <td>{{ $invoice->getUser->phone }}</td>
                                            <td>{{ $invoice->getUser->city }}</td>
                                            <td>{{ $invoice->service }}</td>
                                            <td>{{ $invoice->price }}</td>
                                                                                        
                                            <td>
                                                <!-- <a href="{{ route('invoice.edit',$invoice->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a>
                                                <a href="{{ route('invoice.destroy',$invoice->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a> -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Service</th>
                                            <th>Amount</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <!-- users list ends -->

@endsection