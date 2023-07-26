@extends('layouts.vertical')

@push('head-script')
<script src="{{ asset('assets/js/components/tables/datatables/datatables.min.js') }}"></script>
@endpush

@push('head-scriptTwo')
<script src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
@endpush

@section('content')
    <div class="mb-3">
        <h6 class="mb-0">{{ $subTitle }} endpoint stats</h6>
    </div>

    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-info text-white">
                <div class="d-flex align-items-center">
                    <div class="flex-fill">
                        <h4 class="mb-0">54,390</h4>
                        Pending
                    </div>

                    <i class="ph-hourglass-medium ph-2x opacity-75 ms-3"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-success text-white">
                <div class="d-flex align-items-center">
                    <div class="flex-fill">
                        <h4 class="mb-0">389,438</h4>
                        Successful
                    </div>

                    <i class="ph-trophy ph-2x opacity-75 ms-3"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-danger text-white">
                <div class="d-flex align-items-center">
                    <div class="flex-fill">
                        <h4 class="mb-0">652,549</h4>
                        Failed
                    </div>

                    <i class="ph-warning ph-2x opacity-75 ms-3"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-indigo text-white">
                <div class="d-flex align-items-center">
                    <div class="flex-fill">
                        <h4 class="mb-0">245,382</h4>
                        Retry
                    </div>

                    <i class="ph-arrow-clockwise ph-2x opacity-75 ms-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            This request is used to register <code>{{ $subTitle }} data</code> to the Real Time Data Collection System.
        </div>

        <table class="table datatable-basic" id="my">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DATE</th>
                    <th>Status</th>
                    <th hidden>unknown</th>
                    <th hidden>unknown</th>
                    <th hidden>unknown</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>22 Jun 2021</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">Success</span></td>
                    <td hidden>Data</td>
                    <td hidden>Data</td>
                    <td hidden>Data</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>3 Oct 2021</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-info">Pending</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>19 Apr 2020</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">Failed</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>13 Dec 2022</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Pending</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>30 Dec 2003</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-info">Pending</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>17 Oct 2009</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Pending</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>11 Nov 2022</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">Failed</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>80</td>
                    <td>1 Nov 2021</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">Failed</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>90</td>
                    <td>18 Dec 2023</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">Success</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>97</td>
                    <td>10 Jan 2022</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-success">Success</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>99</td>
                    <td>21 Dec 2023</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Pending</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>100</td>
                    <td>5 Jun 2023</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-success">Success</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>55</td>
                    <td>12 Oct 2022</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">Success</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>62</td>
                    <td>25 Feb 2021</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">Failed</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
                <tr>
                    <td>85</td>
                    <td>15 Mar 2022</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Pending</span></td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                    <td hidden>data</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
