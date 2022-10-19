@extends('layouts.app')

@section('content')
<body style="background: rgb(207, 239, 253)">

	<!--================ Area del Login =================-->
	<section class="login_box_area section_gap">
		<div class="container containerbet">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('assets/img/ok2.jpg')}}" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="{{ route('register') }}">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner" style="background-color: #fff;">
						<h3>Iniciar sesión</h3>
						<form method="POST" action="{{ route('login') }}" class="row login_form" method="post" id="contactForm" novalidate="novalidate">
                        @csrf

							<div class="col-md-12 form-group">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
							</div>

							<div class="col-md-12 form-group">
			
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"  required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            

							</div>


							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label for="f-option2" class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn btn-primary w-100" style="border-radius: 40px;"> {{ __('Login') }}
                            </button>

							
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<style>

		.containerbet {
          margin-top: 20px;
          padding: 50px;
			position: absolute;
			left: 50%;
			top: 50%;
			/*background: rgb(70, 8, 151);*/
			transform: translateX(-50%) translateY(-50%);	
		}
	</style>



@endsection
