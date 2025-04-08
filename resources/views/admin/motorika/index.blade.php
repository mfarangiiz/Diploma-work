@extends('snead.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jadval /</span> Motorika</h4>
        @include('alerts.success-alert')
        @include('alerts.error-alert')

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center flex-column flex-sm-row">
                <!-- Search -->
                <form action="{{ route('motorika.index') }}" method="GET"
                      class="d-flex align-items-center mb-2 mb-sm-0 me-sm-2">
                    <input type="text" class="form-control me-2" placeholder="Izlash" name="search"
                           value="{{ request('search') }}">
                    <button class="btn btn-primary me-2" type="submit">
                        <i class="bx bx-search"></i>
                    </button>
                </form>

                <div class="ms-auto">
                    @include('admin.motorika.create')
                </div>

            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>sarlavha</th>
                        <th>qoshimcha malumot</th>
                        <th>yoshi</th>
                        <th>Video</th>
                        <th>harakatlar</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($motorikaes as $motorika)
                        <tr>
                            <td>{{ $motorika->id }}</td>
                            <td>{{ $motorika->title }}</td>
                            <td>{{ $motorika->description }}</td>
                            <td>{{ $motorika->age }}</td>
                            <td>
                                <video width="400" controls>
                                    <source src="{{ asset(asset('storage/' . $motorika->video)) }}"
                                            type="{{ Storage::mimeType('storage/videos' . $motorika->video) }}">
                                    Your browser does not support HTML5 video.
                                </video>
                            </td>
                            <td>
                                <div class="d-flex">

                                    @include('admin.motorika.edit')

                                    @include('admin.motorika.delete')

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Basic Pagination -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="demo-inline-spacing">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item first">
                                        <a class="page-link" href="{{ $motorikaes->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevrons-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item prev">
                                        <a class="page-link" href="{{ $motorikaes->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-left"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $motorikaes->lastPage(); $i++)
                                        <li class="page-item {{ $motorikaes->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $motorikaes->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item next">
                                        <a class="page-link" href="{{ $motorikaes->nextPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item last">
                                        <a class="page-link" href="{{ $motorikaes->url($motorikaes->lastPage()) }}">
                                            <i class="tf-icon bx bx-chevrons-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Basic Pagination -->
        </div>
    </div>
@endsection
