<header id="intro">
    <div class="contenu">
        <div class="table">
            <div class="header-text">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="light">Welcome to CodeWizard.</h3>
                        <h1 class="light typed">The best place to learn about the digital world!</h1>
                        <span class="typed-cursor">|</span>
                    </div>
                    @foreach ($annonce as $item)

                    @if ($annonce->afficher && $annonce->date<Carbon\Carbon::now())
                <div id="banniere">
                        <p>{{$annonce->texte}} {{$annonce->date->format('d-m-y')}}</p>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
</header>
