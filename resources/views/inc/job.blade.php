<div class="panel panel-default">
  <div class="panel-heading"><h3>Job offer Title #{{$i}}<h3></div>
  <div class="panel-body">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Company name</p>
    <p> hourly wage</p>
    <p> Work address</p>
    <a href="{{route('job.details', $i)}}"><button type="button" class="btn btn-primary">more details</button></a>
  </div>
</div>