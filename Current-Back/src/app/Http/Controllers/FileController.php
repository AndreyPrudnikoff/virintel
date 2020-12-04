<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
require_once '../vendor/autoload.php';
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
//use Illuminate\Validation\ValidationException;
//use Illuminate\Validation\Validator,Illuminate\Support\Facades\Redirect,Illuminate\Http\Response,Illuminate\Http\File;
use App\Files;
use App\Patient;
use App\patient_tests;
use App\test_controls;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Dotenv\Validator;
use App\Imports\ExcelImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Filesystem\Filesystem;
use App\pdf_files;


use Aws\S3\S3MultiRegionClient;
use League\Flysystem\AwsS3v3\AwsS3Adapter;





class FileController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');

        $file_name = $file->getClientOriginalName();
        if (Files::where('file_name', '=', $file_name)->exists()) {

            return response()->json([
                'message' => 'This file has already been downloaded!!!'
            ]);
        } else {
            DB::table('files')->insert(['file_name' => $file_name, 'status' => 'Normal']);
            $import = new ExcelImport;
            Excel::import($import, $file);
            $file_id = DB::table('files')->select('id')->max('id');
            $controls = test_controls::all()->where('file_id', '=', $file_id)->toArray();
            foreach ($controls as $vale) {
                $RBD_Threshold = $vale['rbd_threshold'];
                $RBD_Negative_Control = $vale['rbd_negative_control'];
                $N_Threshold = $vale['n_threshold'];
                $N_Negative_Control = $vale['n_negative_control'];
                $RBD_Pos = $vale['rbd_pos'];
                $N_Pos = $vale['n_pos'];

                if ($RBD_Pos > $RBD_Negative_Control * 5 and $RBD_Threshold > $RBD_Negative_Control * 1.7
                    and $N_Pos > $N_Negative_Control * 5 and $N_Threshold > $N_Negative_Control * 1.7) {
                 //Storage::disk('s3')->put('excel/'.$file_name, $file);
                    return response()->json([
                        "success" => true,
                        "message" => "File successfully uploaded",
                    ]);
                }
                DB::table('files')->where('id', '=', $file_id)->update(['status' => 'Bad']);

                return response()->json([
                    "success" => true,
                    "message" => "File successfully uploaded but Check Controls",
                ]);
            }
        }
    }

   

       

        public function allNormalFile()
    {

        $files = Files::all()->sortByDesc('id')->toArray();
        return response()->json($files, 200);
        // return $files;

    }

    

    public function oneNormalFile($id){

        $data = Patient::all()->where('file_id', '=', $id)->toArray();
        $users = patient_tests::all()->where('file_id', '=', $id)->toArray();
        $controls = test_controls::all()->where('file_id', '=', $id)->toArray();

        foreach ($controls as $key => $tr) {
            $controls = $tr;
        }
        $all_data = array_map('array_merge_recursive', $data, $users);
        foreach ($all_data as $key => $all_datums) {
            $test3[] = array_merge($all_datums, $controls);
        }
        $counts2 = count($all_data);

        return response()->json([
            "result" => $test3,
            "number" => $counts2,
        ]);
    }
    // public function allBadFile()
    // {
    //     $badfiles = Files::all()->where('status', '=', 'Bad');

    //     return response()->json([
    //         "result" => $badfiles,
    //     ]);

    // }

    public function oneBadFile($id){

        $controls = test_controls::all()->where('file_id', '=', $id)->toArray();
        foreach ($controls as $vale) {
            $RBD_Threshold = $vale['rbd_threshold'];
            $RBD_Negative_Control = $vale['rbd_negative_control'];
            $N_Threshold = $vale['n_threshold'];
            $N_Negative_Control = $vale['n_negative_control'];
            $RBD_Pos = $vale['rbd_pos'];
            $N_Pos = $vale['n_pos'];

        }
        return response()->json([
            "RBD_Threshold" => $RBD_Threshold,
            "RBD_Negative_Control" => $RBD_Negative_Control,
            "N_Threshold" => $N_Threshold,
            "N_Negative_Control" => $N_Negative_Control,
            "RBD_Pos" => $RBD_Pos,
            "N_Pos" => $N_Pos,
        ]);
    }

    public function pdfexport($id){

        $data = Patient::all()->where('file_id', '=', $id)->toArray();
        $users = patient_tests::all()->where('file_id', '=', $id)->toArray();
        $controls = test_controls::all()->where('file_id', '=', $id)->toArray();
        foreach ($controls as $key => $tr) {
            $controls = $tr;
        }
        $all_data = array_map('array_merge_recursive', $data, $users);
        
        foreach ($all_data as $key => $all_datums) {
            $test[] = array_merge($all_datums, $controls);
        }
       
        foreach ($test as $all_datum => $bn) {
            $data1y = array($bn['rbd_pos'] / $bn['rbd_threshold'], $bn['rbd_negative_control'] / $bn['rbd_threshold'], $bn['rbd']);
            $data2y = array($bn['n_pos'] / $bn['n_threshold'], $bn['n_negative_control'] / $bn['n_threshold'], $bn['n']);
            $data3y = array(0);
            $graph = new Graph\Graph(360, 300);

            $graph->SetScale("textlin");

            $graph->yaxis->SetTickPositions(array(0, 1));
            $graph->SetBox(false);

            $graph->subtitle->Set('Positive Control   Negative Control   ' . $bn['patient_name']);
            $graph->ygrid->SetFill(true, '#A9A9A9@0', '#FFFFFF@1', '#FFFFFF@3', '#FFFFFF@4');
            $graph->SetMargin(10, 10, 10, 10);
            $graph->xaxis->SetTickLabels(array('', '', ''),);
            $graph->yaxis->HideLine(true);

            $graph->yaxis->HideZeroLabel(true);
            $graph->yaxis->HideFirstLastLabel(true);
            $graph->xaxis->SetFont(FF_ARIAL, FS_BOLD, 7);

            $graph->yaxis->HideTicks(true);

            $b1plot = new Plot\BarPlot($data1y);
            $b2plot = new Plot\BarPlot($data2y);
            $b3plot = new Plot\BarPlot($data3y);

            $gbplot = new Plot\GroupBarPlot(array($b1plot, $b2plot, $b3plot));

            $graph->Add($gbplot);

            $b1plot->SetColor("#4472c4");
            $b1plot->SetFillColor("#4472c4");

            $b1plot->SetLegend("RBD");

            $b2plot->SetColor("#ed7d31");
            $b2plot->SetFillColor("#ed7d31");
            $b2plot->SetLegend("N");

            $b3plot->SetColor("#A9A9A9");
            $b3plot->SetFillColor("#A9A9A9");
            $b3plot->SetLegend("Threshold");

            //$graph->legend->SetPos(0.5,0.98,'center','bottom');
            $graph->Stroke('img/' . $bn['patient_id'] . '.png');
        }

        foreach ($test as $key => $vale) {

            $pdf = PDF::loadView('pdf', compact('vale'))->setPaper('a4');

            Storage::disk('s3')->put('pdf/' . $vale['patient_name'] . '_' . $vale['patient_id'] . '.pdf', $pdf->output());
            //$url=Storage::disk('s3')->url('pdf/' . $vale['patient_name'] . '_' . $vale['patient_id'] . '.pdf');
            DB::table('pdf_files')->insert(['pdf_file_name' => $vale['patient_name'] . '_' . $vale['patient_id'] . '.pdf', 'file_id' => $id, 'virintel_id'=>$vale['virintel_id'],'result'=>$vale['result']]);
            //return $pdf->stream();
            //
            // $pdf->save($vale['patient_name'].'_'.$vale['patient_id'].'.pdf');
//            return $pdf->download($vale['patient_name'].'_'.$vale['patient_id'].'.pdf');
              
    //Storage::disk('s3')->put('pdf/'.$vale['patient_name'].'_'.$vale['patient_id'].'.pdf', $pdf->output());
        }
        $file = new Filesystem;
        $file->cleanDirectory('img/');
        DB::table('files')->where('id', '=', $id)->update(['report' => TRUE]);
        return response()->json([
            "message"=>"All PDF report generate!!"
        ]);
    }

    public function getReportPdf($virintel_id){
        $userReport=pdf_files::all()->where('virintel_id', '=', $virintel_id)->toArray();
        return $userReport;
    }

    public function getUrlPdf($id){

        $pdfReports=pdf_files::all()->where('id', '=', $id)->toArray();

        foreach ($pdfReports as $key =>$vale){
            $norm=$pdfReports[$key]['pdf_file_name'];       
        }
        $adapter = Storage::disk('s3')->getDriver()->getAdapter();       

        $command = $adapter->getClient()->getCommand('GetObject', [
        'Bucket' => $adapter->getBucket(),
        'Key'    => $adapter->getPathPrefix().'pdf/'.$norm,
         ]);

    $request = $adapter->getClient()->createPresignedRequest($command, '+20 minute');

    return (string) $request->getUri();
    }  

    public function getReportPdLaboratory($id){
        $userReport=pdf_files::all()->where('file_id', '=', $id)->toArray();
        return $userReport;
    }
}
