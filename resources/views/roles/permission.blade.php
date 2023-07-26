@extends('layouts.vertical')

@push('head-scriptTwo')
    <script src="{{ asset('assets/js/pages/components_modals.js') }}"></script>
@endpush

@section('content')
    <div class="mb-3">
        <h6 class="mb-0">{{ $title }} inside the system</h6>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="text-end">
                <button type="button" class="btn btn-success btn-md" data-bs-toggle="modal" data-bs-target="#modal_form_horizontal">
                    <i class="ph-plus me-2"></i> Add Permission
                </button>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $model => $items)
                    <tr>
                        <td rowspan="{{ $items->count() }}">{{ $loop->iteration }}</td>
                        <td rowspan="{{ $items->count() }}">{{ $model }}</td>
                        <td>{{ $items->first()->description }}</td>

                        <td>
                            <a href='#' class="text-danger"><i class="ph-trash me-1"></i></a>
                        </td>
                    </tr>
                    @foreach($items->slice(1) as $item)
                        <tr>
                            <td>{{ $item->description  }}</td>
                            <td>
                                <a href='#' class="text-primary"><i class="ph-pen me-1"></i></a>
                                <a href='#' class="text-danger"><i class="ph-trash me-1"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@push('modal')
    <div id="modal_form_horizontal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                </div>

                <div class="model-body d-none">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger border-0 alert-dismissible fade show">
                                <span class="fw-semibold">Oops!</span>
                                <ul>
                                    <li>Error</li>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    </div>
                </div>


                <form class="form-horizontal" id="save-permission">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-form-label col-sm-3">Model</label>
                            <div class="col-sm-9">
                                {{-- // TODO create a select input and highlight all the models involved  --}}
                                <input type="text" name="model" class="form-control"/>

                                {{-- <select name="model" id="model" class="form-control">
                                    <option> Select Model </option>
                                    <option value="User">User</option>
                                    <option value="Permission">Permission</option>
                                </select> --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label col-sm-3">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="store-permission">
                            <i class="ph-circle-notch spinner me-2 d-none"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <div id="modal_form_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
                </div>

                <div class="model-body d-none">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger border-0 alert-dismissible fade show">
                                <span class="fw-semibold">Oops!</span>
                                <ul>
                                    <li>Error</li>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    </div>
                </div>


                <form class="form-horizontal" id="save-permission">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label class="col-form-label col-sm-3">Model</label>
                            <div class="col-sm-9">
                                {{-- // TODO create a select input and highlight all the models involved  --}}
                                <input type="text" name="model" class="form-control"/>

                                {{-- <select name="model" id="model" class="form-control">
                                    <option> Select Model </option>
                                    <option value="User">User</option>
                                    <option value="Permission">Permission</option>
                                </select> --}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-form-label col-sm-3">Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="store-permission">
                            <i class="ph-circle-notch spinner me-2 d-none"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush


@push('scripts')
    <script>
        $('#save-permission').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var $myButton = $('#store-permission');

            $.ajax({
                type: 'POST',
                url: '{{ route("permission.store") }}',
                data: formData,
                beforeSend: function(){
                    $myButton.attr('disabled', 'disabled');
                    $myButton.find('.spinner').removeClass('d-none'); // Remove the 'd-none' class to display the spinner
                    $myButton.html('<i class="ph-circle-notch spinner me-2"></i>Loading...'); // Update button text
                },
                success: function(response) {
                    const { status, errors } = response;

                    if (status === 200) {
                        location.reload();
                    } else {
                        $('.model-body').removeClass('d-none');
                        $('.alert').removeClass('alert-success').addClass('alert-danger');
                        $('.alert span').text('Something went wrong');
                        $('.alert ul').empty();

                        $.each(errors, function(field, messages) {
                            $.each(messages, function(index, message) {
                                $('.alert ul').append('<li>' + message + '</li>');
                            });
                        });
                    }

                },
                error: function(response) {
                    console.log(response.status);
                },
                complete: function(){
                    $myButton.removeAttr('disabled');
                    $myButton.find('.spinner').addClass('d-none'); // Add the 'd-none' class to hide the spinner
                    $myButton.html('<i class="ph-circle-notch spinner me-2 d-none"></i>Submit'); // Restore button text
                }
            });
        });

    </script>
@endpush
