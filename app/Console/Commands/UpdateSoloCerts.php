<?php

namespace App\Console\Commands;

use App\Models\SoloCertification;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class UpdateSoloCerts extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SoloCerts:UpdateSoloCerts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates solo certs. Runs daily.';

    private $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $res = $this->client->get('https://api.vatusa.net/v2/solo');
        $solo_certs = json_decode($res->getBody());

        foreach ($solo_certs as $s) {
            if (!($s === true || $s === false)) {
                if ($s->position == 'ATL_CTR') {
                    $current_cert = SoloCertification::whereCid($s->cid)->whereStatus(0)->first();
                    if (!$current_cert) {
                        $cert = new SoloCertification;
                        $cert->cid = $s->cid;
                        $cert->pos = 2;
                        $cert->expiration = $s->expires;
                        $cert->status = 0;
                        $cert->save();

                        $user = User::find($s->cid);
                        $user->ctr = 99;
                        $user->save();
                    }
                } else {
                    if (substr($s->position, -3) == 'APP') {
                        $hcontrol = User::whereVisitor(0)->get();
                        foreach ($hcontrol as $h) {
                            if ($s->cid == $h->id) {
                                $current_cert = SoloCertification::whereCid($s->cid)->whereStatus(0)->first();
                                if (!$current_cert) {
                                    $cert = new SoloCertification;
                                    $cert->cid = $s->cid;
                                    $cert->pos = 1;
                                    $cert->expiration = $s->expires;
                                    $cert->status = 0;
                                    $cert->save();

                                    $user = $h;
                                    $user->app = 99;
                                    $user->save();
                                }
                            }
                        }
                    }
                }
            }
        }

        $today = strval(Carbon::now()->subDay());
        $today = substr($today, 0, 10);
        $certs = SoloCertification::get();

        foreach ($certs as $c) {
            if ($c->expiration <= $today && $c->status == 0) {
                Mail::send('emails.solo_expire', ['c' => $c], function($message) {
                    $message->from('solocerts@notams.ztlartcc.org', 'ZTL Solo Certifications')
                            ->subject('Solo Certification Expired');
                    $message->to('ta@ztlartcc.org');
                });
                $c->status = 1;

                $user = User::find($c->cid);

                if ($c->pos == 0) {
                    $user->twr = 0;
                } else {
                    if ($c->pos == 1) {
                        $user->app = 0;
                    } else {
                        if ($c->pos == 2) {
                            $user->ctr = 0;
                        }
                    }
                }
                $user->save();
                $c->save();
            }
        }
    }
}
