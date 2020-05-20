<section class="light-bg">
    <div class="container">
        <div class="row intro-tables">
            @if (count($evenements)!=0)
            @foreach ($evenements as $item)


            <div class="col-md-4">
                <div class="intro-table intro-table-first">
                <h5 class="white heading">{{$item->formulaire->titre}}</h5>
                    <div class="owl-carousel owl-schedule bottom">
                        @foreach ($item->etapes()->orderBy('date','asc')->get() as $etape)

                        

                        <div class="item">

                            
                            <div class="schedule-row row">
                                <div class="col-xs-6">
                                    <h5 class="regular white">{{$etape->titre}}</h5>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <h5 class="white">{{$etape->date->translatedFormat('j M y',strtotime("7 Janvier 2015"))}}</h5>
                                </div>
                                <p style="margin-top: 36px; font-weight: 15;" class="white heading content">{{$etape->description}}</p>
                            </div>
                            
                            
                           
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            @endforeach
            @else


            <div class="d-flex-center-gros">
                <div class="intro-table intro-table-first d-flex-center">
                <h4 class="white heading">Il n'y a actuellement aucun évènement en cours</h4>
                    <div class="owl-carousel owl-schedule bottom">
                        


                    </div>
                </div>
            </div>
            @endif
     
            
        </div>
    </div>
</section>
