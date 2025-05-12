<?php include 'patrials/header.php'; ?>

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Users</h1>
        <span>Admin Panel</span>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once 'db/db.php';

      $conn = Database::getConnection();

      $sql = "SELECT id, username, email, password, role FROM users";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($users) > 0) {
        foreach ($users as $user) {
          echo "<tr>
                  <td>" . htmlspecialchars($user["id"]) . "</td>
                  <td>" . htmlspecialchars($user["username"]) . "</td>
                  <td>" . htmlspecialchars($user["email"]) . "</td>
                  <td>" . htmlspecialchars($user["password"]) . "</td>
                  <td>" . htmlspecialchars($user["role"]) . "</td>
                  <td>
                    <a href='delete_user.php?id=" . htmlspecialchars($user["id"]) . "' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No users found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include 'patrials/footer.php'; ?>
