<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Twilio\Jwt\Grants\VoiceGrant;
require_once dirname(dirname(__FILE__)).'/TwilioLibrary/autoload.php';;
use Twilio\TwiML\VoiceResponse;


class UserOtp extends Model
{
    // 
	protected $fillable = [
        'user_id', 'otp', 'expire_at'
    ];
	
	public function sendSMS($receiverNumber)
    {
		//$otp = rand(230456,987654);
		$message = "Login OTP is ".$this->otp;
	   
		try {
			$account_id = getenv('TWILIO_SID');
			$auth_token = getenv('TWILIO_TOKEN');
			$twilio_number = getenv('TWILIO_FROM');			
			
			$client = new Client($account_id, $auth_token);
			
			// Use the client to do fun stuff like send text messages!
			$otpmessage =  $client->messages->create(
				// the number you'd like to send the message to
				$receiverNumber,
				array(
					// A Twilio phone number you purchased at twilio.com/console
					"from" => 	$twilio_number,					
					"body" =>	$message 
				)
			);
			//echo $otpmessage;exit;
			info("SMS Sent Successfully");
		}
		catch (\Exception $e) {
		  //display custom message
		  info("Error: ".$e->getMessage());
		}
	   
    }
}
