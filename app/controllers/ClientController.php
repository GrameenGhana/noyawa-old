<?php

class ClientController extends BaseController {

    /**
     * Client Model
     * @var Client
     */
    protected $client;

    public function showCreateForm() {
        return View::make('register');
    }

    /**
     * Returns all the clients.
     *
     * @return View
     */
    public function getIndex() {
        // Get all the clients
        $clients = $this->client->orderBy('created_at', 'DESC')->paginate(10);

        // Show the page
        return View::make('clients/index', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postClient() {
        Log::info("Accessing postClient @ ClientController");

        $input = Input::all();
        $validation = Validator :: make($input, Client::$rules, Client::$messages);


        if ($validation->passes()) {


            $number = $input['client_number'];
            $country_code = '233';
            if (substr($number, 0, 1) == '0') {
                $new_number = substr_replace($number, $country_code, 0, 1);
            } else {
                $new_number = $number;
            }

            /**
              $client = new Client;
              $client->client_number  = $new_number;
              $client->client_gender  = $input['client_gender'];
              $client->client_age     = $input['client_age'];
              $client->client_education_level  = $input['client_educational_level'];
              $client->status = 'Completed';
              $client->channel = 'SMS';
             * */
            $date = date_create();
            $currentDateTime = date_format($date, 'Y-m-d H:i:s');

              $sucess = DB::statement('insert ignore into clients_sms_registration Set client_number ="' . $new_number . '",client_gender="' . $input['client_gender'] . '",client_age="' . $input['client_age'] . '",client_education_level="' . $input['client_educational_level'] . '",client_location="' . $input['client_location'] . '",client_region="' . $input['client_region'] . '",status="Completed",channel="SMS" ,created_at="' . $currentDateTime . '"');
            

            if ($sucess) {

                //  $url = "http://41.191.245.72:8080/noyawa/fireToCouchDb?all=n&phone=".$new_number;
                //send message and get response
                //$response = file_get_contents($url);
                
                //Log::info("Response from couchDb : "+$response);               
                 
                 Session::flash('msg', 'Client [' . $number . '] successfully saved !');

                return Redirect::to("noyawa/register");
            }
        } else {

            return Redirect::to("noyawa/register")
                            ->withInput()
                            ->withErrors($validation)
                            ->with('message', 'There were validation errors.');
        }
    }

   
    /**
     * Show a list of all the clients formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData() {
         $clients = Client::select(array('id', 'client_number', 'client_gender', 'client_age', 'client_education_level','status' ,'created_at'))
           ->orderBy('id', 'DESC');                   
           
        return Datatables::of($clients)


        ->make();
    }
}
