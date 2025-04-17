@extends('snead.layout.master')
@section('content')
    @role('admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-md-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-wrap align-items-center gap-3">
                                    <div class="d-flex flex-column align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">O`ituvchilar</h5>
                                            <span
                                                class="badge bg-label-success rounded-pill">{{ now()->format('d-m-y') }}</span>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <h6 class="mb-0"><b>{{ $teachers??0 }} ta</b></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 mb-4 order-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">O`quvchilar</h5>
                                            <span
                                                class="badge bg-label-warning rounded-pill">{{ now()->format('d-m-y') }}</span>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <h6 class="mb-0">{{ $students??0 }} ta</h6>
                                        </div>
                                    </div>
                                    {{--                                    <div id="profileReportChart" class="w-100"--}}
                                    {{--                                         data-trent="{{ $trent->toJson() }}"></div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-4 order-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Darslar</h5>
                                            <span
                                                class="badge bg-label-warning rounded-pill">{{ now()->format('d-m-y') }}</span>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <h6 class="mb-0">{{ $lessons }} ta</h6>
                                        </div>
                                    </div>
                                    {{--                                    <div id="profileReportChart" class="w-100"--}}
                                    {{--                                         data-trent="{{ $trent->toJson() }}"></div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>
@endsection()
