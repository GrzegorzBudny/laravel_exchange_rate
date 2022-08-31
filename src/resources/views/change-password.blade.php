@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" alt="{{ __('Change Password') }}">{{ __('Change Password') }}</div>

                    <form method="POST" action="{{ route('update-password', app()->getLocale()) }}">
                        @csrf
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ __('The action ran successfully') }}
                                {{ session('status') }}
                            </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ __('The given data was invalid') }}
                                    {{ session('error') }}
                                </div>
                            @endif

                                <div class="row mb-3">
                                    <label for="oldPasswordInput" class="form-label">{{ __('Old Password') }}</label>
                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" alt="{{ __('Old Password') }}">

                                @error('old_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="newPasswordInput" class="form-label">{{ __('New Password') }}</label>
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" alt="{{ __('New Password') }}">
                                    @error('new_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="confirmNewPasswordInput" class="form-label">{{ __('Confirm New Password') }}</label>
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" alt="{{ __('Confirm New Password') }}">
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" alt="{{ __('Submit Change') }}">
                                            {{ __('Submit Change') }}
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
