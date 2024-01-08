<div class="login-box">
  <h2>Register</h2>
  <form method="post" action="<?= PATH ?>index.php?page=register">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>User name</label>
    </div>
    <div class="user-box">
      <input type="email" name="email" required="">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <div class="user-box">
      <input type="text" name="photo" required="">
      <label>Photo</label>
    </div>
    <!-- <a href="#"> -->
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button type="submit" name="submit">Register</button>
      
    <!-- </a> -->
  </form>
</div>