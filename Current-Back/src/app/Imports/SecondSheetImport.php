<?php


namespace App\Imports;


use App\Files;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SecondSheetImport  implements \Maatwebsite\Excel\Concerns\ToCollection
{

    /**
     * @inheritDoc
     */
    public function collection(Collection $rows)
    {


        $users=$rows->toArray();
        array_shift($users);

        $file_id = DB::table('files')->select('id')->max('id');

        foreach ($users as $element) {
            foreach ($element as $value)
                if (!empty($value)) {
                    $users2[] = $value;
                }

        }
        $usermal = array_chunk($users2, '6');


            foreach ($usermal as $key => $user) {

                DB::table('patients')->insert(['virintel_id' => $user['1'], 'patient_name' => $user[2], 'sex' => $user[3], 'dob' => $user[4], 'doctor_name' => $user[5], 'file_id' => $file_id]);


            }


    }




}

