@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="row">
<div class="col-md-6 col-md-offset-3">
    <form id="msform" method="POST" action="{{ route('register.user') }}">
        {{ csrf_field() }}
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Osebni podatki</li>
            <li>Izobrazba in izkušnje</li>
            <li>Nastavitve računa</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Osebni podatki</h2>
            <h3 class="fs-subtitle">Povejte nam nekaj več o sebi</h3>
            <input type="text" name="first_name" placeholder="* Ime" required/>
            <input type="text" name="last_name" placeholder="* Priimek" required/>
            <input type="text" name="phone" placeholder="Telefonska številka" />
            <input type="text" name="birthday" placeholder="Datum rojstva" onfocus="(this.type='date')" onblur="(this.type='text')"/>
            <input type="text" name="address" placeholder="Mesto bivanja" />
            <input type="text" name="post" placeholder="Poštna številka" />
            <input type="button" name="next" class="next action-button" value="Naprej"/>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Izobrazba in delovne izkušnje</h2>
            <h3 class="fs-subtitle">Izberite vrsto izobrazbe in opišite vaše delovne izkušnje</h3>
            <select name="school" id="school">
                <option value="Izobrazba">Izobrazba</option>
            </select>
            <textarea name="work" id="work" placeholder="Opišite vaše delovne izkušnje..." rows="5"></textarea>
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
