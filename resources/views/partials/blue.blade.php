<section class="section section-padded dark-bg">
    <div class="container">
        <h1 class="text-center light">Inscription</h1>
        <div class="owl-twitter owl-carousel">
            @if (count($form)>1)
            <div class="item" id="formulaire">
                <div style="margin: 30px 0;" class="row">
                    @foreach ($form->chunk(5) as $chunk)
                        <ul class="col-md-4">
                            @foreach ($chunk as $item)
                                <li style="margin: 7px 0;" class="light">
                                    <a class="light" href="{{route('inscription.add',$item->id)}}">{{$item->formulaire->titre.' '.$item->id}}</a> <span>-> date limite: {{$item->date->format('d/M/y')}}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
            @elseif(count($form)==1)
            <div class="item" id="formulaire">
                @if (session()->has('msg'))
            <p class="white text-center">{{session('msg')}}</p>
                @endif
            <h3 class="light text-center">{{$form->first()->formulaire->titre.' '.$form->first()->id}}</h3>
                <form class="row" style="margin-top: 30px;" action="{{route('inscription',$form->first()->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="formulaire_id" value="1">
                    <div class="col-md-6">
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Nom</label>
                            <input style="width: 100%;" name="nom" type="text">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Prenom</label>
                            <input style="width: 100%;" name="prenom" type="text">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Email</label>
                            <input style="width: 100%;" name="email" type="text">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Commune</label>
                            <input style="width: 100%;" name="commune" type="text">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Adresse</label>
                            <input style="width: 100%;" name="adresse" type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Téléphone</label>
                            <input style="width: 100%;" name="telephone" type="text">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Objectif</label>
                            <input style="width: 100%;" name="objectif" type="text">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Photo</label>
                            <input style="width: 100%; background-color: white;" name="photo" type="file">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 12px;" class="light" for="">Genre: </label>
                            <label style="margin-right: 5px;" class="white" for="">Homme</label>
                            <input style="margin-right: 8px;" value="Homme" name="genre" type="radio">
                            <label style="margin-right: 5px;" class="white" for="">Femme</label>
                            <input name="genre" type="radio" value="Femme">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">Statut</label>
                            <select name="statut" id="">
                                <option value="Célibataire">Célibataire</option>
                                <option value="Divorcé(e)">Divorcé(e)</option>
                                <option value="Marié(e)">Marié(e)</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">S'abonner pour découvrir prochains
                                évènements</label>
                            <input name="abo" type="checkbox">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">Possède un ordinateur</label>
                            <input name="ordinateur" type="checkbox">
                        </div>
                    </div>
                    <div style="margin-bottom: 10px; text-align: center;">
                        <label style="margin-right: 12px;" class="light" for="">Intérêt: </label>
                        @foreach ($form->first()->formulaire->interets as $item)
                        @if(!$loop->last)
                        <label style="margin-right: 5px;" class="white" for="">{{$item->nom}}</label>
                        <input style="margin-right: 8px;" name="interet[]" value="{{$item->id}}" type="checkbox">
                        @else
                        <label style="margin-right: 5px;" class="white" for="">{{$item->nom}}</label>
                        <input name="interet[]" type="checkbox" value="{{$item->id}}">
                        @endif
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button class="btn btn-blue" type="submit">Send</button>
                    </div>
                </form>
            </div>
            @else
            @foreach ($phrase as $item)
        <h3 class="light text-center">{{$item->texte}}</h3>
            @endforeach
            @endif
        </div>
    </div>
</section>
