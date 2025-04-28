@extends('snead.layout.master')
@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            @include('alerts.success-alert')
            @include('alerts.error-alert')
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Bosh saxifani taxrirlash</h5>

                                    <div class="d-flex justify-content-between">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mt-3">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#motorikaesCreate">
                                                    <i class="bx bx-pencil"></i>
                                                </button>

                                                <div class="modal fade" id="motorikaesCreate" tabindex="-1"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title float-end"
                                                                    id="exampleModalLabel1">taxrirlash</h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                      action="{{ route('homepage.update') }}"
                                                                      class="prevent-duplicate-submit">
                                                                    @csrf
                                                                    <div class="mb-3">

                                                                        <label for="name"
                                                                               class="form-label">malumot</label>
                                                                        <textarea
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="title"
                                                                            name="title"
                                                                            placeholder=""
                                                                            autofocus
                                                                        >
                                                                        </textarea>
                                                                    </div>


{{--                                                                    <div class="mb-3">--}}
{{--                                                                        <label for="description" class="form-label">Aqliy--}}
{{--                                                                            rivojlanish uchun video</label>--}}
{{--                                                                        <input type="url" class="form-control"--}}
{{--                                                                               id="description" name="video1"--}}
{{--                                                                               required/>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="mb-3">--}}
{{--                                                                        <label for="description" class="form-label">O'sish--}}
{{--                                                                            va taraqqiyot</label>--}}
{{--                                                                        <input type="url" class="form-control"--}}
{{--                                                                               id="description" name="video2"--}}
{{--                                                                               required/>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="mb-3">--}}
{{--                                                                        <label for="description" class="form-label">O‘zlashtirish</label>--}}
{{--                                                                        <input type="url" class="form-control"--}}
{{--                                                                               id="description" name="video3"--}}
{{--                                                                               required/>--}}
{{--                                                                    </div>--}}


                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">
                                                                            Yopish
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Saqlash
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
