<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ZipCode;

class UploadZipCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:zipcodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload zipcodes to the database from TXT file.';

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
     * @return int
     */
    public function handle()
    {
        $data = $this->getDataFromFile();

        $bar = $this->output->createProgressBar(count($data));
        $bar->start();
        foreach ($data as $item) {
            DB::statement($item);
            $bar->advance();
        }
        $bar->finish();
    }

    private function getDataFromFile(){
        return Str::of(File::get('database/data/zipcode-mexico.sql'))
            ->explode(PHP_EOL)
            ->values();
    }

}//eoc
