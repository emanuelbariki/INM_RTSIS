@extends('layouts.vertical')

@push('head-script')
<script src="{{ asset('assets/js/components/tables/datatables/datatables.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
<script src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
@endpush

@section('content')
    <div class="mb-3">
    </div>

    <div class="card">
        <div class="card-header">
            This <code>{{ $subTitle }}</code> Uploads & endpoint stats
        </div>

        <div class="card-body">
            <form action="{{ route('outwardsbill-import') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-5">
                        <input type="file" name="file" id="upload" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success btn-sm">Upload</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>DATE</th>
                    <th>Status</th>
                    <th hidden></th>
                    <th hidden></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>01</td>
                    <td>89</td>
                    <td>3 Oct 2021</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">Failed</span></td>
                    <td hidden></td>
                    <th hidden></th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
