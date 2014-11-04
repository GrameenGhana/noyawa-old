<?php

ini_set('memory_limit', '-1');
ini_set('max_execution_time',300);

class UploadController extends BaseController {

    

    /**
     * Client Model
     * @var Client
     */
    protected $client;
   
    public function getData(){
        
        $uploads = ExcelUpload::select(array('id', 'file_name', 'file_extension', 'number_of_records', 'status' ,'created_at'));

        return Datatables::of($uploads)


        ->make();
        
    }

    public function uploadExcel() {

        $file = Input::file('file'); // your file upload input field in the form should be named 'file'

        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension(); //if you need extension of the file
        $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
        $sizeOfSuccessData = 0;
        $sizeOfFailedData = 0;
        
        $date = date_create();
        $currentDateTime = date_format($date, 'Y-m-d H:i:s');

        Log::info('Uploading excel file -> ' . $filename);

        if ($uploadSuccess) {
            //return Response::json('success', 200); // or do a redirect with some message that file was uploaded

            Log::info('File uploaded -> ' . $filename . ' :: Processing started...');


            if (is_readable('uploads/' . $filename)) {

                Log::info('File is readable -> ' . $filename);

                $objPHPExcel = PHPExcel_IOFactory::load('uploads/' . $filename);
                $rows = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
       
               // $sizeOfData = count($rows);
                Log::info('Something happened');
                
                
                
                // get the column names
                $xls_fields = isset($rows[1]) ? $rows[1] : array();
                if (!empty($xls_fields))
                    unset($rows[1]);

                // xls returns $value = array('A' => 'value'); so you have to remove keys
                $fields = array();
                foreach ($xls_fields as $field) {
                    $fields[] = strtolower($field);
                }

                // find each column's position from available data set
                $contact_pos = array_search('contact', $fields);
                $age_pos = array_search('age', $fields);
                $gender_pos = array_search('gender', $fields);
                $education_pos = array_search('education', $fields);
                $location_pos = array_search('location', $fields);
                $region_pos = array_search('region', $fields);
                $channel_pos = array_search('channel', $fields);
                $language_pos = array_search('language', $fields);

                foreach ($rows as $row) {
                    // remove keys again
                    $data = array();
                    foreach ($row as $key => $value) {
                        $data[] = $value;
                    }



                    // Only use location if exists
                    if ($location_pos !== false) {
                        $location = $data[$location_pos];
                    } else {
                        $location = '';
                    }

                    if ($region_pos !== false) {
                        $region = $data[$region_pos];
                    } else {
                        $region = '';
                    }

                   if ($channel_pos !== false) {
                        $channel = $data[$channel_pos];
                    } else {
                        $channel = 'SMS';
                    }

                   
                   if ($language_pos !== false) {

                       $language = $data[$language_pos];
                        if($language == '--blank--' || $language == '--impossible--' ){
                            $language = 'ENGLISH';
                         }
                    } else {
                        $language = 'ENGLISH';
                    }



                    // getting data read for insertion
                    $contact = $data[$contact_pos];
                    $age = $data[$age_pos];
                    $gender = $data[$gender_pos];
                    $education = $data[$education_pos];

                    /**
                    $client = new Client;
                    $client->client_number = '233' . $contact;
                    $client->client_gender = $gender;
                    $client->client_age = $age;
                    $client->client_education_level = strtolower($education);
                    $client->status = 'Completed';
                    $client->channel = 'SMS';
                    $client->client_location = $location;
                    $client->save();
                     * 
                     */
                    
                    if(trim($contact)===''){
                        Log::info("Empty contact number");
                         $sizeOfFailedData ++;
                    }else{
                    
                    
                    $success = DB::statement('insert ignore into clients_sms_registration Set client_number ="233' . $contact . '",client_gender="' . $gender . '",client_age="' . $age . '",client_education_level="' . $education. '",status="Completed",channel="'.$channel.'" ,created_at="' . $currentDateTime . '" , client_location="'.$location.'" , client_region="'.$region.'" , client_language="'.$language.'"   ');

                    if($success){
                       //  $url = "http://41.191.245.72:8080/noyawa/fireToCouchDb?all=n&phone=".'233' . $contact;
                //send message and get response
               // $response = file_get_contents($url);
                
                //Log::info("Response from couchDb : "+$response);
                        
                        Log::info("Client [233". $contact."] saved!");
                        
                        $sizeOfSuccessData ++;
                        
                    }else {
                        $sizeOfFailedData ++;
                    }
                    
                    }
                }

                unset($rows);
                unset($objPHPExcel);
               
                
              //  $url = "http://41.191.245.72:8080/noyawa/fireCouchFromExcel?filename=". $filename;
                //send message and get response
                //$response = file_get_contents($url);
                // file_get_contents($url);

                //Log::info("Response from No Yawa Service : "+$response);

                Log:: info('Processing of file completed');
                DB::statement('insert into excel_uploads set file_name ="' . $filename. '",file_extension="' . $extension . '",number_of_records="' . ($sizeOfSuccessData + $sizeOfFailedData ) . '",status="Completed : Success[ '.$sizeOfSuccessData .'] and Failed ['. $sizeOfFailedData.']",created_at="' . $currentDateTime . '" ');

                Session::flash('msg', 'File Uploaded successfully , Data with Success[ '.$sizeOfSuccessData .'] and Failed ['. $sizeOfFailedData.' ] records saved !');
                Log::info('File has Success[ '.$sizeOfSuccessData .'] and Failed ['. $sizeOfFailedData.' ] records');
                //file_get_contents($url);

                return Redirect::back();
            } else {

                DB::statement('insert into excel_uploads set file_name ="' . $filename. '",file_extension="' . $extension . '",number_of_records="' . $sizeOfData . '",status="Error:invalid permissions on file",created_at="' . $currentDateTime . '" ');
                
                return Redirect::back()
                                ->with('errors.message', 'Error loading file , check permissions on file');
            }
        } else {
            
            DB::statement('insert into excel_uploads set file_name ="' . $filename. '",file_extension="' . $extension . '",number_of_records="' . $sizeOfData . '",status="Error:can not load file",created_at="' . $currentDateTime . '" ');
                
            
            return Redirect::back()
                            ->with('errors.message', 'Error loading file . ');
        }
    }

}

