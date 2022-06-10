<div id="app">
  <section class="section">
    
    <div class="container mt-5">
      <?php if($this->session->has_userdata('gagal')){ ?>
      <div class="alert alert-danger" role="alert">
        Username dan password anda salah!
      </div>
      <?php } ?>
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="<?= base_url('assets/img/nasgor_andaru.png'); ?>" alt="logo" width="200" class="shadow-light rounded-circle">
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Login Admin</h4></div>

            <div class="card-body">
              <form method="POST" action="<?= base_url('auth/login'); ?>">
                <div class="form-group">
                  <label for="nmadmin">Username</label>
                  <input id="nmadmin" type="text" class="form-control" name="nmadmin" tabindex="1" required>
                </div>

                <div class="form-group">
                  <div class="d-block">
                  	<label for="password" class="control-label">Password</label>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; Stisla 2018
          </div>
        </div>
      </div>
    </div>
  </section>
</div>