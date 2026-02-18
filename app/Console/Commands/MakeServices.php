<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class MakeServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service  {serviceName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make service classes in services';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $argument = $this->argument('serviceName');

        $path = app_path("Services/{$argument}.php");

        if (!is_dir(app_path('Services'))) {
            mkdir(app_path('Services'), 0755, true);
        }

    return file_put_contents( $path, "<?php\n\nnamespace App\Services;\n\nclass {$argument}\n{\n}\n" );


    }
}
