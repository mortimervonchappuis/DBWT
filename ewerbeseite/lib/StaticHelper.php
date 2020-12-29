<?php


class StaticHelper
{
    public const DEFAULT_FILENAME = "../inc/visitorCounter.dat";
    public const NEWSLETTER_REGISTRATIONS_PATH = "../inc/newsletter_registrations.csv";
    public const SORT_BY_REGISTER_TIME =-1;
    public const SORT_BY_NAME =0;
    public const SORT_BY_EMAIL =1;

    public static function getVisitorsCount($filename=self::DEFAULT_FILENAME):int
    {
        $output = include $filename;
        return $output['all'];
    }
    public static function writeVisitorsCount(int $visitorCount, $filename=self::DEFAULT_FILENAME)
    {
        $export = var_export(['all' => $visitorCount], true);
        file_put_contents($filename, "<?php return $export ;");
    }

    public static function getNewsLetterRegistrations($sortBy=self::SORT_BY_REGISTER_TIME){

        $output = [];
        $counter =0;

        if (($handle = fopen(self::NEWSLETTER_REGISTRATIONS_PATH, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

                if ($sortBy != self::SORT_BY_REGISTER_TIME){
                    $output[$data[$sortBy].$counter] =[
                        'name' => $data[0],
                        'email' => $data[1],
                        'lang' => $data[2]
                    ];
                }else{
                    //Keine Sortierung die Reihenfolge bleibt bestehen
                    $output[] =[
                        'name' => $data[0],
                        'email' => $data[1],
                        'lang' => $data[2]
                    ];
                }
                $counter++;
            }
            fclose($handle);
        }
        echo "<pre>";
        if ($sortBy != self::SORT_BY_REGISTER_TIME){
            ksort($output);
        }
        echo "</pre>";


        return $output;

    }
}?>