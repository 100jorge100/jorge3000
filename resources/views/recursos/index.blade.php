@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h3>Gestion de Recursos</h3> --}}
@stop

@section('content')
<h3 class="text-center">Gestion de Recursos</h3>
{{-- Add Modal --}}
<div class="modal fade" id="AddRecursoModal" tabindex="-1" aria-labelledby="AddRecursoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddRecursoModalLabel">Agregar Recurso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <select id="id_comunidads" class="id_comunidad form-control">
                            <option value="">-- Escoja la Comunidad --</option>
                            @foreach ($comunidads as $comunidad)
                                <option value="{{ $comunidad['id'] }}">{{ 'POA de la Comunidad de ' . $comunidad['nombre'] }}</option>
                            @endforeach
                        </select>
                        <input type="text" id="nombres" required class="nombre form-control" placeholder="name@example.com">
                        <label for=""><i class="fas fa-file-alt"> Nombre</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" required class="descripcion form-control" placeholder="name@example.com">
                        <label for=""><i class="fas fa-file-alt"> Descripción</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="date" required class="gestion form-control" placeholder="name@example.com">
                        <label for=""><i class="fas fa-calendar-alt"> Gestión</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="number" step="0.01" min="0" required class="monto form-control" placeholder="name@example.com">
                        <label for=""><i class="fas fa-coins"> Monto/Bs.</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        {{-- <input type="text" required class="estado form-control" placeholder="name@example.com"> --}}
                        <select class="estado form-control" aria-label="Default select example">
                            <option value="">-- Escoja el Estado --</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                        <label for=""><i class="fas fa-info-circle"> Estado</i></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success add_recurso">Guardar Recurso</button>
            </div>
        </div>
    </div>
</div>
{{-- End add modal --}}

{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Recuros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="recu_id" />

                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="nombre" required class="form-control">
                        <label for=""><i class="fas fa-file-alt"> Nombre</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="descripcion" required class="form-control">
                        <label for=""><i class="fas fa-file-alt"> Descripción</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="date" id="gestion" required class="form-control">
                        <label for=""><i class="fas fa-calendar-alt"> Gestión</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="monto" required class="form-control">
                        <label for=""><i class="fas fa-coins"> Monto/Bs.</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <select id="estado" required class="form-control" aria-label="Default select example">
                            <option value="">-- Escoja el Estado --</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                        <label for=""><i class="fas fa-info-circle"> Estado</i></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success update_recurso">Actualizar el Registro Recurso</button>
            </div>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirme para eliminar el Registro ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary delete_recurso">Eliminar Registro</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

{{-- Tabla index2 recursos --}}
<div class="container py-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        @can('crear-recurso')
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                            data-bs-target="#AddRecursoModal"><i class="fas fa-plus">Agregar Nuevo Recurso</i></button>
                        @endcan

                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered display dt-responsive nowrap" style="width:100%" id="tabla-recursos">
                        <thead style="background-color:purple">
                            <tr>
                                <th class="text-center"><i>#</i></th>
                                <th class="text-center"><i>Nombre</i></th>
                                <th class="text-center"><i>Descripción</i></th>
                                <th class="text-center"><i>Gestión</i></th>
                                <th class="text-center"><i>Monto/Bs.</i></th>
                                <th class="text-center"><i>Estado</i></th>
                                <th class="text-center"><i>Acciones</i></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Tabla index2 final --}}

@stop



@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
{{-- librearias css para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html inicio--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
{{-- librearias css para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html final--}}

{{-- librearias css para datatable resñponsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html final--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
{{-- librearias css para datatable resñponsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html final--}}

    <style>
        .modal-header{
            background: purple;
            text-align: center;
        }
    </style>
@stop

@section('js')

<script>
    console.log('Hi!');
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
{{-- librearias js para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html inicio--}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
{{-- librearias js para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html inicio--}}

{{-- librearias js para datatable responsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html inicio--}}
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
{{-- librearias js para datatable responsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html inicio--}}

    <script>
        $(document).ready(function () {

            fetchRecurso();
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

            function fetchRecurso() {

                $.ajax({
                    type: "GET",
                    url: "/fetch-recursos",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.recursos, function (key, item) {
                           var estado = item.estado == 'activo' ? '<button type="button" class="btn btn-success text-center" style="width: 70px; height: 30px; line-height: 15px; padding: 5px 0; border-radius: 10px;">Activo</button>' : '<button type="button" class="btn btn-danger text-center" style="width: 70px; height: 30px; line-height: 15px; padding: 5px 0; border-radius: 10px;">Inactivo</button>';
                            $('tbody').append('<tr>\
                                <td>' + item.id + '</td>\
                                <td>' + item.nombre + '</td>\
                                <td>' + item.descripcion + '</td>\
                                <td>' + item.gestion + '</td>\
                                <td>' + item.monto + '</td>\
                                <td>' + estado + '</td>\
                                <td>@can('editar-recurso')<button type="button" value="' + item.id + '" class="btn btn-warning editbtn btn-sm"><i class="fas fa-pen"></i></button>@endcan @can('eliminar-recurso')<button type="button" value="' + item.id + '" class="btn btn-secondary deletebtn btn-sm"><i class="fas fa-trash"></i></button>@endcan</td>\
                            \</tr>');
                        });
                        ////////////////
                        $(document).ready(function() {
                            $('#tabla-recursos').DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'excel',
                                        text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
                                        className: 'btn btn-success',
                                        exportOptions: {
                                            columns: [0,1,2] // Aquí puedes especificar las columnas que deseas exportar a Excel
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        text: '<i class="fas fa-file-pdf"></i> Exportar a PDF',
                                        className: 'btn btn-danger',
                                        exportOptions: {
                                            columns: [0,1,2,3,4] // Aquí puedes especificar las columnas que deseas exportar a PDF
                                        }
                                    },
                                    {
                                        extend: 'print',
                                        text: '<i class="fas fa-print"></i> Imprimir',
                                        className: 'btn btn-secondary',
                                        exportOptions: {
                                            columns: [0,1,2] // Aquí puedes especificar las columnas que deseas imprimir
                                        }
                                    }
                                ]
                            } );
                        } );
                        ////////////////
                    }
                });

            }

            $(document).on('click', '.add_recurso', function (e) {
                e.preventDefault();

                $(this).text('Cargando..');

                var data = {
                    'nombre': $('.nombre').val(),
                    'descripcion': $('.descripcion').val(),
                    'gestion': $('.gestion').val(),
                    'monto': $('.monto').val(),
                    'estado': $('.estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/recursos",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_recurso').text('Guardando');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddRecursoModal').find('input').val('');
                            $('.add_recurso').text('Save');
                            $('#AddRecursoModal').modal('hide');
                            fetchRecurso();
                            toastr.success('El Registro se Creo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var recu_id = $(this).val();
                // alert(recu_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-recurso/" + recu_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            // console.log(response.student.name);
                            $('#nombre').val(response.recurso.nombre);
                            $('#descripcion').val(response.recurso.descripcion);
                            $('#gestion').val(response.recurso.gestion);
                            $('#monto').val(response.recurso.monto);
                            $('#estado').val(response.recurso.estado);
                            $('#recu_id').val(recu_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_recurso', function (e) {
                e.preventDefault();

                $(this).text('Actualizando..');
                var id = $('#recu_id').val();
                // alert(id);

                var data = {
                    'nombre': $('#nombre').val(),
                    'descripcion': $('#descripcion').val(),
                    'gestion': $('#gestion').val(),
                    'monto': $('#monto').val(),
                    'estado': $('#estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-recurso/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.update_recurso').text('Actualizado');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_recurso').text('Update');
                            $('#editModal').modal('hide');
                            fetchRecurso();
                            toastr.success('El Registro se Actualizo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var recu_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(recu_id);
            });

            $(document).on('click', '.delete_recurso', function (e) {
                e.preventDefault();

                $(this).text('Eliminando..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-recurso/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_recurso').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_recurso').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchRecurso();
                            toastr.success('El Registro se Elimino exitosamente','Success');
                        }
                    }
                });
            });

        });
    </script>

<script>
    $(document).ready(function() {
        $('#id_comunidads').on('change', function() {
            var selectedComunidad = $(this).find('option:selected').text();
            $('#nombres').val(selectedComunidad);
            $('#nombres').attr('title', 'Comunidad seleccionada: ' + selectedComunidad);
        });
    });
</script>

@stop
