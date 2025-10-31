@extends('layouts.mainLayout')
@section('container')
    <div class="container py-4">
        {{-- Page Header --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h2">
                    {{ __('Profile') }}
                </h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- 1. Update Profile Information --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <section>
                            <header>
                                <h2 class="h5">
                                    {{ __('Profile Information') }}
                                </h2>
                                <p class="mt-1 text-muted">
                                    {{ __("Update your account's profile information and email address.") }}
                                </p>
                            </header>

                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                                @csrf
                                @method('patch')

                                {{-- Name Field --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                                    @error('name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email Field --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                                    @error('email')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div class="mt-2">
                                            <p class="text-sm text-muted">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <div class="alert alert-success mt-2">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                {{-- Action Buttons --}}
                                <div class="d-flex align-items-center gap-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>

                                    @if (session('status') === 'profile-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-success"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </section>
                    </div>
                </div>

                {{-- 2. Update Password Form --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <section>
                            <header>
                                <h2 class="h5">
                                    {{ __('Update Password') }}
                                </h2>

                                <p class="mt-1 text-muted">
                                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                </p>
                            </header>

                            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                                @csrf
                                @method('put')

                                {{-- Current Password --}}
                                <div class="mb-3">
                                    <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                                    <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                    @error('current_password', 'updatePassword')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- New Password --}}
                                <div class="mb-3">
                                    <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                                    <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                                    @error('password', 'updatePassword')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                                    @error('password_confirmation', 'updatePassword')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Action Button --}}
                                <div class="d-flex align-items-center gap-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>

                                    @if (session('status') === 'password-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-success"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </section>
                    </div>
                </div>

                {{-- 3. Delete User Form --}}
                <div class="card shadow-sm mb-4 border border-danger">
                    <div class="card-body p-4">
                        <section class="space-y-6">
                            <header>
                                <h2 class="h5 text-danger">
                                    {{ __('Delete Account') }}
                                </h2>
                                <p class="mt-1 text-muted">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                </p>
                            </header>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                                {{ __('Delete Account') }}
                            </button>

                            {{-- Deletion Confirmation Modal --}}
                            <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                            @csrf
                                            @method('delete')

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="mt-1 text-muted">
                                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                </p>

                                                <div class="mb-3 mt-3">
                                                    <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
                                                    <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" />
                                                    @error('password', 'userDeletion')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    {{ __('Cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('Delete Account') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection