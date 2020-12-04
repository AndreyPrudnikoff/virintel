<?php


namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FirstSheetImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        $data = $rows->toArray();


        foreach ($data as $key => $value) {

            foreach ($value as $item) {
                if ($item == 'A') {
                    $controls_key = $key;
                }
            }
        }
        foreach ($data as $key => $value) {
            if ($key == $controls_key) {
                $controls = $value;
            } elseif ($key > $controls_key) {
                $all_result[] = $value;
            }
        }
        $key = array_search('A', $controls);
        foreach ($controls as $keys => $value) {
            if ($keys > $key) {
                $control[] = $value;
            }
        }
        foreach ($control as $key => $value) {
            if ($key < 12) {
                $controls_result[] = $value;
            }
        }

        $RBD_Threshold = ($controls_result[2] + $controls_result[3] + $controls_result[4]) / 3;
        $RBD_Negative_Control = ($controls_result[0] + $controls_result[1]) / 2;
        $N_Threshold = ($controls_result[8] + $controls_result[9] + $controls_result[10]) / 3;
        $N_Negative_Control = ($controls_result[6] + $controls_result[7]) / 2;
        $RBD_Pos = $controls_result[5];
        $N_Pos = $controls_result[11];
//        if ($RBD_Pos > $RBD_Negative_Control * 5 and $RBD_Threshold>$RBD_Negative_Control*1.7
//            and $N_Pos>$N_Negative_Control*5 and $N_Threshold>$N_Negative_Control*1.7) {


            foreach ($all_result as $element) {
                foreach ($element as $value)
                    if (!empty($value) and $value != '490' and $value != 'B' and $value != 'C' and $value != 'D' and $value != 'E' and $value != 'F' and $value != 'G' and $value != 'H') {
                        $patient_result[] = $value;
                    }
            }
            $patient_result = array_chunk($patient_result, '2');

            foreach ($patient_result as $bg) {
                $result[] = $bg[0] / $RBD_Threshold;
                $result[] = $bg[1] / $N_Threshold;
            }

            $result_arr = array_chunk($result, '2');

            $file_id = DB::table('files')->select('id')->max('id');
            DB::table('test_controls')->insert(['rbd_threshold' => $RBD_Threshold, 'rbd_negative_control' => $RBD_Negative_Control, 'n_threshold' => $N_Threshold,
                'n_negative_control' => $N_Negative_Control, 'rbd_pos' => $RBD_Pos, 'n_pos' => $N_Pos, 'file_id' => $file_id]);

            foreach ($result_arr as $key => $res) {
                if ($res[0] > 1 and ($res[1] > 1)) {
                    DB::table('patient_tests')->insert(['rbd' => $res[0], 'n' => $res[1], 'file_id' => $file_id, 'result' => 'Positive']);
                } elseif ($res[0] < 1 and $res[1] < 1 or $res[0] > 1 and $res[1] < 1 or $res[0] < 1 and $res[1] > 1) {
                    DB::table('patient_tests')->insert(['rbd' => $res[0], 'n' => $res[1], 'file_id' => $file_id, 'result' => 'Negative']);
                }
            }
//        }

    }
}

