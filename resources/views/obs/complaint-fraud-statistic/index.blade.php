@extends('layouts.vertical')

@push('head-script')
<script src="{{ asset('assets/js/components/tables/datatables/datatables.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
<script src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
@endpush

@section('content')
    <div class="mb-3">
        This <code>{{ $subTitle }}</code>.
    </div>

    <div class="card">
        <div class="card-header text-end">
            {{-- <a href="{{ route('branch.create') }}" class="btn btn-success">Add Branch</a> --}}
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Complaint Name</th>
                    <th>Complaint Mobile</th>
                    <th>Complaint Type</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($branches as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->branch_name }}</td>
                    <td>{{ $item->banking_services }}</td>
                    <td>{{ $item->telephone_number }}</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">Sent</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <a href="#" class="text-primary">
                                <i class="ph-pen"></i>
                            </a>
                            <a href="#" class="text-danger mx-2">
                                <i class="ph-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection

