@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Companies Index</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif($message = Session::get('info'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @elseif($message = Session::get('mail'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of all Companies</h3>
                    <a href="{{ route('companies.create') }}"><input type="submit" value="Create new Porject" class="btn btn-primary float-right"></a><br><br>
                    <a href="{{ url('export') }}"><input type="submit" value="Export Data to Excel" class="btn btn-success float-right"></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Street</th>
                            <th>ZIP</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($company as $firma)
                        <tr>
                            <td>{{ $firma->id }}</td>
                            <td>{{ $firma->name }}</td>
                            <td>{{ $firma->first_name }}</td>
                            <td>{{ $firma->last_name }}</td>
                            <td>{{ $firma->street }}</td>
                            <td>{{ $firma->plz }}</td>
                            <td>{{ $firma->city }}</td>
                            <td class="row justify-content-start align-items-center">
                                <a href="{{ route('companies.edit',$firma->id) }}"><button class="btn btn-primary">edit</button></a>
                                <a href="{{ route('companies.show',$firma->id) }}"><button class="btn btn-secondary mx-3">show</button></a>
                                <form action="{{ route('companies.destroy',$firma->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>


                            </td>
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
