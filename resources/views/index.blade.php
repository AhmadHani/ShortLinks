@extends("default")

@section("content")

  <nav>
      <div class="container">

    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Short Links</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/">Short</a></li>
        <li><a href="badges.html">About Me</a></li>
        
      </ul>
    </div>
    </div>
  </nav>
  <div class="container">
        <div  id="welcome">
        <h3>Shorten links for free, easy to use and simple</h3>
       
        @if(count($errors) > 0)
        	@foreach($errors->all() as $error)
        	 <div  class='error'>
        		{{$error}}
        		</div>
        	@endforeach
        @endif

        @if(count($s) > 0)
        <div class="success">
localhost:8000/{{$s->short}}
</div>
@endif
      
       <div class="row">
    <form class="col s12" action="/" method="POST">
      <div class="row">
        <div class="input-field col s12">
       	{{ csrf_field()}}
          <input id="text"  type="text" name="link" placeholder="https://www.google.com" class="validate">
          <label for="text" data-error="wrong" data-success="right">Link</label>
           <input type="submit" name='short' class="btn waves-effect waves-light" value="Short" />

   
        </div>
      </div>
      </form>

  </div>
        
        </div>
        

        </div>

     <footer class="page-footer">
         
          <div class="footer-copyright">
            <div class="container">
            © 2016 Copyright Text
            <a class="grey-text text-lighten-4 right" href="http://www.ahmadhani.tk">Ahmad Hani</a>
            </div>
          </div>
        </footer>


@stop