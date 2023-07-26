@extends('layouts.vertical')

@push('head-script')
    <script src="{{ asset('assets/js/components/tables/gridjs/gridjs.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
    <script src="{{ asset('assets/js/pages/gridjs_customizing.js') }}"></script>
@endpush

@section('content')
    <div class="mb-3">
        <h6 class="mb-0">List of users</h6>
    </div>

    <div class="card">
        <div class="card-body">
            This is a list of <code>{{ $users->count() }} User</code> in the System.
        </div>

        <div class="gridjs-user-row-buttons border-top"></div>
    </div>
@endsection

@push('scripts')

<script>

    $(document).ready(function(){

        $.ajax({
            type: 'GET',
            url: '{{ route("users.list") }}',
            success: function(response) {

                // const users = response.map(obj => Object.values(obj));
                // const listItems = Object.keys(data).map(key => `<li>${data[key]}</li>`);

                const gridjsRowButtonsElement = document.querySelector(".gridjs-user-row-buttons");

                var url = '{{ route("users.edit", ':id') }}';

                if(gridjsRowButtonsElement) {
                    const gridjsRowButtons = new gridjs.Grid({
                        className: {
                            table: 'table'
                        },
                        sort: true,
                        columns: [
                            "id",
                            "Firstname",
                            "Middlename",
                            "Lastname",
                            "Email",
                            {
                                name: 'Actions',
                                sort: false,
                                width: 140,
                                formatter: (cell, row) => gridjs.html(`<a href='${url.replace(':id', row.cells[0].data)}'><i class="ph-pen me-1"></i></a>`)
                            }
                        ],
                        data: response
                    });
                    gridjsRowButtons.render(gridjsRowButtonsElement);
                }

            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            },
        });
    });


</script>

@endpush
