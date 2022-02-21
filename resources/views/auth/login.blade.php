<style>
    input[type=email], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type=password], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
</style>

<x-guest-layout>
    <x-jet-authentication-card>

        @php if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass']))
        {
           $login_email = $_COOKIE['login_email'];
           $login_pass  = $_COOKIE['login_pass'];
           $is_remember = "checked='checked'";
        }
        else{
           $login_email ='';
           $login_pass = '';
           $is_remember = "";
         }
        @endphp


        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        {{-- @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif --}}

        <form method="POST" action="{{ route('login') }}">
            @csrf
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email ') }}</label>
               
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$login_email}}" required autocomplete="email" autofocus>
                </div>
                
            </div>

            <div class="mt-4">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{$login_pass}}">
                </div>
            </div>
            

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme" {{$is_remember}} {{ old('rememberme') ? 'checked' : '' }}>

                        <label class="form-check-label" for="rememberme">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
