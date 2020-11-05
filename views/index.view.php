
<div class="row">
    <div class="col">
        <h2>Sign In</h2>
        
        <form action="/mycine/core/database/insertUser.php" method="POST">
        <div class="form-group">     
        <input type="text" name="name" placeholder="Name" class="form-control" required>
        <?php require 'selectCountry.php'; ?>
        <input type="password" name="password-1" class="form-control" placeholder="Password" required>
        <input type="password" name="password-2" class="form-control" placeholder="Repeat Password" required>
        <input type="submit" name="submit" class="btn btn-outline-success btn-block" required>
        </div>
        </form>
    </div>
    <div class="col">
    <h2>Login in</h2>

<form action="/mycine/core/database/selectUser.php" method="POST">
<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Name" required>
<input type="password" name="password-1" class="form-control" placeholder="Password" required>
<input type="submit" name="submit" class="btn btn-outline-primary btn-block" required>
</div>
</form>
</div>
</div>