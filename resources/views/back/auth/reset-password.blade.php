@section('title', 'Reset Password')
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets-front') }}/" data-template="vertical-menu-template-free">
@include('back.partials.auth.head')


<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        @include('back.partials.auth.logo')
                        <!-- /Logo -->
                        <h4 class="mb-2">Reset Password back</h4>
                                <!-- Password Reset Token -->

                        <form id="formAuthentication" class="mb-3" action="{{route('back.password.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token')}}">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value={{$request->email}} required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" 
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <!-- Confirm Password-->
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password_confirmation" 
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <button class="btn btn-primary d-grid w-100" type="submit">Reset Password</button>
                        </form>

                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    @include('back.partials.auth.scripts')
</body>

</html>
