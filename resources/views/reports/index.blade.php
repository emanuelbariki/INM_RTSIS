@extends('layouts.vertical', ['title' => $title])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">RTSIS</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $title }}</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Buttons example</h4>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    @foreach ($allData->first() as $columnName => $value)
                                        <th>{{ ucfirst(str_replace('_', ' ', $columnName)) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allData as $data)
                                    <tr>
                                        @foreach ($data as $key => $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection