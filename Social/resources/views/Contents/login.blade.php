<div class="d-flex justify-content-center">
<div class="log">
    <p class="logData">UserName: ahmed</p>
    <p class="logData2">Password: 123456789</p>
<form action="/login" method="POST">
    @csrf
        <h3 class="mb-5 text-center">Welcom In <span class="text-success">Our</span> <span class="text-primary"> Social Site</span></h3>
        <div class="input-group my-3">
            <input type="text" name="userName" class="form-control" placeholder="User Name" required>
        </div>
    <div class="input-group mb-3">
        <input type="password" minlength="8" name="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="d-flex justify-content-center  align-items-center my-3">
        <button class="btn btn-primary formbtn my-2 px-4">
        <i class="fas fa-sign-in-alt mx-1"></i>
        Login
        </button>
        <a href="/reg" class="btn btn-success mx-3 formbtn px-4" >
        <i class="far mx-1 fa-clipboard"></i>
        Make New Account
        </a>
    </div>
    </form>
</div>
</div>