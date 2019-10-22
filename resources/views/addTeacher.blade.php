@extends('template')
 
@section('contenu')
 
<form method="GET" action="{{action('Model@inscription')}}" style="border:1px solid #ccc">
  <div class="container">
    <h1>Inscription</h1>
    <p>Veuillez entrer les cordonnées du professeur a ajouté dans le formulaire ci-joint.</p>
    <hr>
    <label><b>Acronyme</b></label>
    <input type="text" placeholder="Entrez votre acronyme" name="id" id="id" required>

    <label><b>Nom</b></label>
    <input type="text" placeholder="Entrez votre nom" name="nom" id="nom" required>

    <label><b>Prenom</b></label>
    <input type="text" placeholder="Entrez votre prénom" name="prenom" id="prenom" required>
 
    <div class="clearfix">
      <button type="submit"class="inscription">Inscrire</button>
    </div>
  </div>
</form>
<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>  
<script>
    $(document).ready(function(){
            $(".inscription" ).click(function(){
                let id = document.getElementById('id').value;
                let nom = document.getElementById('nom').value;
                let prenom = document.getElementById('prenom').value;

                if(pseudo != ''){
                    
                    alert(pseudo+" ,votre inscription a bien été enregistrée !");
               });
 
 
                }
                
            })
        
    })
</script>
@endsection


