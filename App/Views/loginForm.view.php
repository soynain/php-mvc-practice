<main class="d-flex justify-content-center align-items-center min-vh-100">
    <form class="w-50 p-3 border border-dark rounded" action="/login/loginpost" method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input placeholder="Type your username..." type="text" name="usernametxt" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input placeholder="Type your password..." type="password" name="userpass" class="form-control">
        </div>
        <input type="button" value="Login" class="btn btn-primary">
    </form>
</main>