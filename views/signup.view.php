<?php require "views/partials/header.view.php" ?>

    <form action="/admin/createuser" method="POST" >

    <div class="form-group">
        <label for="user_name">Name</label>
        <input type="text" required name="user_name" id="name" class="form-control" >
    </div>
        <div class="form-group">
            <label for="user_lastname">Lastname</label>
            <input type="text" required name="user_lastname" id="name" class="form-control" >
        </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" required name="email" id="email" class="form-control" >
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" required name="user_password" id="password" class="form-control" >
    </div>

    <button class="btn btn-primary">Submit</button>
</form>
<?php require "views/partials/footer.view.php" ?>
