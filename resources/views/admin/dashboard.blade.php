@extends('layouts.content')

@section('title', __('Dashboard'))

<style>
    .bg-dashboard {
        background-color: #383261 !important;
    }
</style>
@section('content')
<!-- Container fluid -->
<div class="bg-dashboard pt-10 pb-21"></div>
<div class="container-fluid mt-n22 px-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold text-white">{{ __('Dashboard') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">{{ __('Total Users') }}</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                        rounded-1">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{ $totalUsers }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">{{ __('Total Uploads') }}</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                        rounded-1">
                            <i class="bi bi-cloud-arrow-up fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{ $totalUploads }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">{{ __('Total Reports') }}</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                        rounded-1">
                            <i class="bi bi-flag fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{ $totalReports }}</h1>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">{{ __('Total Downloads') }}</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                        rounded-1">
                            <i class="bi bi-download fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{ $totalDownloads }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row  -->
    <div class="row mt-6">
        <div class="col-md-12 col-12">
            <!-- card  -->
            <div class="card">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 py-4">
                    <h4 class="mb-0">{{ __('Download by Day') }}</h4>
                </div>
                <div class="card-body">
                    <div id="apex-area-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12 mt-2">
            <!-- card  -->
            <div class="card">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 py-4">
                    <h4 class="mb-0">{{ __('Reports by Day') }}</h4>
                </div>
                <div class="card-body">
                    <div id="apex-area-chart-reports"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    (function() {
        "use strict";

        var i;
        var e = {
            chart: {
                foreColor: "#979797",
                height: 300,
                type: "area",
                toolbar: {
                    show: !1
                },
                zoom: {
                    type: "x",
                    enabled: !1,
                    autoScaleYaxis: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth"
            },
            colors: ["#0080ff", "#d4d8de"],
            series: [{
                name: "Download(s)",
                data: [@for($i = 14; $i >= 0; $i--)
                    "{{ $uploadStats[$i] }}",
                    @endfor
                ]
            }],
            legend: {
                show: !1
            },
            xaxis: {
                type: "text",
                categories: [
                    @for($i = 14; $i >= 0; $i--)
                    "{{ \Carbon\Carbon::today()->subDays($i)->format('M j') }}",
                    @endfor
                ],
                axisBorder: {
                    show: !0,
                    color: "rgba(0,0,0,0.05)"
                },
                axisTicks: {
                    show: !0,
                    color: "rgba(0,0,0,0.05)"
                }
            },
            grid: {
                row: {
                    colors: ["transparent", "transparent"],
                    opacity: .2
                },
                borderColor: "rgba(77, 138, 240, .1)"
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy HH:mm"
                }
            }
        };

        (i = new ApexCharts(document.querySelector("#apex-area-chart"), e)).render();

    }());

    (function() {
        "use strict";

        var i;
        var e = {
            chart: {
                foreColor: "#979797",
                height: 300,
                type: "area",
                toolbar: {
                    show: !1
                },
                zoom: {
                    type: "x",
                    enabled: !1,
                    autoScaleYaxis: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth"
            },
            colors: ["#0080ff", "#d4d8de"],
            series: [{
                name: "Report(s)",
                data: [@for($i = 14; $i >= 0; $i--)
                    "{{ $reportStats[$i] }}",
                    @endfor
                ]
            }],
            legend: {
                show: !1
            },
            xaxis: {
                type: "text",
                categories: [
                    @for($i = 14; $i >= 0; $i--)
                    "{{ \Carbon\Carbon::today()->subDays($i)->format('M j') }}",
                    @endfor
                ],
                axisBorder: {
                    show: !0,
                    color: "rgba(0,0,0,0.05)"
                },
                axisTicks: {
                    show: !0,
                    color: "rgba(0,0,0,0.05)"
                }
            },
            grid: {
                row: {
                    colors: ["transparent", "transparent"],
                    opacity: .2
                },
                borderColor: "rgba(77, 138, 240, .1)"
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy HH:mm"
                }
            }
        };

        (i = new ApexCharts(document.querySelector("#apex-area-chart-reports"), e)).render();

    }());
</script>

@endsection