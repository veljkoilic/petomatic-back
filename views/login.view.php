<?php require "views/partials/header.view.php" ?>

<form action="/admin/validate" method="POST" >
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" required name="email" id="email" class="form-control" >
    </div>
    <div class="form-group">
        <label for="user_password">password</label>
        <input type="password" required name="user_password" id="password" class="form-control" >
    </div>

    <button class="btn btn-primary">Submit</button>
</form>
<?php require "views/partials/footer.view.php" ?>
