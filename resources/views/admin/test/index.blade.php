@extends('snead.layout.master')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jadval /</span> Testlar</h4>
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
                            <div class="mb-3">
                                    <label for="age_group" class="form-label">Yosh</label>
                                    <select name="age" id="age" class="form-control" required>
                                        <option value="5-7" {{ old('age_group') == '5-7' ? 'selected' : '' }}>5 - 7
                                            yosh
                                        </option>
                                        <option value="7-10" {{ old('age_group') == '7-10' ? 'selected' : '' }}>7 - 10
                                            yosh
                                        </option>
                                        <option value="10-12" {{ old('age_group') == '10-12' ? 'selected' : '' }}>10 -
                                            12 yosh
                                        </option>
                                    </select>
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
            
        <form action="{{ route('filter.age.test') }}" method="GET"
                                          class="d-flex align-items-center mb-2 mb-sm-0 me-sm-2">
                                        <select class="form-select me-2" name="test">
                                            <option value="">Filter</option>
                                            <option value="5-7" {{ request('age') == '5-7' ? 'selected' : '' }}>5-7</option>
                                            <option value="7-10" {{ request('age') == '7-10' ? 'selected' : '' }}>7-10</option>
                                            <option value="10-12" {{ request('age') == '10-12' ? 'selected' : '' }}>10-12</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-filter"></i> Filtr yoshdan 
                                        </button>
                                    </form>
        
            
        <form action="{{ route('filter.test') }}" method="GET"
                                          class="d-flex align-items-center mb-2 mb-sm-0 me-sm-2">
                                        <select class="form-select me-2" name="test">
                                            <option value="">Filter</option>
                                            <option value="1" {{ request('test_filter') == '5-7' ? 'selected' : '' }}>abakus</option>
                                            <option value="2" {{ request('test_filter') == '10-12' ? 'selected' : '' }}>motorika</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-filter"></i> Filtr darslikdan
                                        </button>
                                    </form>
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
                        <th scope="col">yosh</th>
                        <th scope="col">tahrirlash</th>
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
                            <td>{{ $test->age }}</td>
                            <td>
                                <div class="d-flex">
                                    @if(auth()->user()->role('admin'))
                                        <a href="{{ route('test.edit', $test->id) }}"
                                           class="btn btn-icon btn-warning me-2"><i
                                                class="bx bx-pencil me-2"></i></a>
                                    @endif
                                    @if(auth()->user()->role('admin'))
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
