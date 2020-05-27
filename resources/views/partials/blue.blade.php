<section class="section section-padded dark-bg" id="formulaire">
    <div class="container">
        <h1 class="text-center light">Inscription</h1>
        <div class="owl-twitter owl-carousel">
            @if (count($form)>1)
            <div class="item">
                <div style="margin: 30px 0;" class="row">
                    @foreach ($form->chunk(5) as $chunk)
                    <ul class="col-md-4">
                        @foreach ($chunk as $item)
                        <li style="margin: 7px 0;" class="light">
                            <a class="light"
                                href="{{route('inscription.add',$item->id)}}">{{$item->formulaire->titre}}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
                </div>
            </div>
            @elseif(count($form)==1)
            <div class="item">
                @if (session()->has('msg'))
                <p class="white text-center">{{session('msg')}}</p>
                @endif
                <h3 class="light text-center">{{$form->first()->formulaire->titre}}</h3>
                <form class="row" style="margin-top: 30px;" action="{{route('inscription',$form->first()->id)}}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="formulaire_id" value="1">
                    <div class="col-md-6">
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Nom</label>
                            @error('nom')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%;" name="nom" type="text" value="{{old('nom')}}">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Prenom</label>
                            @error('prenom')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%;" name="prenom" type="text" value="{{old('prenom')}}">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Email</label>
                            @error('email')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%;" name="email" type="text" value="{{old('email')}}">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Commune</label>
                            @error('commune')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%;" name="commune" type="text" value="{{old('commune')}}">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Adresse</label>
                            @error('adresse')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%;" name="adresse" type="text" value="{{old('adresse')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Téléphone</label>
                            @error('telephone')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%;" name="telephone" type="text" value="{{old('telephone')}}">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Objectif</label>
                            @error('objectif')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%;" name="objectif" type="text" value="{{old('objectif')}}">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label class="light" for="">Photo</label>
                            @error('photo')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <input style="width: 100%; background-color: white;" name="photo" type="file">
                        </div>
                        <div style="margin-bottom: 10px;">
                            @error('genre')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <label style="margin-right: 12px;" class="light" for="">Genre: </label>
                            <label style="margin-right: 5px;" class="white" for="">Homme</label>
                            <input style="margin-right: 8px;" value="Homme" @if(old('genre')=='Homme' ) checked @endif
                                name="genre" type="radio">
                            <label style="margin-right: 5px;" class="white" for="">Femme</label>
                            <input name="genre" type="radio" value="Femme" @if(old('genre')=='Femme' ) checked @endif>
                        </div>
                        <div style="margin-bottom: 10px;">

                            <label style="margin-right: 10px;" class="light" for="">Statut</label>
                            @error('statut')
                            <div class="erreur">{{$message}}</div>
                            @enderror
                            <select name="statut" id="">
                                <option @if(old('statut')=='Célibataire' ) selected @endif value="Célibataire">
                                    Célibataire</option>
                                <option @if(old('statut')=='Divorcé(e)' ) selected @endif value="Divorcé(e)">Divorcé(e)
                                </option>
                                <option @if(old('statut')=='Marié(e)' ) selected @endif value="Marié(e)">Marié(e)
                                </option>
                            </select>
                        </div>

                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">S'abonner pour découvrir prochains
                                évènements</label>
                            <input @if(old('abo')) checked @endif name="abo" type="checkbox">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">Possède un ordinateur</label>
                            <input @if(old('ordinateur')) checked @endif name="ordinateur" type="checkbox">
                        </div>
                    </div>
                    <div style="margin-bottom: 10px; text-align: center;width:100%">
                        @error('interet')
                        <div class="erreur">{{$message}}</div>
                        @enderror
                        <label style="margin-right: 12px;" class="light" for="">Intérêt: </label>
                        @foreach ($form->first()->formulaire->interets as $item)
                        @if(!$loop->last)
                        <label style="margin-right: 5px;" class="white" for="">{{$item->nom}}</label>
                        <input @if(is_array(old('interet')) && in_array($item->id,old('interet'))) checked @endif
                        style="margin-right: 8px;" name="interet[]" value="{{$item->id}}" type="checkbox">
                        @else
                        <label style="margin-right: 5px;" class="white" for="">{{$item->nom}}</label>
                        <input @if(is_array(old('interet')) && in_array($item->id,old('interet'))) checked @endif
                        name="interet[]" type="checkbox" value="{{$item->id}}">
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
