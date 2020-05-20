<footer>
    <div class="contenu2">
        <div class="row">
            <div class="col-sm-5 text-center-mobile">
                <h3 class="light">Contact us!</h3>
                <h5 class="light regular">We'd like to know if you have any comments.</h5>
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
            <div class="col-sm-7 text-center">
                @if (Carbon\Carbon::now()<new Datetime('17:00') && Carbon\Carbon::now()>new Datetime('9:00'))
                    <h3 class="white">Opening Hours <span class="open-blink"></span></h3>
                    @else
                    <h3 class="white">Opening Hours <span class="close-blink"></span></h3>

                    @endif
                    <div class="row opening-hours">
                        <div class="col-sm-6 text-center">
                            <h5 class="light-white light">Mon - Fri</h5>
                            <h3 class="regular white">9:00 - 17:00</h3>
                        </div>
                        <div class="col-sm-6 text-center">
                            <h5 class="light-white light">Sat - Sun</h5>
                            <h3 class="regular white">Closed</h3>
                        </div>
                    </div>
            </div>
        </div>
        <div class="bottom-footer text-center">
            <div class="text-center">
                <ul class="social-footer">
                    <li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i
                                class="fab fa-facebook face"></i></a>
                    </li>
                    <li><a href="http://www.twitter.com/codrops"><i class="fab fa-twitter twit"></i></a></li>
                    <li><a href="https://plus.google.com/101095823814290637419"><i
                                class="fab fa-google-plus-g google"></i></a>
                    </li>
                </ul>
            </div>
            <div>
                <p>&copy; 2015 All Rights Reserved. Powered by <a href="http://www.phir.co/">NKN</a> exclusively
                    for <a href="http://molengeek.com">MolenGeek</a></p>
            </div>
        </div>
    </div>
</footer>
