@extends('layouts.app')

@section('content')
<div class="under-nav">
    <div class="container">
      <div class="row">
		  <div class="user-greet row">
				<div class="col-md-2 free">
					<span class="num">35+</span> <br/>podjetij</span>
				</div>
				<div class="col-md-10">
					<span class="greeting">
					Pozdravljeni na portalu za iskanje zaposlitve!

					</span>
					@if (Auth::user())
						<span class="region"><b>{{Auth::user()->first_name}}</b>, za vas je prikazanih 332 podjetij, ki ponujajo zaposlitev.</span>
					@else
						<span class="region">Za vas je prikazanih <b>332</b> podjetij, ki ponujajo zaposlitev.</span>
					@endif

				</div>
		  </div>
          <form action="#" method="get">
            <div class="col-md-10">
              <input type="text" name="search" class="form-control" id="search" placeholder="Iskanje po ključnih besedah">
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
		  	<li><button class="btn btn-info">Počisti vse kriterije</button></li>
		  	<li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu1">
					  <span class="nav-header-primary">Kriterij 1<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list" id="submenu1" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Spodnjeposavska <span class="job-count pull-right">[15]</span>
							</label>
						</li>
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">
					  <span class="nav-header-primary">Kriterij 2<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu2" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Administracija <span class="job-count pull-right">[164]</span>
							</label>
						</li>
			    </ul>
			  </li>

			  <li>
		    	<a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">
					  <span class="nav-header-primary">Kriterj 3<span class="pull-right"><i class="fa fa-fw fa-plus"></i></span></span>
					  <span class="criteria">Ni izbranih kriterijev</span>
		    	</a>

			    <ul class="nav nav-list collapse" id="submenu3" class="submenu">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" value="">I. - 7 razredov osnovne šole ali manj <span class="job-count pull-right">[164]</span>
							</label>
						</li>
			    </ul>
			  </li>
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
      <div>
        @foreach($companies as $company)
          @include('inc.company')
        @endforeach
      </div>
    </div>
</div>
@endsection
