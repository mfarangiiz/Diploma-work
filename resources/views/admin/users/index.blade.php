@extends('snead.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jadval /</span> Foydalanuvchilar</h4>
        @include('alerts.success-alert')
        @include('alerts.error-alert')

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center flex-column flex-sm-row">
                <!-- Search -->
                <form action="{{ route('filter.student') }}" method="GET"
                      class="d-flex align-items-center mb-2 mb-sm-0 me-sm-2">
                    <input type="hidden" name="status" value="1">
                    <select class="form-select me-2" name="age_filter">
                        <option value="">Barcha yoshlar</option>
                        <option value="5-7" {{ request('age_filter') == '5-7' ? 'selected' : '' }}>5-7 yosh</option>
                        <option value="7-10" {{ request('age_filter') == '7-10' ? 'selected' : '' }}>7-10 yosh</option>
                        <option value="10-12" {{ request('age_filter') == '10-12' ? 'selected' : '' }}>10-12 yosh
                        </option>
                    </select>
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-filter"></i> Filtr
                    </button>
                </form>

                <div class="ms-auto">
                    @include('admin.users.create')
                </div>

            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Ismi</th>
                        <th>Telefon raqami</th>
                        <th>Yoshi</th>
                        <th>harakatlar</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>+998 {{ $user->phone }}</td>
                            <td>{{ $user->age }}</td>
                            {{--                            <td>{{ $user->user->price ?? '' }}</td>--}}
                            <td>
                                <div class="d-flex">

                                    @include('admin.users.edit')

                                    @role('teacher')
                                    @include('admin.users.response')
                                    @endrole()
                                    @include('admin.users.delete')


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
                                        <a class="page-link" href="{{ $users->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevrons-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item prev">
                                        <a class="page-link" href="{{ $users->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-left"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                                        <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item next">
                                        <a class="page-link" href="{{ $users->nextPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item last">
                                        <a class="page-link" href="{{ $users->url($users->lastPage()) }}">
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
