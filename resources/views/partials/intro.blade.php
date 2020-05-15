<section>
    <div class="container">
        <div class="row intro-tables">
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
                            <h4 class="white heading content">{{$etape->description}}</h4>
                            </div>
                            
                            
                           
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
