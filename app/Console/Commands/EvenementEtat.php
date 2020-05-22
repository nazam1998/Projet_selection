<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Evenement;
class EvenementEtat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'evenement:etat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Met tout les évènements dont la date est passée en terminé';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $evenements = Evenement::where('date', '<', Carbon::now())->where('etat', 'Terminé')->get();
        foreach ($evenements as $evenement) {
            $etapes = $evenement->etapes();
            if ($etapes->count() != 0 && $etapes->orderBy('date', 'desc')->first()->date < Carbon::now()) {
                $evenement->etat = 'Terminé';
                $evenement->save();
            }
        }
        echo 'Done';
    }
}
