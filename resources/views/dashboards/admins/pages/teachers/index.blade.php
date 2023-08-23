@extends('dashboards.admins.layout')
@section('page-body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teachers Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    {{-- <style>
      .json-output {
          background-color: #f7f7f7;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-family: 'Courier New', monospace;
          white-space: pre-wrap;
      }
  </style>
  
  <div class="json-output">
    {{ "Teachers Count => " . json_encode($countTeachers, JSON_PRETTY_PRINT) }}
    {{ "Teachers => " . json_encode($teachers, JSON_PRETTY_PRINT) }}
</div> --}}
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-person-chalkboard"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text font-weight-bold">All Teachers</span>
                    <span class="info-box-number">{{$countTeachers}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><a href="{{route('admin.teachers.create')}}"><i class="fa-solid fa-user-plus"></i></a></span>

                <div class="info-box-content">
                    <a href="{{route('admin.teachers.create')}}"><span class="info-box-text font-weight-bold">Add New Teacher</span></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                {{-- <span class="info-box-icon bg-info"><a href="{{route('api-get-teachers')}}"><i class="fa-solid fa-users"></i></a></span> --}}

                <div class="info-box-content">
                    <button id="btnData" onclick="getData('{{route('api-get-teachers')}}')" data-url="{{route('api-get-teachers')}}"><span class="info-box-text font-weight-bold">Get Teachers</span></button>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>


    <div class="card">
        <div class="card-header d-flex justify-content-between w-100">
            <h3 class="card-title">All Teachers In School</h3>
        </div>
        <!-- /.card-header -->


        <div class="card-body">
            <table id="example1 teachersDataTable" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>BirthDate</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tblBody">
                    @foreach ($teachers as $teacher)
                    <tr class="font-weight-bold">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->first_name }}</td>
                        <td>{{ $teacher->last_name }}</td>
                        <td>{{ $teacher->dob }}</td>
                        <td>{{ $teacher->gender }}</td>
                        <td>{{ $teacher->phone_number }}</td>
                        <td>
                            {{-- <a class="btn btn-success" href="{{ route('admin.teachers.show', ['teacher' => $teacher->id]) }}">
                            <i class="fas fa-eye"></i> Show
                            </a> --}}
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                                <i class="fas fa-eye"></i> Show
                            </button>
                            <a class="btn btn-primary" href="{{ route('admin.teachers.edit', ['teacher' => $teacher->id]) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a class="btn btn-danger" href="{{ route('admin.teachers.destroy', ['teacher' => $teacher->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-teacher-{{ $teacher->id }}').submit();">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form id="delete-teacher-{{ $teacher->id }}" action="{{ route('admin.teachers.destroy', ['teacher' => $teacher->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Teacher Name</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endpush
@push('scripts')
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true
            , "lengthChange": false
            , "searching": false
            , "ordering": true
            , "info": true
            , "autoWidth": false
            , "responsive": true
        , });
    });

</script>
@endpush
@endsection
