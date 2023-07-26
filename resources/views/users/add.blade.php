@extends('layouts.vertical')

@push('head-script')
<script src="{{ asset('assets/js/components/forms/selects/select2.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
<script src="{{ asset('assets/js/pages/form_select2.js') }}"></script>
<script src="{{ asset('assets/js/pages/components_progress.js') }}"></script>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">

            <form class="mb-4" id="user-registration-form">
                @csrf
                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">First Name <span class="text-danger">*</span> </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="firstname" placeholder="Enter firstname..." required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">Middle Name </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="middlename" placeholder="Enter middlename...">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">Last Name <span class="text-danger">*</span> </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="lastname" placeholder="Enter lastname..." required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">Email <span class="text-danger">*</span> </label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control" name="email" placeholder="Enter email..." required>
                        <div class="error text-danger">Problem</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">Role <span class="text-danger">*</span> </label>
                    <div class="col-lg-9">
                        <select data-placeholder="Select a Role..." class="form-control select" name="role" required>
                            <option></option>
                            @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12 text-end">
                        <button type="submit" class="btn btn-primary" id="save-loader">
                            <i class="ph-circle-notch spinner me-2 d-none"></i>
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /input fields -->
@endsection


@push('scripts')

<script>
    $('#user-registration-form').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var $myButton = $('#save-loader');

        $.ajax({
            type: 'POST',
            url: '{{ route("users.store") }}',
            data: formData,
            beforeSend: function(){
                $myButton.attr('disabled', 'disabled');
                $myButton.find('.spinner').removeClass('d-none'); // Remove the 'd-none' class to display the spinner
                $myButton.html('<i class="ph-circle-notch spinner me-2"></i>Loading...'); // Update button text
            },
            success: function(response) {
                console.log(response.status);
                window.location.href = '{{ route("users.index") }}'; // Redirect to user.index
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
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
