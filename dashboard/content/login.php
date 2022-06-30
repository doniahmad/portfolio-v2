<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
    $data = mysqli_fetch_assoc($query);
    if (!empty($data)) {
        $_SESSION['username'] = $data['username'];
        header('Location:' . $path . "?page=project");
    }
}


?>
<div class="login">
    <div class="login-form">
        <h1>Login</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>