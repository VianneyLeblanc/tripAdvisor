@extends('layouts.app')
@section('content')
<div>
	<img src="https://static.tacdn.com/img2/branding/rebrand/TA_logo_primary.svg">
</div>
<form action="." method="POST">
 <div>Inscrivez-vous&nbsp;: c'est gratuit&nbsp;!</div>
 <label for="email">Adresse e-mail</label>
  <input type="email" name="email" id="email" title="Indiquez votre e-mail" required="true">
  <label for="mdp">Créez un mot de passe</label>
  <input type="password" name="mdp" id="mdp">
  <input type="submit" name="submit" value="S'inscrire">
  <div class="footerNav">Vous avez déjà un compte&nbsp;?</div>
</form>
@endsection