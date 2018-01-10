@extends('layouts.app')

@section('content')
<div class="under-nav">
    <div class="container">
      <div class="row">
		  <div class="user-greet row">
				<div class="col-md-2 free">
					<span class="num">320+</span> <br/>delovnih mest</span>
				</div>
				<div class="col-md-10">
					<span class="greeting">
					Pozdravljeni na portalu za iskanje zaposlitve!

					</span>
					@if (Auth::user())
						<span class="region"><b>{{Auth::user()->first_name}}</b>, za vas je prikazanih 332 prostih delovnih mest iz vseh regij.</span>
					@else
						<span class="region">Za vas je prikazanih <b>332</b> prostih delovnih mest iz vseh regij.</span>
					@endif

				</div>
		  </div>
          <form action="#" method="get">
            <div class="col-md-10">
              <input type="text" name="search" class="form-control" id="search" placeholder="Iskanje po ključnih besedah, delodajalcih, kategorijah dela, ...">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-success"> <i class="fa fa-fw fa-search"></i> Iskanje</button>
			</div>
		  </form>

        </div>
      </div>
    </div>
</div>


<div class="container jobs-container">
    <div class="row jobs-row">
      <div class="col-md-4 jobs-col">
        <div class="panel panel-default jobs-panel">
          <div class="panel-body">
		  <nav id="column_left">
	      <ul class="nav nav-list">

        <form action="{{route('getJobs')}}" method="GET" id="filters">
          <!--<input type="submit">-->
        <li><button class="btn btn-info">Počisti vse kriterije</button></li>

        <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu1">
					  <span class="nav-header-primary">Regija<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list" id="submenu1" class="submenu">
            @foreach(App\Region::all() as $region)
            <li>
              <label class="checkbox-inline">
                <input type="checkbox" value="{{$region->id}}" name="regions[{{$region->id}}]" onchange="applyFilter()">
                {{$region->region}} <span class="job-count pull-right">[{{rand(3,20)}}]</span>
              </label>
            </li>
            @endforeach
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">
					  <span class="nav-header-primary">Kategorija dela<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

          <ul class="nav nav-list collapse" id="submenu2" class="submenu">
            @foreach(App\Category::all() as $category)
            <li>
              <label class="checkbox-inline">
                <input type="checkbox" value="{{$category->id}}" name="categories[{{$category->id}}]" onchange="applyFilter()">
                {{$category->category}} <span class="job-count pull-right">[{{rand(3,20)}}]</span>
              </label>
            </li>
            @endforeach
         </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">
					  <span class="nav-header-primary">Stopnja izobrazbe<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu3" class="submenu">
            @foreach(App\Degree::all() as $degree)
            <li>
              <label class="checkbox-inline">
                <input type="checkbox" value="{{$degree->id}}" name="degrees[{{$degree->id}}]" onchange="applyFilter()">
                {{$degree->name}} <span class="job-count pull-right">[{{rand(3,20)}}]</span>
              </label>
            </li>
            @endforeach
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
					  <span class="nav-header-primary">Vrsta zaposlitve<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>


          <ul class="nav nav-list collapse" id="submenu4" class="submenu">
            @foreach(App\JobType::all() as $type)
            <li>
              <label class="checkbox-inline">
                <input type="checkbox" value="{{$type->id}}" name="types[{{$type->id}}]" onchange="applyFilter()">
                {{$type->type}} <span class="job-count pull-right">[{{rand(3,20)}}]</span>
              </label>
            </li>
            @endforeach
			    </ul>
			  </li>

        <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">
					  <span class="nav-header-primary">Vrsta zaposlitve<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>
          <ul class="nav nav-list collapse" id="submenu5" class="submenu">
            spremeni na čas dopoldne, popoudne
            @foreach(App\JobType::all() as $type)
            <li>
              <label class="checkbox-inline">
                <input type="checkbox" value="{{$type->id}}" name="types[{{$type->id}}]" onchange="applyFilter()">
                {{$type->type}} <span class="job-count pull-right">[{{rand(3,20)}}]</span>
              </label>
            </li>
            @endforeach
          </ul>
			  </li>

        <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">
					  <span class="nav-header-primary">Delo od doma<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>
          <ul class="nav nav-list collapse" id="submenu6" class="submenu">


            <li>
              <label class="checkbox-inline">
                <input type="checkbox" value="0" name="home[0]" onchange="applyFilter()">
                Ja <span class="job-count pull-right">[{{rand(3,20)}}]</span>
              </label>
            </li>

            <li>
              <label class="checkbox-inline">
                <input type="checkbox" value="1" name="home[1]" onchange="applyFilter()">
                Ne <span class="job-count pull-right">[{{rand(3,20)}}]</span>
              </label>
            </li>

          </ul>
			  </li>
      </form>
		</ul>

		</nav>
      </div>
    </div>
  </div>

    <div class="col-md-8">
		  <div class="row">
			  <div class="col-md-6">
          <ul class="pagination">
      		  <li><a>Stran:</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
          </ul>
        </div>
			  <div class="col-md-6">
				  <div class="row">
					  <div class="col-md-3" style="line-height: 32px;">
						  Razvrsti:
					  </div>
					  <div class="col-md-9">
						  <select name="" id="" class="form-control">
							  <option value="1">A-Z</option>
							  <option value="1">A-Z</option>
							  <option value="1">A-Z</option>
						  </select>
					  </div>
				  </div>

		  </div>
      </div>
        <div id="job-list">
            @include('inc.job-list')
          </div>
        </div>
      </div>
@endsection
