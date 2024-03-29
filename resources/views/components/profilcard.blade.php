<div class="col-sm-6 col-md-4">

    <div class="card my-4 ">
        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2020/03/16/17/32/lorem-4937753_640.jpg"
            alt="">
        <div class="card-body">
            <h4 class="card-title">{{ $profil->titre }} <p class="bg-success badge  rounded">
                    {{ $profil->category->name }}
                </p>
            </h4>
            <p class="card-text">{{ Str::limit($profil->bio, 100) }}</p>
            <p class="text-decoration-underline">POSTED By : {{ $profil->name }}</p>
            <div>
                <h6 class="text-decoration-underline">CONTACT :</h6>
                <div class="">
                    <div class="d-flex   align-items-sm-center">
                        <svg class="" style="width: 20px; " xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                        </svg>
                        <p class="mb-0"> : {{ $profil->email }}</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('profil.show', $profil->id) }}" class="stretched-link" role="button"></a>

        </div>
        <div class="crad-foot border-top p-3" style="z-index: 9">
            
            <form action="{{ route('deleteservice', $profil) }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger float-end">Supprimer</button>
            </form>
            <form action="{{ route('editshow', $profil->id) }}" method="get">
              
                {{-- En résumé, PUT est utilisé pour remplacer entièrement une ressource à une URI spécifique,tandis que
                     PATCH est utilisé pour appliquer des modifications partielles à une ressource existante. 
                    Le choix entre PUT et PATCH dépend du scénario d'utilisation spécifique et de la manière
                     dont vous souhaitez gérer les mises à jour de vos ressources. --}}
                @csrf
                <button class="btn btn-primary mx-2 float-end">Modifier</button>
            </form>
        </div>
    </div>
</div>
