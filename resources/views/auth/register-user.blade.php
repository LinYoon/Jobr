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
            <input type="text" name="first_name" placeholder="* Ime" value="{{ old('first_name') }}" required/>
            @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
            <input type="text" name="last_name" placeholder="* Priimek" value="{{ old('last_name') }}" required/>
            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
            <input type="text" name="phone" placeholder="Telefonska številka" value="{{ old('phone') }}" />
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            <input type="text" name="birthday" placeholder="Datum rojstva" value="{{ old('birthday') }}" onfocus="(this.type='date')" onblur="(this.type='text')"/>
            @if ($errors->has('birthday'))
                <span class="help-block">
                    <strong>{{ $errors->first('birthday') }}</strong>
                </span>
            @endif
            <input type="text" name="city" placeholder="Mesto bivanja" value="{{ old('city') }}" class="input-70" />
            <input type="text" name="post" placeholder="Poštna številka" value="{{ old('post') }}" class="input-30"/>
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
            @if ($errors->has('post'))
                <span class="help-block">
                    <strong>{{ $errors->first('post') }}</strong>
                </span>
            @endif
            <input type="radio" name="gender" value="moški" id="r1" checked> <label for="r1"> Moški</label>
            <input type="radio" name="gender" value="ženski" id="r2"> <label for="r2"> Ženski</label><br>
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
            <input type="text" name="email" placeholder="* Email" value="{{ old('email') }}" required/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input type="password" name="password" placeholder="* Geslo" value="{{ old('password') }}" required/>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="password" name="password_confirmation" placeholder="* Potrdite geslo" value="{{ old('password_confirmation') }}" required/>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            <input type="button" name="previous" class="previous action-button-previous" value="Nazaj"/>
            <button type="submit" name="submit" class="submit action-button">Potrdi</button>
        </fieldset>
    </form>
</div>
</div>
</div>
@endsection
