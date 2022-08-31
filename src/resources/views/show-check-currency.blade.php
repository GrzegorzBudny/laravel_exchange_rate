@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Check Currency') }}</div>
                    <div style="margin: 1%">

                    <table class="table" style="text-align: center">
                        <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $code }}</td>
                            <td>{{ $mid }}</td>
                            <td>{{ $effectiveDate }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
