@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

                <h1>Company Details</h1>
            </div>
            <div class="mt-5 me-5">
                <a href="{{ route('companies.index') }}"><input type="submit" value="Zurück zur Übersicht" class="btn btn-secondary float-right"></a>
            </div>
        </div>

    </div><!-- /.container-fluid -->

</section>

<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $company->name }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $company->first_name }}
                        {{ $company->last_name }}<br>
                        {{ $company->street }}<br>
                        {{ $company->plz }}<br>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{ $company->city }}
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
