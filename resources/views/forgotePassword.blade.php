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
            <form id="forgotePassword" method="POST">
                <input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
                <h1>Forgot Password</h1>
                <div class="auth-input">
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" required="" />
                </div>
                <div class="auth-input">
                    <button type="submit" class="btn btn btn-success forgotr-btn">Submit</button>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">New to site?
                    <a href="{{ route('/admin/login') }}"> Login </a>
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
