@yield('home')
@if (isset($objComments))
<div class="fill d-flex justify-content-center align-items-center">
  <div class="comment">
    <a href="/#{{ $_GET['postID'] }}">
    <i class="close mx-3 img fas fa-times-circle"></i> 
    </a>
    <div class="comm">
    @foreach ( $objComments as $item)
    <div class="container">
        <div class="post px-5 py-3 my-3">
          <div class="title d-flex justify-content-between">
            <div class="d-flex">
              @if (!empty($item['userImage']))
              <img class="mx-3" src="{{ asset( '/image/' . $item['userImage'] ) }}" />
              @else
              <i class="mx-3 img fas fa-user-tie"></i>
              @endif
              <div class="Name">
                  {{ $item['userName']}} 
              </div>
            </div>
              @if ($item['myID'] == $ID)
                <a class="p-2" href="/comDel?comID={{ $item['comID'] }}&userID={{ $item['myID'] }}&postID={{ $item['postID'] }}">
                <i class="far text-dark fa-times-circle fa-2x"></i>
                </a>
    
              @endif
          </div>
  
          <div class="bodycomment py-2">
            {{ $item['comment'] }}
        </div>
        <div class="text-muted">
           <small> {{ $item['dateComment'] }} </small>
        </div>
  
        </div>
    </div>
    @endforeach
    </div>
  <div class="publishComment">
  <form class="px-3 d-flex" method="GET" action="/home/comment">
    <textarea type="text" name="myComment" class="form-control textPublished" placeholder="Enter Your Comment"></textarea>
    <input type="hidden" value="{{ $_GET["postID"] }}" name="postID">
    <button class="btn btn-outline-primary mx-2">
    Publish
    </button>
  </form>
  </div>
</div>
</div>
    @if (isset($_GET['myComment']))
      {{ $_GET['myComment'] = null }}
    @endif
@else
<form class="d-flex justify-content-center my-3" action="/" method="GET">
<select name="type" class="form-control form-control-lg type mx-3">
<option value = "Other">Article Type...</option>
<option value = "Economy">Economy</option>
<option value = "Politics">Politics</option>
<option value = "Historical">Historical</option>
<option value = "Social">Social</option>
<option value = "Tips">Tips</option>
<option value = "Novels">Novels</option>
<option value = "opinions">opinions</option>
</select>
<button class="btn btn-outline-primary" ><i class="fas fa-search mx-2"></i>Search</button>
</form>
@foreach ( $obj as $item)
  <div class="container" id = {{ $item['postID'] }}>
      <div class="post px-5 py-3 my-3">
        <div class="title d-flex justify-content-between">
        <div class=" d-flex">
            @if (!empty($item['userImage']))
            <img class="mx-3" src="{{ asset( '/image/' . $item['userImage'] ) }}" />
            @else
            <i class="mx-3 img fas fa-user-tie"></i>
            @endif
            <div class="Name">
                {{ $item['userName']}} 
            </div>
        </div>
        @if ($item['userID'] == $ID)
        <button class="icon px-4">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <div class="show hide">
          <form action="/Posts" method="GET">
            <input type="hidden" name="title" value="{{ $item['title'] }}" />
            <input type="hidden" name="type"  value="{{ $item['type'] }}"/>
            <input type="hidden" name="body"  value="{{ $item['body'] }}"/>
            <input type="hidden" name="postID"  value="{{ $item['postID'] }}"/>
            <button>Update Post</button>
          </form>
          <a href="/postDel?postID={{ $item['postID'] }}&userID={{ $item['userID'] }}">Delete Post</a>
        </div>
        @endif
        </div>
        <div class="body py-2">
          <h5 class="title1"> 
              {{ $item['title'] }}
          </h5>
            {{ $item['body'] }}
        </div>
        <small class="text-muted ml-5">{{ $item['postDate'] }}</small>
        <input name="userID"  class="userID" type="hidden" value="{{ $ID }}" />
        <div class="end d-flex justify-content-between py-2">
          @if ($item['rate'] === null)
          <input name="postRate" class="rateVal" type="hidden" value= 'insert' />
          <button class="rate Like rate1"><i class="far fa-thumbs-up mx-2"></i>Like</button>
          <button class="rate DisLike rate1"><i class="far fa-thumbs-down mx-2"></i>Dislike</button>
          @elseif ($item['rate'] == 1)
          <input name="postRate" class="rateVal" type="hidden" value= 'true' />
          <button style="background-color: rgb(0, 21, 138); color: white" class="rate Like rate1"><i class="far fa-thumbs-up mx-2"></i>Like</button>
          <button class="rate DisLike rate1"><i class="far fa-thumbs-down mx-2"></i>Dislike</button>
          @else
          <input name="postRate" class="rateVal" type="hidden" value= 'false' />
          <button class="rate Like rate1"><i class="far fa-thumbs-up mx-2"></i>Like</button>
          <button style="background-color: rgb(0, 21, 138); color: white" class="rate DisLike rate1"><i class="far fa-thumbs-down mx-2"></i>Dislike</button>
          @endif
          <form action="/home/comment" method="GET">
          <input class="postID" name="postID" type="hidden" value="{{ $item['postID'] }}"/>
          <button class="rate"><i class="far fa-comment mx-2"></i>Comment</button>
          </form>
        </div>

      </div>
  </div>
@endforeach

@endif


<script src="{{ asset("/js/home.js") }}"></script>