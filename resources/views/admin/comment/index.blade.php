@extends('snead.layout.master')
@section('content')
  
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jadval /</span> Comments</h4>
        @include('alerts.success-alert')
        @include('alerts.error-alert')
        
        <div class="table-responsive text-nowrap">
                <table class="table">
                              <thead>
                    <tr>
                        <th>№</th>
                        <th>user</th>
                        <th>Comment</th>
                        <th>lessons title</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($comments as $abakus)
                        <tr>
                            <td>{{ $abakus->id }}</td>
                            <td>{{ $abakus->user->name }}</td>
                            <td>{{ $abakus->taxt }}</td>
                            <td>{{ $abakus->abakus->title }}</td>
                            <td>
                                    @include('admin.comment.delete')
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
                                        <a class="page-link" href="{{ $comments->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevrons-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item prev">
                                        <a class="page-link" href="{{ $comments->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-left"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $comments->lastPage(); $i++)
                                        <li class="page-item {{ $comments->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $comments->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item next">
                                        <a class="page-link" href="{{ $comments->nextPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item last">
                                        <a class="page-link" href="{{ $comments->url($comments->lastPage()) }}">
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
