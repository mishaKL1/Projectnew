<?php include 'patrials/header.php'; ?>

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Vitajte v osobnom účte</h1>
        <span>Spravujte svoj profil, heslo alebo nám zanechajte spätnú väzbu.</span>
      </div>
    </div>
  </div>
</div>

<section class="page-section" style="padding-top: 80px;">
  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow p-4">
          <h4 class="text-primary text-uppercase mb-4 text-center">Osobný účet</h4>

          <!-- Feedback -->
          <form method="POST" action="autorithation/feedbek.php" class="mb-4">
            <div class="form-group mb-3">
              <label>Napíšte nám svoj názor:</label>
              <textarea class="form-control" name="feedback" rows="3" required></textarea>
            </div>
            <button class="btn btn-info" type="submit">Odoslať spätnú väzbu</button>
          </form>

          <hr>

          <button class="btn btn-warning mb-4" onclick="toggleSection('password-section')">Zmeniť heslo</button>
          <div id="password-section" style="display: none;">
            <form method="POST" action="autorithation\change_password.php?status=success">
              <div class="form-group mb-3">
                <label>Staré heslo:</label>
                <input class="form-control" type="password" name="old_password" required>
              </div>
              <div class="form-group mb-3">
                <label>Nové heslo:</label>
                <input class="form-control" type="password" name="new_password" required>
              </div>
              <button class="btn btn-success" type="submit">Zmeniť heslo</button>
            </form>
          </div>

          <button class="btn btn-danger mb-2" onclick="toggleSection('delete-section')">Deaktivovať účet</button>
          <div id="delete-section" style="display: none;">
            <form method="POST" action="autorithation/delete_account.php" onsubmit="return confirm('Naozaj chcete deaktivovať svoj účet?');">
              <div class="form-group mb-3">
                <label>Zadajte heslo pre potvrdenie:</label>
                <input class="form-control" type="password" name="confirm_password" required>
              </div>
              <button class="btn btn-danger" type="submit">Potvrdiť deaktiváciu</button>
            </form>
          </div>

          <hr>

          <!-- Logout -->
          <form method="POST" action="autorithation/loqout.php">
            <button class="btn btn-secondary" type="submit">Odhlásiť sa</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function toggleSection(id) {
    const section = document.getElementById(id);
    section.style.display = section.style.display === 'none' ? 'block' : 'none';
  }
</script>

<?php include 'patrials/footer.php'; ?>
