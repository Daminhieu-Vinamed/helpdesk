@extends('admin.layout.master')
@section('title', 'List ticket')
@section('content')
    <div class="container-fluid">

        {{-- <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách câu hỏi</h6>
                <a href="{{ route('admin.questions.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-question" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('js/admin/question.js') }}" type="text/javascript"></script>
     <!-- Page level plugins -->
    <script src="{{asset('dist/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('dist/js/demo/datatables-demo.js')}}"></script>
@endpush
