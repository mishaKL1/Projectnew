<?php include 'patrials/header.php'; ?>


    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1></h1>
            <span></span>
          </div>
        </div>
      </div>
    </div>

<section class="page-section" id="account" style="padding-top: 80px;">
  <div class="container mb-5" >
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-4">

          <h4 class="text-primary text-uppercase mb-3 text-center" id="form-title">Registrácia</h4>

          <form id="register-form" method="POST" action="register_process.php">
            <div class="form-group mb-3">
              <input class="form-control" type="text" name="username" placeholder="Používateľské meno *" required>
            </div>
            <div class="form-group mb-3">
              <input class="form-control" type="email" name="email" placeholder="Email *" required>
            </div>
            <div class="form-group mb-3">
              <input class="form-control" type="password" name="password" placeholder="Heslo *" required>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Registrovať sa</button>
          </form>


          <form id="login-form" method="POST" action="login_process.php" style="display: none;">
            <div class="form-group mb-3">
              <input class="form-control" type="email" name="email" placeholder="Email *" required>
            </div>
            <div class="form-group mb-3">
              <input class="form-control" type="password" name="password" placeholder="Heslo *" required>
            </div>
            <button class="btn btn-success btn-block" type="submit">Prihlásiť sa</button>
          </form>

          <div class="text-center mt-4">
            <button class="btn btn-link" id="toggle-button">Máte účet? Prihlásiť sa</button>
          </div>

        </div>
      </div>
    </div>



</section>

<script>
  const toggleButton = document.getElementById('toggle-button');
  const registerForm = document.getElementById('register-form');
  const loginForm = document.getElementById('login-form');
  const formTitle = document.getElementById('form-title');

  toggleButton.addEventListener('click', () => {
    if (registerForm.style.display === 'none') {
      registerForm.style.display = 'block';
      loginForm.style.display = 'none';
      formTitle.textContent = 'Registrácia';
      toggleButton.textContent = 'Máte účet? Prihlásiť sa';
    } else {
      registerForm.style.display = 'none';
      loginForm.style.display = 'block';
      formTitle.textContent = 'Prihlásenie';
      toggleButton.textContent = 'Nemáte účet? Registrovať sa';
    }
  });
</script>

<?php include 'patrials/footer.php'; ?>
