@extends('layouts.vertical')

@push('head-script')
<script src="{{ asset('assets/js/components/tables/datatables/datatables.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
<script src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
@endpush

@section('content')
    <div class="mb-3">
        This <code>{{ $subTitle }}</code>
    </div>

    <div class="card">
        <div class="card-header text-muted">
            Export your branches here
        </div>

        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-lg-8">
                        <input type="file" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-muted">
            This is for manual create of branches
        </div>

        <div class="card-body">
            <form id="save-permission">
                @csrf

                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="branch_name">Branch Name</label>
                            <input type="text" name="branch_name" id="branch_name" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="branch_code">Branch Code</label>
                            <input type="text" name="branch_code" id="branch_code" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="postal_code">Postal Code</label>
                            <input type="text" name="postal_code" id="postal_code" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="qrfsr_code">QRFS Code</label>
                            <input type="text" name="qrfsr_code" id="qrfsr_code" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="bank_services">Bank Services</label>
                            <input type="text" name="bank_services" id="bank_services" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="mobile_money_services">Mobile money services</label>
                            <input type="text" name="mobile_money_services" id="mobile_money_services" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="branch_status">Branch Status</label>
                            <input type="text" name="branch_status" id="branch_status" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="branch_category">Branch Category</label>
                            <input type="text" name="branch_category" id="branch_category" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="registration_date">Registration Date</label>
                            <input type="date" name="registration_date" id="registration_date" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="closure_date">Closure Date</label>
                            <input type="date" name="closure_date" id="closure_date" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="tax_identification_number">Tax Identification Number</label>
                            <input type="text" name="tax_identification_number" id="tax_identification_number" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="business_license">Bussiness License</label>
                            <input type="text" name="business_license" id="business_license" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="gps_coordinates">GPS Coordinates</label>
                            <input type="text" name="gps_coordinates" id="gps_coordinates" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="contact_person">Contact Person</label>
                            <input type="text" name="contact_person" id="contact_person" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="telephone_number">Telephone Number</label>
                            <input type="text" name="telephone_number" id="telephone_number" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="alt_telephone">ALT Telephone</label>
                            <input type="text" name="alt_telephone" id="alt_telephone" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="region">Region</label>

                            <select class="form-control select" name="region" id="region">
                                <option value="">Select Region</option>
                                @foreach ($regions as $region)
                                <option value="{{ $region->code }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4" id="districtSelect" hidden>
                        <div class="mb-3">
                            <label class="form-label" for="district">District</label>
                            <select class="form-control select" name="district" id="district">
                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4" id="wardSelect" hidden>
                        <div class="mb-3">
                            <label class="form-label" for="ward">Ward</label>
                            <select class="form-control select" name="ward" id="ward">
                                <option value="">Select Ward</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="street">Street</label>
                            <input type="text" name="street" id="street" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="house_number">House Number</label>
                            <input type="text" name="house_number" id="house_number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-end">
                        <button type="submit" class="btn btn-md btn-success" id="save-loader">
                            <i class="ph-circle-notch spinner me-2 d-none"></i>
                            Save Branch
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
@endsection

@push('scripts')
    <script>

        $(document).ready(function() {

            $('#region').change(function() {
                var regionId = $(this).val();

                if (regionId) {
                    $('#districtSelect').prop('hidden', false);
                    populateDistricts(regionId);
                } else {
                    $('#districtSelect').prop('hidden', true);
                }
            });

            $('#district').change(function() {
                var districtId = $(this).val();

                if (districtId) {
                    $('#wardSelect').prop('hidden', false);
                    populateWards(districtId);
                } else {
                    $('#wardSelect').prop('hidden', true);
                }
            });

            function populateDistricts(regionId) {
                $.ajax({
                    url: '{{ route("districts") }}',
                    type: 'GET',
                    data: { region: regionId },
                    success: function(response) {
                        var districtSelect = $('#district');
                        districtSelect.empty();
                        districtSelect.append('<option value="">Select District</option>');
                        response.forEach(function(district) {
                            districtSelect.append('<option value="' + district.dis_code + '">' + district.dis_name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            }

            function populateWards(districtId) {
                $.ajax({
                    url: '{{ route("wards") }}',
                    type: 'GET',
                    data: { district: districtId },
                    success: function(response) {
                        var wardSelect = $('#ward');
                        wardSelect.empty();
                        wardSelect.append('<option value="">Select Ward</option>');
                        response.forEach(function(ward) {
                            wardSelect.append('<option value="' + ward.ward_code + '">' + ward.ward_name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            }

        });



        $('#save-permission').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var $myButton = $('#save-loader');

            $.ajax({
                type: 'POST',
                url: '{{ route("branch.index") }}',
                data: formData,
                beforeSend: function(){
                    $myButton.attr('disabled', 'disabled');
                    $myButton.find('.spinner').removeClass('d-none'); // Remove the 'd-none' class to display the spinner
                    $myButton.html('<i class="ph-circle-notch spinner me-2"></i>Loading...'); // Update button text
                },
                success: function(response) {

                    // const { status, errors } = response;

                    // if (status === 200) {
                    //     location.reload();
                    // } else {
                    //     $('.model-body').removeClass('d-none');
                    //     $('.alert').removeClass('alert-success').addClass('alert-danger');
                    //     $('.alert span').text('Something went wrong');
                    //     $('.alert ul').empty();

                    //     $.each(errors, function(field, messages) {
                    //         $.each(messages, function(index, message) {
                    //             $('.alert ul').append('<li>' + message + '</li>');
                    //         });
                    //     });
                    // }

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
