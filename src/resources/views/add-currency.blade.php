@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Choose favorite currency') }}</div>
                <div style="margin:1%">
                    <form method="post" action="{{ route('add-currency', app()->getLocale()) }}">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ __('The action ran successfully') }}
                                {{ session('status') }}
                            </div>
                        @endif

                            @foreach($choices as $choice)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check_list[]" value="{{ $choice }}" id="{{ $choice }}" >
                                <label class="form-check-label" for="{{ $choice }}">
                                    {{ $choice }}
                                </label>
                            </div>
                            @endforeach
                            <br>
                            <button type="submit" href="{{ route('home', app()->getLocale()) }}" class="btn btn-primary" >
                                {{ __('Submit') }}
                            </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
