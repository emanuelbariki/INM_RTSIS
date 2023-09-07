<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function () {
            

        //     $curl = curl_init();
        //     $data = '{
        //         "sql":"select to_char(sysdate,\'DDMMYYYYHHMM\') Reporting_Date_Time , gsp.schm_code Account_Code, gsp.SCHM_DESC  Account_Description, gsp.schm_type Account_Type, ssp.CRNCY_CODE Currency, to_char(gsp.rcre_time,\'DDMMYYYYHHMM\')  Account_Creation_Date, decode(gsp.del_flg,\'N\',\'\',to_char(gsp.lchg_time,\'DDMMYYYYHHMM\')  ) Account_Closure_Date, decode(gsp.del_flg,\'N\',\'Active\',\'Closed\') Account_Status from tbaadm.gsp,tbaadm.ssp where gsp.schm_code=ssp.schm_code union all select to_char(sysdate,\'DDMMYYYYHHMM\') Reporting_Date_Time , gsp.schm_code Account_Code, gsp.SCHM_DESC  Account_Description, gsp.schm_type Account_Type, ssp.CRNCY_CODE Currency, to_char(gsp.rcre_time,\'DDMMYYYYHHMM\')  Account_Creation_Date, decode(gsp.del_flg,\'N\',\'\',to_char(gsp.lchg_time,\'DDMMYYYYHHMM\')  ) Account_Closure_Date, decode(gsp.del_flg,\'N\',\'Active\',\'Closed\') Account_Status from tbaadm.gsp,tbaadm.lsp ssp where gsp.schm_code=ssp.schm_code and schm_type !=\'CLA\' union all select to_char(sysdate,\'DDMMYYYYHHMM\') Reporting_Date_Time , gsp.schm_code Account_Code, gsp.SCHM_DESC  Account_Description, gsp.schm_type Account_Type, ssp.CRNCY_CODE Currency, to_char(gsp.rcre_time,\'DDMMYYYYHHMM\')  Account_Creation_Date, decode(gsp.del_flg,\'N\',\'\',to_char(gsp.lchg_time,\'DDMMYYYYHHMM\')  ) Account_Closure_Date, decode(gsp.del_flg,\'N\',\'Active\',\'Closed\') Account_Status from tbaadm.gsp,tbaadm.osp ssp where gsp.schm_code=ssp.schm_code"
        //     }';

        //     curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'http://localhost/receive.php',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS =>$data,
        //     CURLOPT_HTTPHEADER => array(
        //         'Content-Type: application/json'
        //     ),
        //     ));

        //     $response = curl_exec($curl);

        //     curl_close($curl);

        //     Log::info('Cron Job');
        //     Log::info($data);
        //     Log::info($response);
        // })->everyMinute();
        


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected $commands = [
        // ...
        // Commands\YourCustomCommand::class,
    ];
}
