<?php

namespace App\Console\Commands;

use App\License;
use Illuminate\Console\Command;

class SetExpiredLicense extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'license:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks if license due date exceeds the limit date';

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
        date_default_timezone_set('America/Chihuahua');
        $todayDate = strtotime(date("d-m-Y H:i:00",time()));

        $licenses = License::latest()->get();
        $request = [];

        foreach ($licenses as $license) {
            if ($todayDate >= strtotime($license->due_date)) {
                $request[] = $license;
            }
        }

        for ($i=0; $i < count($request); $i++) {
            $request[$i]->update([
                'status' => 'expirado'
            ]);
        }
    }
}
