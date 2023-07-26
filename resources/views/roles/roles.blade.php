@extends('layouts.vertical')

@push('head-script')
<script src="{{ asset('assets/js/components/tables/datatables/datatables.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
<script src="{{ asset('assets/js/pages/datatables_data_sources.js') }}"></script>
@endpush

@section('content')
    <div class="mb-3">
        <h6 class="mb-0">{{ $title }} inside the system</h6>
    </div>

    <div class="card">
        @if (session()->has('success'))
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success border-0 alert-dismissible fade show">
                        <span class="fw-semibold">Well done!</span> You successfully saved a new role.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <table class="table datatable-roles" id="my">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @foreach ($item->permissions as $permission)
                        {{ $permission->description .', ' }}
                        @endforeach
                    </td>
                    {{-- <td class="wmin-lg-350">
                        <div class="d-inline-flex">
                            <a href="#" class="text-body">
                                <i class="ph-pen"></i>
                            </a>
                            <a href="#" class="text-body mx-2">
                                <i class="ph-trash"></i>
                            </a>
                        </div>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $(".datatable-roles").dataTable({
                columnDefs: [
                    {
                        orderable: false,
                        width: 100,
                        targets: [4],
                    },
                ],
            });
        });
    </script>
@endpush
