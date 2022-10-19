@extends('layouts.app')

@section('content')
<body style="background: rgb(207, 239, 253)">
<section class="login_box_area section_gap">
		<div class="container containerbet">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('assets/img/ok2.jpg')}}" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
					
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner" style="background-color: #fff;">
						<h3>Registrate</h3>
						<form class="row login_form"  method="POST" action="{{ route('register') }}"  id="contactForm" 
                        novalidate="novalidate">
                        @csrf
							<div class="col-md-12 form-group">

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                

							</div>
							<div class="col-md-12 form-group">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							</div>

                            <div class="col-md-12 form-group">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-12 form-group">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="confirm-Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'confirm-Password'" autocomplete="new-password">
                                    

                            </div>

							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn btn-primary w-100" style="border-radius: 40px;">  {{ __('Register') }}</button>
								
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
