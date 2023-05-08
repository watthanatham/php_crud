<?php

$title = "AddUser";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_permission.php";


// submit button
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $user->insertUser($username, $password);
    if ($result) {
        $message = "Insert account successfully.";
        require_once "layout/success_message.php";
    } else {
        $message = "This username is already to use. Please try again.";
        require_once "layout/error_message.php";
    }
}

?>
<h1 class="text-center"><?php echo "Add User Account"; ?></h1>
<form method="POST" action="addUser.php" class="text-center">
    <div class="form-group mb-3">
        <label for="username" class="mb-3">Username</label>
        <div class="text-center">
            <input style="width: fit-content; display:inline" type="text" name="username" class="form-control">
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="password" class="mb-3" style="display: block;">Password</label>
        <input style="width: fit-content; display:inline" type="password" name="password" class="form-control">
    </div>
    <div class="text-center">
        <input type="submit" name="submit" value="Save" class="btn btn-primary my-3">
    </div>

</form>
</div>
</body>

</html>