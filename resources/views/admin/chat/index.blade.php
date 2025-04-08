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
                    <div class="table">
                        <tr>
                            <td>id</td>
                            <td>foydalanuvchi</td>
                            <td>xabar</td>
                            <td>javob</td>
                        </tr>
{{--                        @foreach($) @endforeach--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
