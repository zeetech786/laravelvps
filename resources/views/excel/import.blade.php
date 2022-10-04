@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Excel Import</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <form action="{{ url('users/excel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlFile1">Datei Hochladen</label>
                <input type="file" class="form-control-file" name="file">
            </div>
            <button type="submit" class="btn btn-dark">Upload</button>
        </form>
    </section>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of all Companies</h3>
                    <a href="{{ url('/users/sendmail') }}"><input type="submit" value="Send Email to All" class="btn btn-dark float-right"></a><br><br>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>E-mail</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($company as $firma)
                            <tr>
                                <td>{{ $firma->id }}</td>
                                <td>{{ $firma->first_name }}</td>
                                <td>{{ $firma->last_name }}</td>
                                <td>{{ $firma->email}}</td>
                                <td><a class="btn btn-dark btn-sm" href="{{ url('/users/sendmail',$firma->id) }}"><i class="fas fa-envelope"></i>  E-Mail  </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
