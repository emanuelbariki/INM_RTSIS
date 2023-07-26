@extends('layouts.vertical')

@push('head-script')
    {{-- <script src="{{ asset('assets/js/components/tables/gridjs/gridjs.min.js') }}"></script> --}}
@endpush

@push('head-scriptTwo')
    {{-- <script src="{{ asset('assets/js/pages/gridjs_basic.js') }}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
@endpush

@section('content')
<div class="mb-3">
    {{-- <button class="btn btn-success" id="buttonD">Submit</button> --}}

    <form id="dateFilterForm">
        Start Date: <input type="text" id="startDate">
        End Date: <input type="text" id="endDate">
        <input type="submit" value="Apply">
    </form>
</div>

<div class="card">
    <div class="gridjs-test-search border-top"></div>
</div>
@endsection

@push('scripts')

<script>

    $(document).ready(function(){

        $("#startDate, #endDate").datepicker({
            dateFormat: "yy-mm-dd"
        });

        const demoData = [
            ["John", "john@example.com", "2023-05-01", "Netherlands"],
            ["Mark", "mark@gmail.com", "2023-05-05", "Switzerland"],
            ["Eoin", "eoin@gmail.com", "2023-05-04", "Germany"],
            ["Sarah", "sarahcdd@gmail.com", "2023-04-05", "France"],
            ["Afshin", "afshin@mail.com", "2023-05-06", "Norway"],
            ["Douglas", "douglas@gmail.com", "2023-05-05", "Switzerland"],
            ["Charles", "charles@gmail.com", "2023-05-10", "Germany"],
            ["Hekela", "hekela@gmail.com", "2023-04-05", "France"],
            ["Laison", "laison@mail.com", "2023-05-06", "Norway"],

            ["John", "john@example.com", "2023-05-01", "Netherlands"],
            ["Mark", "mark@gmail.com", "2023-05-05", "Switzerland"],
            ["Eoin", "eoin@gmail.com", "2023-05-10", "Germany"],
            ["Sarah", "sarahcdd@gmail.com", "2023-04-05", "France"],
            ["Afshin", "afshin@mail.com", "2023-05-06", "Norway"],
            ["Douglas", "douglas@gmail.com", "2023-05-05", "Switzerland"],
            ["Charles", "charles@gmail.com", "2023-05-10", "Germany"],
            ["Hekela", "hekela@gmail.com", "2023-04-05", "France"],
            ["Laison", "laison@mail.com", "2023-05-06", "Norway"]
        ];

        const gridjsSearchElement = document.querySelector(".gridjs-test-search");

        if(gridjsSearchElement) {
            const gridjsSearch = new gridjs.Grid({
                className: {
                    table: 'table'
                },
                // pagination: true,
                sort: true,
                // search: true,
                columns: [
                    "Name",
                    "Email",
                    {
                        name: "dob",
                        formatter: (cell) => new Date(cell).toLocaleDateString(),
                    },
                    "Country"
                ],
                data: demoData
            });

            gridjsSearch.render(gridjsSearchElement);

            $("#dateFilterForm").submit(function(e) {
                e.preventDefault();

                const startDate = $("#startDate").val();
                const endDate = $("#endDate").val();

                const errors = gridjsSearch.updateConfig({
                    server: {
                        query: {
                            dobStart: startDate,
                            dobEnd: endDate,
                        },
                    },
                }).forceRender();

                console.log(errors);
            });
        }

    });


</script>

@endpush

