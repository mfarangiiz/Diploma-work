@extends('snead.layout.master')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jadval /</span> Foydalanuvchilar</h4>
        @include('alerts.success-alert')
        @include('alerts.error-alert')

        <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>

                    <form method="POST" action="{{ route('test.store') }}">
                        @csrf

                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="answer" class="form-label">darslik uchun test</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="1">Abacus</option>
                                        <option value="2">Motorika</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="question" class="form-label">Savol</label>
                                    <input type="text" class="form-control" name="question"
                                           value="{{ old('question') }}"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="answer" class="form-label">Javob</label>
                                    <input type="text" name="answer" class="form-control"
                                           value="{{ old('answer') }}"/>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Yopmoq
                            </button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="demo-inline-spacing mb-3">
            <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#exLargeModal"
            ><i class="bx bx-plus me-1"></i>
            </button>
        </div>

        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">darslik</th>
                        <th scope="col">Savol</th>
                        <th scope="col">T/J</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @php
                        $i = 1;
                    @endphp
                    @foreach($tests as $test)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$test->status == 1? 'Abacus':'Motorika'}}</td>
                            <td>{{$test->question}}</td>
                            <td>{{ $test->answer }}</td>
                            <td>
                                <div class="d-flex">
                                    @if(auth()->user()->can('edit'))
                                        <a href="{{ route('test.edit', $test->id) }}"
                                           class="btn btn-icon btn-warning me-2"><i
                                                class="bx bx-pencil me-2"></i></a>
                                    @endif
                                    @if(auth()->user()->can('delete'))
                                        <button type="button" class="btn btn-icon btn-danger me-2"
                                                data-bs-toggle="modal" data-bs-target="#modalToggle{{$test->id}}">
                                            <i class="bx bx-trash-alt"></i></button>

                                        <div class="modal fade" id="modalToggle{{$test->id}}"
                                             aria-labelledby="modalToggleLabel{{$test->id}}" tabindex="-1"
                                             style="display: none" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggleLabel{{$test->id}}">
                                                            Buni qaytara olmaysiz!</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">{{ $test->title }}</div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('test.destroy', $test->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">O'chirish
                                                            </button>
                                                        </form>
                                                        <button class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Ortga
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
@endsection
