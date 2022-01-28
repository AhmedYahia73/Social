
@if (isset($_GET['postID']))
<form action="/updatePost" method="GET">
<input type="hidden" value="{{ $_GET['postID'] }}" />
<div class="myInputsDiv">
    <h3 class="my-3 text-center">Publish Your Article</h3>
    <div class="d-flex justify-content-center my-3">
        <div class='p-2 success bg-success text-light'>
        {{ $success }}
        </div>
    </div>
    <div class="input-group my-3">
        <input type="text" value="{{ $_GET['title'] }}" name="title" class="form-control" placeholder="Title">
    </div>
<div class="input-group my-3">
<select  value="{{ $_GET['type'] }}" name="type" class="form-control form-control-lg">
<option value = "{{  $_GET['type'] }}">{{ $_GET['type'] }}</option>
<option value = "Other">Article Type...</option>
<option value = "Economy">Economy</option>
<option value = "Politics">Politics</option>
<option value = "Historical">Historical</option>
<option value = "Social">Social</option>
<option value = "Tips">Tips</option>
<option value = "Novels">Novels</option>
<option value = "opinions">opinions</option>
</select>
</div>
<div class="input-group textarea1 mb-3">
    <textarea class="form-control" name="body" placeholder="Enter Your Post" >{{ $_GET['body'] }}</textarea>
</div>
<div class="input-group my-3">
    <button type="submit" class="btn btn-primary px-4" >
    <i class="fas  fa-share"></i>
    Update
    </button>
    <a href="/Posts" class="btn btn-danger mx-3 px-4" >
    <i class="fas fa-minus-circle"></i>
    Clear
</a>
</div>
</div>
</form>
@else
<form action="/post" method="GET">
<div class="myInputsDiv">
    <h3 class="my-3 text-center">Publish Your Article</h3>
    <div class="d-flex justify-content-center my-3">
        <div class='p-2 success bg-success text-light'>
        {{ $success }}
        </div>
    </div>
    <div class="input-group my-3">
        <input type="text" name="title" class="form-control" placeholder="Title">
    </div>
<div class="input-group my-3">
<select name="type" class="form-control form-control-lg">
<option value = "Other">Article Type...</option>
<option value = "Economy">Economy</option>
<option value = "Politics">Politics</option>
<option value = "Historical">Historical</option>
<option value = "Social">Social</option>
<option value = "Tips">Tips</option>
<option value = "Novels">Novels</option>
<option value = "opinions">opinions</option>
</select>
</div>
<div class="input-group textarea1 mb-3">
    <textarea class="form-control" name="body" placeholder="Enter Your Post" ></textarea>
</div>
<div class="input-group my-3">
    <button type="submit" class="btn btn-primary px-4" >
    <i class="fas  fa-share"></i>
    Share
    </button>
    <a href="/Posts" class="btn btn-danger mx-3 px-4" >
    <i class="fas fa-minus-circle"></i>
    Clear
</a>
</div>
</div>
</form>
@endif