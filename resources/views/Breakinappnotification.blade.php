<!DOCTYPE html>
<html>
<head>	
</head>
<style type="text/css">
	.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}
.bg-light {
    background-color: #f8f9fa!important;
}
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
}
*, ::after, ::before {
    box-sizing: border-box;
}
</style>
<body>
<div class="container-fluid white-bg col-md-12">
<div class="col-md-12"><h3 class="mrg-btm"></h3></div>
@foreach($data as $val)
 <div class="card bg-light mb-3" style="max-width: 50rem;"> 
  <div class="card-header">{{$val->Notification_Title}}</div>
  <div class="card-body">   
    <p class="card-text">{{$val->Notification_Body}}</p>
  </div>
</div>
 @endforeach
</div>
</body>
</html>