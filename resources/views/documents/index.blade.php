@extends('layouts.layout')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Documents</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Documents</h4>
                            <p class="card-title-desc">The added documents can be viewed here.Click on document name to view/download</p>

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Expiry date</th>
                                    <th>Uploaded date</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($documents as $document)
                                        <tr>
                                            <td><a href="{{ asset('storage/documents/' . $document->document_name) }}" target="_blank">{{ $document->document_name }}</a></td>
                                            <td>{{ $document->category }}</td>
                                            <td>{{ $document->document_type }}</td>
                                            <td>{{ $document->document_size }}</td>
                                            <td>{{ $document->expiry_date }}</td>
                                            <td>{{ $document->created_at }}</td>
                                            <td><a class="btn btn-danger" href="{{ route('deleteDocument', $document->id) }}" onclick="return confirm('Are you sure you want to delete this document?')">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
@endsection