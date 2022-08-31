@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('10-day Gold rate') }}</div>

                <div class="card-body">
                    @isset($chart)
                    <div style="height: 5%;width: 100%">{!! $chart->container() !!}</div>
                    @endisset
                    @empty($chart)
                    {{ __("At this time can't show gold char") }}
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Favorite currency') }}</div>

                <div class="card-body" style="text-align: center">


                    @isset($arrays)
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Code') }}</th>
                            <th scope="col">{{ __('Cost') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arrays as $code => $mid)
                        <tr>
                            <td>{{ $code }}</td>
                            @foreach($mid as $value)
                            <td>{{ $value }}</td>

                            @endforeach
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @endisset
                        @empty($arrays)
                            {{ __("You haven't picked your favorite currencies yet") }}
                        @endempty
            </div>
        </div>
    </div>
</div>
@endsection
