@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Yajra Data Tables</h1>
                    <a href="{{ route('companies.create') }}"><input type="submit" value="Create new Porject" class="btn btn-primary float-right"></a><br><br>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <table class="table table-bordered myTable">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th class="text-center">Street</th>
            <th class="text-center">PLZ</th>
            <th class="text-center">City</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script type="text/javascript">
        $(function () {
            var table = $('.myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                colReorder: true,
                stateSave: true,
                "pageLength": 5,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv"></i>',
                        titleAttr: 'Export to CSV',
                    },
                    {
                        extend: 'pageLength',
                        text: '<i class="far fa-file"></i>',
                        titleAttr: 'Page lenght',
                    },

                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i>',
                        titleAttr: 'Hide Columns',
                    },

                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Print',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6],
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Export to Excel',
                    },

                ],
                ajax: "{{ url('yajra') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'street', name: 'street'},
                    {data: 'plz', name: 'plz'},
                    {data: 'city', name: 'city'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, printable : false},
                ]
            });
        });
    </script>

@endsection

