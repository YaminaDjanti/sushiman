
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{URL::to('/admin')}}">
            
            <span class="menu-title menu-text">Accueil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-linked" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="fas fa-caret-down mr-3 fa-2x"></i>
            <span class="menu-title color-dark-pink menu-text ">Création</span>
           
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              {{--
              @can('Catégorie-créer')
                <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin/ajoutercategorie')}}">Ajouter catégorie</a></li>
              @endcan --}}
              @can('Produit-créer')
                <li class="nav-item"><a class="nav-link nav-item-linked" href="{{URL::to('/admin/ajouterproduit')}}">Ajouter produit</a></li>
              @endcan
              @can('Slider-créer')
                <li class="nav-item"><a class="nav-link nav-item-linked" href="{{URL::to('/admin/ajouterslider')}}">Ajouter photo de couverture</a></li>
              @endcan
              @can('Allergène-créer')
                <li class="nav-item"><a class="nav-link nav-item-linked" href="{{URL::to('/admin/ajouterallergene')}}">Ajouter allergène</a></li>
              @endcan
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-linked" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="fas fa-caret-down mr-3 fa-2x"></i>
            <span class="menu-title color-dark-pink menu-text ">Afficher/Modifier</span>
            
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              @can('Catégorie-liste')
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="{{URL::to('/admin/categories')}}">Catégories</a></li>
              @endcan
              @can('Produit-liste')
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="{{URL::to('/admin/produits')}}">Produits</a></li>
              @endcan
              @can('Slider-liste')
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="{{URL::to('/admin/sliders')}}">Photos de couverture</a></li>
              @endcan
              @can('Allergène-liste')
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="{{URL::to('/admin/allergenes')}}">Allergènes</a></li>
              @endcan
              <li class="nav-item"> <a class="nav-link nav-item-linked" href="{{URL::to('/admin/commandes')}}">Commandes</a></li>
            </ul>
          </div>
        </li>
        @can('Rôle-liste')
          <li class="nav-item nav-linked">
            <a class="nav-link" href="{{URL::to('/admin/roles')}}" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-caret-down mr-3 fa-2x"></i>
              <span class="menu-title color-dark-pink menu-text ">Rôles des utilisateurs</span>
              
            </a>
            
          </li>
        @endcan
        @can('Utilisateurs-liste')
          <li class="nav-item nav-linked">
            <a class="nav-link" href="{{URL::to('/admin/utilisateurs')}}" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-caret-down mr-3 fa-2x"></i>
              <span class="menu-title color-dark-pink menu-text ">Utilisateurs</span>
              
            </a>
            
          </li>
        @endcan
      </ul>
    </nav>
    <!-- partial -->