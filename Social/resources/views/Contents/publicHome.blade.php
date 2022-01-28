@yield('home')
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
        <div class="title d-flex">
            @if (!empty($item['userImage']))
            <img class="mx-3" src="{{ asset( '/image/' . $item['userImage'] ) }}" />
            @else
            <i class="mx-3 img fas fa-user-tie"></i>
            @endif
            <div class="Name">
                {{ $item['userName']}} 
            </div>
        </div>


        <div class="publicBody py-2">
          <h5 class="title1"> 
              {{ $item['title'] }}
          </h5>
            {{ $item['body'] }}
        </div>

        <small class="text-muted ml-5">{{ $item['postDate'] }}</small>
      </div>
  </div>
@endforeach