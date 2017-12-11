@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="row">
<div class="col-md-6 col-md-offset-3">
    <form id="msform" method="POST" action="{{ route('register.company') }}">
        {{ csrf_field() }}
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Podatki o podjetju</li>
            <li>Izobrazba in izkušnje</li>
            <li>Nastavitve računa</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Podatki o podjetju</h2>
            <h3 class="fs-subtitle">Prosimo izpolnite zahtevane podatke</h3>
            <input type="text" name="name" placeholder="* Naziv podjetja" required/>
            <input type="text" name="address" placeholder="* Naslov podjetja" required/>
            <input type="text" name="post" placeholder="* Poštna številka" />
            <input type="text" name="city" placeholder="* Mesto"/>
            <input type="text" name="davcna" placeholder="* Davčna številka" />
            <input type="text" name="website" placeholder="Spletna stran" />
            <input type="button" name="next" class="next action-button" value="Naprej"/>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Dodatni podatki</h2>
            <h3 class="fs-subtitle">Prosimo izpolnite zahtevane podatke</h3>
            <input type="text" name="expertise_area" placeholder="* S čim se podjetje ukvarja" required/>
            <input type="text" name="contact" placeholder="* Kontaktna oseba" required/>
            <textarea name="desc" id="desc" placeholder="Kratek opis podjetja..." rows="5"></textarea>
            <input type="button" name="previous" class="previous action-button-previous" value="Nazaj"/>
            <input type="button" name="next" class="next action-button" value="Naprej"/>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Nastavitve računa</h2>
            <h3 class="fs-subtitle">Izpolnite podatke s katerimi se boste prijavili</h3>
            <input type="text" name="email" placeholder="* Email" required/>
            <input type="password" name="password" placeholder="* Geslo" required/>
            <input type="password" name="password_confirmation" placeholder="* Potrdite geslo" required/>
            <input type="button" name="previous" class="previous action-button-previous" value="Nazaj"/>
            <button type="submit" name="submit" class="submit action-button">Potrdi</button>
        </fieldset>
    </form>
</div>
</div>
</div>
@endsection
