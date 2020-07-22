@include('auth.template.header')
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @if(session()->has('success_msg'))
            <div class="alert alert-success">
                {{ session()->get('success_msg') }}
            </div>
            @endif
            @if(session()->has('error_msg'))
            <div class="alert alert-danger">
                {{ session()->get('error_msg') }}
            </div>
            @endif
            <form id="trainerresetPassword" method="POST">
                <input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
                <input type="hidden" name="rememberToken"  id="rememberToken" value="{{ $token }}">
                <h1>Reset Password</h1>
                <div class="auth-input">
                    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password" required="" />
                </div>
                <div class="auth-input">
                    <input type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}" class="form-control @error('') is-invalid @enderror" placeholder="Enter Confirm Password" required="" />
                </div>
                <div class="auth-input">
                    <button type="submit" class="btn btn btn-success reset-pwd-btn">Submit</button>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="{{ url('trainer/login') }}"> Login </a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <h1><i class="fa fa-paw"></i> WellFit360</h1>
                        <p>©2020 All Rights Reserved.</p>
                    </div>
                </div>
            </form>
          </section>
        </div>
      </div>
    </div>
@include('auth.template.footer')
