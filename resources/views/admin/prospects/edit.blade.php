@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>Edit Prospect <small class="text-muted">{{ $prospect->name }}</small></h1>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('admin.prospects.dashboard') }}">View
                                        Dashboard</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.prospects.show', ['prospect' => $prospect->id]) }}">View
                                        Prospect</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Update their name, email and profile_image --}}
        <div class="row">
            <div class="col-sm-4">
                {{-- Placeholder for image and option to change out just the image --}}
                <div class="card mt-3">
                    <div class="card-body">
                        @if ($prospect->profile_image)
                            <img src="{{ Storage::url($prospect->profile_image) }}" alt="">
                        @else
                            <img src="/images/user.png" style="max-width:100%" alt="">
                        @endif
                        <hr>
                        <button class="btn btn-outline-primary btn-sm btn-block">New Profile Image</button>
                        <button class="btn btn-outline-danger btn-sm btn-block"><i class="fas fa-trash"></i>Delete Profile Image</button>

                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Edit Personal Details</h5>
                        <hr>
                        @if ($errors->count())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.prospects.update',['prospect'=>$prospect->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $prospect->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $prospect->email}}">
                            </div>
                            <button class="btn btn-primary float-right">Update Prospect</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Update or add their address and contact details --}}
    </div>
@endsection
