@section('title', 'Register')
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets-front') }}/" data-template="vertical-menu-template-free">
@include('front.partials.auth.head')


<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        @include('front.partials.auth.logo')
                        <!-- /Logo -->
                        <h4 class="mb-2">Adventure starts here 🚀</h4>
                        <p class="mb-4">Make your app management easy and fun!</p>

                        <form id="formAuthentication" class="mb-3" action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">{{ __('lang.Username') }}</label>
                                <input data-parsley-type="text" class="form-control" id="username" name="name" value="{{old('name')}}"
                                placeholder="{{ __('lang.name') }}" autofocus  />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('lang.email') }}</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('lang.email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('lang.password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" 
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('lang.sign up') }}</button>
                        </form>

                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="{{route('login')}}">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    @include('front.partials.auth.scripts')
</body>

</html>
