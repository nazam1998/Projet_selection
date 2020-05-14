<section class="section section-padded dark-bg">
    <div class="container">
        <h1 class="text-center light">Inscription</h1>
        <div class="owl-twitter owl-carousel">
            <div class="item">
                <form class="row" style="margin-top: 30px;" action="" method="POST">
                    @csrf
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
                            <input style="margin-right: 8px;" name="genre" type="radio">
                            <label style="margin-right: 5px;" class="white" for="">Femme</label>
                            <input name="genre" type="radio">      
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">Statut</label>
                            <select name="statut" id="">
                                <option value=""></option>
                            </select>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">Abonnement</label>
                            <input name="abo" type="checkbox">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="margin-right: 10px;" class="light" for="">Ordinateur</label>
                            <input name="ordinateur" type="checkbox">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-blue" type="submit">Send</button>
                    </div>
                </form>
            </div>
            <div class="item text-center">
                <form style="margin-top: 30px;" action="{{route('contact.store')}}" method="POST">
                    @csrf
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
                        <label class="light" for="">Message</label>
                        <input style="width: 100%;" name="message" type="text">
                    </div>
                    <div style="margin-top: 15px;" class="text-center">
                        <button class="btn btn-blue" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
