<?php

use Illuminate\Support\Facades\URL;

class Client extends Eloquent {


    protected $table = 'clients_sms_registration';

    public static $rules = array(

     'client_number' => 'required | numeric | min:10',
     'client_age'    =>  'required | numeric',
     'client_gender' => 'required',
     'client_educational_level' => 'required'

    );


    public static $messages = array(
    'client_number.required' => 'Phone number is required !',
    'client_number.min' => 'Phone number should be a minimum of 10 digits !',
    'client_number.max' => 'Phone number should be a maximum of 12 digits !',
    'client_number.numeric' => 'Phone number should be numeric ! eg. 233xxxxxxxx ',

    'client_age.required' => 'Age is required !',
    'client_age.numeric' => 'Age should be numeric ! eg. 23',

    'client_gender.required' => 'Select gender !',

    'client_educational_level.required' => 'Select educational level !'

    
    );

	/**
	 * Deletes a client and all
	 * the associated details.
	 *
	 * @return bool
	 */
	public function delete()
	{

		// Delete the client
		return parent::delete();
	}

	/**
	 * Returns a formatted client content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	
	/**
	 * Get the client's sms logs.
	 *
	 * @return array
	 */
	public function logs()
	{
		return $this->hasMany('');
	}

    /**
     * Get the date the client was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	

	/**
	 * Returns the date of the client creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the client last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

}
