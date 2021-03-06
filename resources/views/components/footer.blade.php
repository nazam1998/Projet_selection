<footer id="contact">
    <div class="contenu2">
        <div class="row">
            <div class="col-sm-5 text-center-mobile">
                <h3 class="light">Contact us!</h3>
                @if (session()->has('msgContact'))
                <h6 style='color: green'>{{session('msgContact')}}</h6>
                @endif
                <h5 class="light regular">We'd like to know if you have any comments.</h5>
                <form style="margin-top: 30px;" action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div style="margin-bottom: 10px;">
                        <label class="light" for="">Nom</label>
                        @error('noms')
                        <div class="erreur">{{ $message }}</div>
                        @enderror
                        <input style="width: 100%;" name="noms" type="text"
                            value="@if($errors->first('noms'))@else{{old('noms')}}@endif">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label class="light" for="">Prenom</label>
                        @error('prenoms')
                        <div class="erreur">{{ $message }}</div>
                        @enderror
                        <input style="width: 100%;" name="prenoms" type="text"
                            value="@if($errors->first('prenoms'))@else{{old('prenoms')}}@endif">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label class="light" for="">Email</label>
                        @error('emails')
                        <div class="erreur">{{ $message }}</div>
                        @enderror
                        <input style="width: 100%;" name="emails" type="text"
                            value="@if($errors->first('emails'))@else{{old('emails')}}@endif">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label class="light" for="">Message</label>
                        @error('messages')
                        <div class="erreur">{{ $message }}</div>
                        @enderror
                        <input style="width: 100%;" name="messages" type="text"
                            value="@if($errors->first('messages'))@else{{old('messages')}}@endif">
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
                <p id="contact">&copy; 2020 All Rights Reserved. Powered by <a href="http://www.phir.co/">NKN</a>
                    exclusively
                    for <a href="http://molengeek.com">MolenGeek</a></p>
            </div>
        </div>
    </div>
    <div></div>
</footer>
