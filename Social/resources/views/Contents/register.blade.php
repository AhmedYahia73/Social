<div class="d-flex justify-content-center">
    <div class="log">
    <form action="/register" method="POST">
        @csrf
        <h3 class="mb-5 text-center">Welcom In <span class="text-success"> Our </span><span class="text-primary"> Social Site</span></h3>
        <div class="input-group my-3">
            <input type="text" name="userName" class="form-control" placeholder="User Name" required>
        </div>

        <div class="input-group mb-3">
            <input type="password" minlength="8" name="password1" class="form-control" placeholder="Password" required>
        </div>

        <div class="input-group mb-3">
            <input type="conPassword" minlength="8" name="password2" class="form-control" placeholder="Confirm Password" required>
        </div>

        <div class="input-group my-3">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
        </div>

        <div class="input-group my-3">
            <input type="text" name="phone" class="form-control" placeholder="Your Phone" required>
        </div>

        <div class="d-flex justify-content-center  align-items-center my-3">
            <button class="btn btn-primary formbtn my-2 px-4">
            <i class="far mx-1 fa-clipboard"></i>
            Submit
            </button>
            <a href="/reg" class="btn btn-danger mx-3 formbtn px-4" >
            <i class="fas fa-minus-circle"></i>   
            Clear</a>
        </div>
        </form>
    </div>
    </div>