<section id="team" class="section light-bg">
    <div class="container">
        <div class="row title text-center">
            <h2 class="margin-top dark">Team</h2>
            <h4 class="dark">We're a dream team!</h4>
        </div>
        <div class="row">
            @foreach ($coachs as $item)
                
            <div class="col-md-4">
                <div class="team text-center dark-bg">
                    <div class="cover" style="background:url('img/code{{$loop->iteration}}.jpg'); background-size:cover;">
                        <div class="overlay text-center">
                            <h3 class="white">30€</h3>
                            <h5 class="white">8 hours/month</h5>
                        </div>
                    </div>
                <img width="140px" src="{{asset('storage/'.$item->photo)}}" alt="Team Image" class="avatar">
                    <div class="title">
                    <h4 class="light">{{$item->nom.' '.$item->prenom}}</h4>
                    <h5 class="white regular">{{$item->role->nom}}</h5>
                    </div>
                    
                </div>
            </div>
            @endforeach
            {{-- endforeach --}}
        </div>
    </div>
</section>