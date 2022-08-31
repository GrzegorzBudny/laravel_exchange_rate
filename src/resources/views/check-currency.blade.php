@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Check Currency') }}</div>
                <div style="margin:1%">
                    <form method="post" action="{{ route('show-check-currency', app()->getLocale()) }}">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                                {{ __('Choose currency') }}
                            <div class="form-group">
                                <select multiple="" name="choice" class="form-control" id="exampleFormControlSelect2">
                                    @foreach($choices as $choice)
                                        <option value="{{ $choice }}">{{ $choice }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{ __('Choose date') }}
                            <div class="col-sm-3">
                                <input type="date" name="date" class="form-control input-sm">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" >
                                {{ __('Submit') }}
                            </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
