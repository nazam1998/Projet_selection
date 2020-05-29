<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="box">
        <div class="box__ghost">
          <div class="symbol"></div>
          <div class="symbol"></div>
          <div class="symbol"></div>
          <div class="symbol"></div>
          <div class="symbol"></div>
          <div class="symbol"></div>
          
          <div class="box__ghost-container">
            <div class="box__ghost-eyes">
              <div class="box__eye-left"></div>
              <div class="box__eye-right"></div>
            </div>
            <div class="box__ghost-bottom">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
          <div class="box__ghost-shadow"></div>
        </div>
        
        <div class="box__description text-center">
          <div class="box__description-container">
            <div class="box__description-title">Whoops!</div>
            <div class="box__description-text">It seems like we couldn't find the page you were looking for</div>
          </div>
          
          <a style="padding: 12px 16px;" href="{{ URL::previous()}}"class="btn btn-blue">Go back</a>
          
        </div>
        
      </div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <script>
          //based on https://dribbble.com/shots/3913847-404-page

var pageX = $(document).width();
var pageY = $(document).height();
var mouseY=0;
var mouseX=0;
$(document).mousemove(function( event ) {
  //verticalAxis
  mouseY = event.pageY;
  yAxis = (pageY/2-mouseY)/pageY*300; 
  //horizontalAxis
  mouseX = event.pageX / -pageX;
  xAxis = -mouseX * 100 - 100;

  $('.box__ghost-eyes').css({ 'transform': 'translate('+ xAxis +'%,-'+ yAxis +'%)' }); 

  //console.log('X: ' + xAxis);

});
      </script>


</body>
@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection
</html>
