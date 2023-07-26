@extends('layouts.vertical')

@push('head-script')
<script src="{{ asset('assets/js/components/tables/datatables/datatables.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
<script src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
@endpush

@section('content')
    <div class="card">
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="card-body">

                <div class="row mb-3">
                    <label class="col-form-label col-lg-3">Role Name <span class="text-danger">*</span> </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name" placeholder="Enter firstname..." required>
                    </div>
                </div>
            </div>

            <div class="table-responsive">


                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Model</th>
                            <th style="width: 20px"><input type="checkbox" name="check_all" id=""></th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $model => $items)
                            <tr>
                                <td rowspan="{{ $items->count() }}">{{ $loop->iteration }}</td>
                                <td rowspan="{{ $items->count() }}">{{ $model }}</td>
                                <td><input type="checkbox" value="{{ $items->first()->id }}" name="permission_id[]" id=""></td>
                                <td>{{ $items->first()->description }}</td>
                            </tr>
                            @foreach($items->slice(1) as $item)
                                <tr>
                                    <td><input type="checkbox" value="{{ $item->id }}" name="permission_id[]" id=""></td>
                                    <td>{{ $item->description  }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success">save</button>
            </div>
        </form>
    </div>
@endsection
