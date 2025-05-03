<?php

namespace App\Console\Commands;

use App\Mail\Newsletter;
use App\Models\agendas;
use App\Models\posts;
use App\Models\User;
use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewsletter extends Command
{
    protected $signature = 'newsletter:send';

    protected $description = 'Send a newsletter email with articles published between two periods';
    public function handle()
    {
        $startDate = now()->subDays(7); // Définir la date de début souhaitée
        $endDate = now(); // Définir la date de fin souhaitée
        $posts = posts::whereBetween('created_at', [$startDate, $endDate])->get();
        /* $agendas = agendas::whereBetween('created_at', [$startDate, $endDate])->get(); */
        if ($posts->isEmpty()) {
            $this->info('Aucun article trouvé.');
            return;
        }
       /*  if ($agendas->isEmpty()) {
            $this->info('Aucun agenda trouvé.');
            return;
        } */
       /*  $users = DB::table('newletters')->get();
        foreach ($users as $items) { */
                $recipients = DB::table('newletters')->pluck('email')->toArray();; // Ajoutez les adresses e-mail des destinataires de la newsletter
        /* } */
        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new Newsletter($posts,$recipient/* ,$agendas */));
        }

        $this->info('E-mail de newsletter envoyé avec succès.');
    }
}
