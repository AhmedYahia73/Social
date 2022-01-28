<div class="d-flex justify-content-center">
<div class="main">
<form class="d-flex justify-content-center align-items-start" action="/UpdateProfile" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="myDiv d-flex justify-content-center mt-4">
        @if (empty($obj[0]['userImage']))
        <i class="m-3 my-4 img fas fa-user-tie"></i>
        @else
        <div class="profileImg">
        <img src="{{ asset('/image/' . $obj[0]['userImage']) }}" />
    </div>
        @endif
    </div>

    <div class="input-group mb-2 pt-4  d-flex justify-content-center">
        <input type="file" id="userImg" class="form-control d-none" name="userImg" />
        <label for="userImg" class="btn btn-outline-dark">
        <i class="fas fa-upload mx-1"></i>
        Upload Image
        <label>
    </div>
    <input type="hidden" value="{{ $obj[0]['userImage'] }}" name="myImg" />


    <div class="input-group mb-3 pt-4">
        <input type="text" class="form-control" value="{{ $obj[0]['userName'] }}" name="userName" placeholder="UserName" required/>
    </div>
    <div class="input-group mb-3">
        <input type="password" minlength="8" class="form-control" name="oldPassword" placeholder="Enter Your Password" required/>
    </div>
    <div class="input-group mb-3">
        <input type="password" minlength="8" class="form-control" name="newPassword" placeholder="New Password" />
    </div>
    <div class="input-group mb-3">
        <input type="email" class="form-control" value="{{ $obj[0]['email'] }}" name="email" placeholder="Email" required/>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $obj[0]['phone'] }}" name="phone" placeholder="Phone" required/>
    </div>
    <div class="input-group mb-3">
        <button class="btn btn-primary px-4" >
        <i class="fas fa-save"></i>
        Save
        </button>
        <a href="/Profile" class="btn btn-danger mx-3 px-4">
        <i class="fas fa-minus-circle"></i>    
        Clear
        </a>
    </div>
</form>
</div>
</div>