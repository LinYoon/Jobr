<div class="panel panel-default">
  <div class="panel-heading"><h3>Delovno mesto {{$i}}<h3></div>
  <div class="panel-body">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p><i class="fa fa-fw fa-building-o"></i> Ime podjetja</p>
    <p><i class="fa fa-fw fa-clock-o"></i> Datum objave</p>
    <p><i class="fa fa-fw fa-map-marker"></i> Kraj dela</p>
    <a href="{{route('job.details', $i)}}"><button type="button" class="btn btn-info">Več informacij <i class="fa fa-fw fa-angle-double-right"></i></button></a>
  </div>
</div>
