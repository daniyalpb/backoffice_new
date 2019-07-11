<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128559426-1"></script>

<!-- /////////////////////////////////
 --> <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> -->  
<!-- ////////////////////////////////////
 --><script>


  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128559426-1');
</script>

<div class="container-fluid hedr">
<div class="col-md-1 col-xs-1 no-mob-pad">
<div id="sidebarCollapse" class="menu-btn"  >
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  </div>
</div>
<div class="col-md-2 col-xs-4 no-mob-pad"><a href="{{url('dashboard')}}"><img src="{{url('images/logo1.png')}}" class="img-responsive logo pull-left"/></a></div>
<div class="col-md-3">
<div class="search-dv pull-left">

</div>
</div>
<div class="col-md-5 col-xs-5 no-mob-pad">
<div class="pull-right log-txt">

 
<p><span class="hidden-xs">Welcome :</span><b>  @if($username= Session::get('username')) {{ucfirst($username)}}  @endif</b></p>
<p><span class="hidden-xs">Last login :</span> <b>@if($last_login= Session::get('last_login')) <?php $date = date_create($last_login); ?> {{date_format($date, 'd/m/y : g:i A')}}  @endif</b></p>


 


</div>
</div>
<div class="col-md-1 col-xs-2 no-mob-pad"><a href="{{url('log-out')}}" class="pull-right log-btn"><span class="logout-btn"><img src="{{url('images/icon/exit.png')}}"></span></a></div>
<span class="search-btn hidden-md hidden-lg pull-right"><img src="{{url('images/icon/search.png')}}"></span>
</div>