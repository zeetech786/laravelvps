@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Company</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">New Company</h3>

        </div>
        <div class="mt-5 me-5">
        <a href="{{ route('companies.index') }}"><input type="submit" value="Zurück zur Übersicht" class="btn btn-secondary float-right"></a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name / Company</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name"  placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" class="form-control" value="{{ old('street') }}" name="street" placeholder="Street">
                </div>
                <div class="form-group">
                    <label for="name">ZIP</label>
                    <input type="text" class="form-control" value="{{ old('plz') }}" name="plz" placeholder="Zip">
                </div>                <div class="form-group">
                    <label for="name">City</label>
                    <input type="text" class="form-control" value="{{ old('city') }}" name="city" placeholder="City">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </div>
            <!-- /.card-body -->
        </form>

    </div>
    </div>
    </div>
@endsection
