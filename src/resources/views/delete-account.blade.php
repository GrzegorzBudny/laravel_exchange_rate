@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Delete Account') }}</div>

                    <form method="POST" action="{{ route('destroy-account', app()->getLocale()) }}">
                        {{ method_field('DELETE') }}
                        @csrf
                        <div class="card-body">
                        @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ __('Wrong Password') }}
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="your_PasswordInput" class="form-label">{{ __('Enter your Password') }}</label>
                                <input name="your_password" type="password" class="form-control @error('your_password') is-invalid @enderror" id="your_PasswordInput" alt="{{ __('Emter your Password') }}">
                                @error('your_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger" alt="{{ __('Delete Account') }}">
                                        {{ __('Delete Account') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
