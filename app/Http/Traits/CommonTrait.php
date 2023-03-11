<?php
namespace App\Http\Traits;

use App\Models\Card;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

trait CommonTrait
{
    function sendSuccess($message, $data = '')
    {
        //return Response::json(array('status' => 200, 'successMessage' => $message, 'successData' => $data), 200, []);
        return response()->json([
            'status' => 200,
            'message' => $message,
            'data' => $data,
        ]);
    }
    function sendError($error_message, $code = '', $data = null)
    {
        //return Response::json(array('status' => 400, 'errorMessage' => $error_message), 400);
        return response()->json([
            'status' => 400,
            'message' => $error_message,
            'data' => $data,
        ]);
    }
    function sendWarning($error_message, $data = '')
    {
        //return Response::json(array('status' => 400, 'errorMessage' => $error_message), 400);
        return response()->json([
            'status' => 320,
            'message' => $error_message,
            'data' => $data,
        ]);
    }
    function addFile($file, $path)
    {
        if ($file) {
            if ($file->getClientOriginalExtension() != 'exe') {
                if(!File::exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $type = $file->getClientMimeType();
                $destination_path = $path;
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::random(15) . '.' . $extension;
                $file->move($destination_path, $fileName);
                $file_path = $destination_path . $fileName;
                return $file_path;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function sendSms($messageText, $to)
    {
        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create($to, // to
                array(
                    "messagingServiceSid" => env("TWILIO_MESSAGE_SERVICE_ID"),
                    "body" => $messageText,
                )
            );
        return $message;
    }

    function sendNotification($user_from,$user_to,$type, $message)
    {

        $notification = new Notification;
        $notification->user_from = $user_from;
        $notification->user_to = $user_to;
        $notification->profile_image = $profile_img;
        $notification->type = $type;
        $notification->message = $message;
        $notification->save();

        return;
    }
    
    function send_OneSignal_Notification($message, $data, $emails)
    {
        $content = array(
            "en" => $message,
        );

        $fields = array(
            'app_id' => env("ONESIGNAL_APP_ID"),
            'include_external_user_ids' => $emails,
            'channel_for_external_user_ids' => 'push',
            'data' => $data,
            'contents' => $content,
        );

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic ' . env("ONESIGNAL_REST_API_KEY")));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
