{{--<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>--}}
<x-guest-layout>
    <section class="bg-primary frms-login" id="page-card">
        <div class="container">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 login-wrapper-right">
                    <form name="frm-login" method="POST" action="{{route('login')}}">
                        @csrf
                        <fieldset class="wrap-title">
                            <h2 class="text-gray">LOGIN</h2>
                        </fieldset>
                        <div class="form-group">
                            <input type="email" name="email" class="form-input" placeholder="EMAIL ADDRESS" :value="old('email')" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-input" placeholder="PASSWORD" required autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <a class="text-gray" href="#" title="FORGOT PASSWORD">FORGOT PASSWORD</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-green">LOGIN</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 login-wrapper-left">
                    <form name="frm-login" method="POST" action="{{route('register')}}">
                        @csrf
                        <fieldset class="wrap-title">
                            <h2 class="text-gray">CREATE ACCOUNT</h2>
                            <h2 class="text-gray"><i class="fa fa-user-circle" aria-hidden="true"></i></h2>
                        </fieldset>
                        <div class="form-group">
                            <input type="text" name="name" id="first_name" class="form-input" placeholder="FIRST NAME" :value="name" required autofocus autocomplete="name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" id="last_name" class="form-input" placeholder="LAST NAME" :value="lname" required autofocus autocomplete="lname">
                        </div>
                        <div class="form-group">
                            <input type="text" name="dob" id="u_dob" class="form-input datepicker" placeholder="BIRTHDAY" :value="dob" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <input type="text" name="country_code" id="country_code" class="form-input mr-1 country-code valid" value="+254" :value="country_code" readonly="true" aria-invalid="false">
                                <input type="text" onkeypress="return isNumberKey(event)" name="mobil_num" id="mobil_num" class="form-input" placeholder="MOBILE NUMBER" :value="mobil_num" required autofocus autocomplete="mobil_num">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-input" placeholder="EMAIL ADDRESS" :value="email" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-input" placeholder="PASSWORD" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-input" placeholder="CONFIRM PASSWORD" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <a class="text-gray" href="#" title="FORGOT PASSWORD">FORGOT PASSWORD</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-green">SIGN UP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
