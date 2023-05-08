<?php

$title = "LoginForm";
require_once "layout/header.php";
require_once "db/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $new_password = md5($password . $username);

    $result = $user->getUser($username, $new_password);
    if (!$result) {
        echo '<div class="alert alert-danger">username or password is invalid. Please try again</div>';
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result["id"];
        header("Location:index.php");
    }
}

?>
<div class="card" style="position:absolute; top:50%; left:50%; transform: translate(-50%, -50%); width: 35rem; height: 25rem;">


    <h1 class="text-center pt-5"><?php echo "Login"; ?></h1>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <div class="form-group">
            <div class="text-center">
                <label style="display:block" for="username" class="mb-3 mt-3">Username</label>
                <input type="text" name="username" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_POST["username"]; ?>" class="form-control" style="width: fit-content; display:inline">
            </div>
        </div>
        <div class="form-group">
            <div class="text-center">
                <label style="display:block" for="password" class="mb-2 mt-3">Password</label>
                <input type="password" name="password" class="form-control" style="width: fit-content; display:inline">
            </div>

        </div>
        <div class="text-center">
            <input type="submit" name="submit" value="Login" class="btn btn-primary my-3">
        </div>
    </form>
</div>
</div>
</body>

</html>