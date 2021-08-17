@extends('admin.layouts.master')



@section('head')
<title>Options of Product</title>
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-ms-4 ml-2">
                        <h1><i class="fa fa-filter" aria-hidden="true"></i>&nbsp; Options</h1>
                    </div>
                    <div class="col-ms-4 ml-2">
                        <a href="{{ route('option.create') }}">
                            <button type="button" class="btn btn-block btn-outline-info">Add New Options</button>
                        </a>
                    </div>
                    <div class="col-ms-4 ml-2">
                        <button type="button" class="btn btn-block btn-outline-info" data-toggle="modal" data-target="#exampleModal">Remove All Options</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Options</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        @include('error.index')
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 50px">Number</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="text-align: center">Related Product</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="text-align: center">Option Name</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="text-align: center">Option Value</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="text-align: center">tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $key=>$product )
                                            <tr {{ $key/2 === 0 ? 'class="even"':'class="odd"' }}>
                                                <td rowspan="{{ $product->options->count() }}" class="dtr-control sorting_1 text-center" tabindex="0" style="text-align: center">{{ ++$key}}</td>
                                                <td rowspan="{{ $product->options->count() }}" class="text-center">{{ $product->name}}</td>
                                                <td class="text-center">
                                                    {{ $product->options[0]->option_name }}
                                                </td>
                                                <td class="text-center">
                                                    @foreach (unserialize($product->options[0]->option_value) as $val )
                                                    {{ $val.'-'  }}
                                                    @endforeach

                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('option.edit', $product->options[0]->id ) }}">
                                                        <i class="fa fa-pencil-square" aria-hidden="true" style="color: rgb(119, 0, 255)"></i>
                                                    </a>
                                                    <a href="" data-toggle="modal" data-target="#deleteModal" data-optionid="{{ $product->options[0]->id  }}"><i class="fa fa-trash" style="color: rgb(199, 53, 53)"></i></a>
                                                </td>
                                            </tr>
                                            @for($i=1;$i<$product->options->count();$i++)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $product->options[$i]->option_name }}
                                                    </td>
                                                    <td class="text-center">
                                                        @foreach (unserialize($product->options[$i]->option_value) as $val)
                                                        {{ $val.'-' }}
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('option.edit', $product->options[$i]->id) }}">
                                                            <i class="fa fa-pencil-square" aria-hidden="true" style="color: rgb(119, 0, 255)"></i>
                                                        </a>
                                                        <a href="" data-toggle="modal" data-target="#deleteModal" data-optionid="{{ $product->options[$i]->id }}"><i class="fa fa-trash" style="color: rgb(199, 53, 53)"></i></a>
                                                    </td>
                                                </tr>
                                                @endfor
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    {{-- modal for single delete --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete
                        this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    select "delete" if you want to delete this Option?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                    <form action="" method="POST">
                        @method('DELETE')
                        @csrf
                        {{-- <input type="hidden" id="user_id" name="user_id" value=""> --}}
                        <a href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal for major delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure for delete All Opions?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                <form action="" method="POST">
                    @method('POST')
                    @csrf
                    {{-- <input type="hidden" id="user_id" name="user_id" value=""> --}}
                    <a href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
    let alert = document.querySelector('.alert');
    if (alert) {
        setInterval(() => {
            alert.remove();
        }, 5000);
    }
    //script for submit form Major delete action
    $('#exampleModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let recipient = button.data('whatever')
        let modal = $(this)
        modal.find('form').attr('action', 'option-deleteAll')
    })


    //script for submit form single delete action
    $('#deleteModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let option_id = button.data('optionid')

        let modal = $(this)
        //   modal.find('.modal-footer #userId').val(userId)
        modal.find('form').attr('action', 'option/' + option_id)
    })

    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false

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
@endsection