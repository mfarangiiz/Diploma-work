@extends('snead.layout.master')
@section('content')
    @role('admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                                    <p class="mb-4">
                                        You have done <span class="fw-bold">72%</span> more sales today. Check your new
                                        badge in
                                        your profile.
                                    </p>

                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img
                                        src="../../../../../../Others/sneat-1.0.0/assets/img/illustrations/man-with-laptop-light.png"
                                        height="140"
                                        alt="View Badge User"
                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
