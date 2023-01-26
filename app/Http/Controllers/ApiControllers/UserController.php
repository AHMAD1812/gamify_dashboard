<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'sometimes',
            'phone' => 'sometimes',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif',
            'dob' => 'sometimes',
            'country' => 'sometimes',
            'state' => 'sometimes',
            'city' => 'sometimes',
            'cca2' => 'sometimes',
            'gender' => 'sometimes|in:male,female,other',
            'bio'=>'sometimes'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();

            $user = Auth()->user();
            $user->full_name = isset($request->full_name) ? $request->full_name : $user->full_name;
            $user->phone = isset($request->phone) ? $request->phone : $user->phone;
            $user->dob = isset($request->dob) ? $request->dob : $user->dob;
            $user->country = isset($request->country) ? $request->country : $user->country;
            $user->state = isset($request->state) ? $request->state : $user->state;
            $user->city = isset($request->city) ? $request->city : $user->city;
            $user->gender = isset($request->gender) ? $request->gender : $user->gender;
            $user->cca2 = isset($request->cca2) ? $request->cca2 : $user->cca2;
            $user->biography = isset($request->bio) ? $request->bio : $user->bio;

            if ($request->image) {
                $user->profile_img = $this->addFile($request->image, 'uploads/profile/');
            }
            $user->update();
            DB::commit();
            $data['user'] = $user;
            return $this->sendSuccess('Profile Successfully Updated', $data);
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }
    public function completeProfile(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'full_name' => 'sometimes',
            'phone' => 'sometimes',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif',
            'dob' => 'sometimes|before:'.now()->subYears(18)->toDateString(),
            'country' => 'sometimes',
            'state' => 'sometimes',
            'city' => 'sometimes',
            'cca2' => 'sometimes',
            'gender' => 'sometimes|in:male,female,other',
            'user_interest' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();

            $user = Auth()->user();
            $user->full_name = $request->full_name;
            $user->phone = $request->phone;
            $user->dob = $request->dob;
            $user->country = $request->country;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->cca2 = $request->cca2;
            $user->gender = $request->gender;

            if ($request->image) {
                $user->profile_img = $this->addFile($request->image, 'uploads/profile/');
            }

            
            $UserNatural = new \MangoPay\UserNatural();
            $UserNatural->FirstName = $user->full_name;
            $UserNatural->LastName = 'Influencer';
            $UserNatural->Birthday = strtotime($request->dob);
            $UserNatural->Nationality = $request->cca2;
            $UserNatural->CountryOfResidence = $request->cca2;
            $UserNatural->Email = $user->email;
            $UserNatural->UserCategory = 'OWNER';
            $userResult = $this->mangoPayApi->Users->Create($UserNatural);
            $user->mangopay_id = $userResult->Id;

            $Wallet = new \MangoPay\Wallet();
            $Wallet->Owners = array($user->mangopay_id);
            $Wallet->Description = "Influencer wallet";
            $Wallet->Currency = "EUR";
            $Wallet->Tag = "Creating wallet for influencer";
            $Result = $this->mangoPayApi->Wallets->Create($Wallet);

            $wallet = new InfluencerWallet;
            $wallet->user_id = $user->id;
            $wallet->mangopay_wallet_id=$Result->Id;
            $wallet->save();

            $user->update();

            if ($request->has('user_interest')) {
                foreach ($request->user_interest as $record) {
                    $userInterest = new UserInterest();
                    $userInterest->name = $record['name'];
                    $userInterest->image = $record['image'];
                    $userInterest->description = $record['description'];
                    $userInterest->interest_id = $record['id'];
                    $userInterest->user_id = Auth::id();
                    $userInterest->save();
                }
            }
            DB::commit();
            $data['user'] = $user;
            $data['userInterest'] = $request->user_interest;
            return $this->sendSuccess('Profile Completed Successfully', $data);
        } catch (\MangoPay\Libraries\ResponseException $e) {
            DB::rollback();
            return $this->sendError($e->GetErrorDetails(), null);
        } catch (\Exception$exception) {
            DB::rollback();

            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }

    }
    public function getAllInterest()
    {
        $data['Interests'] = Interest::all();
        return $this->sendSuccess('all interests', $data);
    }
    public function deleteInterest(Request $request)
    {
        $userInterest = UserInterest::where('user_id', Auth::id())->where('interest_id', $request->id)->first();
        if ($userInterest) {
            $userInterest->delete();
            $data['userInterest'] = UserInterest::where('user_id', Auth::id())->paginate(20);
            return $this->sendSuccess('user interest Successfully deleted', $data);
        }
        return $this->sendError('user interest not found', null);
    }
    public function updateInterest(Request $request){
        $validator = Validator::make($request->all(), [
            'user_interest' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        UserInterest::where('user_id',Auth::id())->delete();

        foreach ($request->user_interest as $record) {
            $userInterest = new UserInterest();
            $userInterest->name = $record['name'];
            $userInterest->image = $record['image'];
            $userInterest->description = $record['description'];
            $userInterest->interest_id = $record['interest_id'];
            $userInterest->user_id = Auth::id();
            $userInterest->save();
        }

        $data['userInterest'] = UserInterest::where('user_id',Auth::id())->get();
        return $this->sendSuccess('Profile Completed Successfully', $data);
    }

    public function updateFiscalInformation(Request $request){
        $validator = Validator::make($request->all(), [
            'legal_name' => 'required',
            'address' => 'required',
            'tax_id' => 'required',
            'city'=>'required',
            'country'=>'required',
            'postal_code'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();

            $user = Auth()->user();
            $user->address = $request->address;
            $user->tax_id = $request->tax_id;
            $user->legal_name = $request->legal_name;
            $user->fiscal_city = $request->city;
            $user->fiscal_country = $request->country;
            $user->postal_code = $request->postal_code;
            $user->update();
            
            DB::commit();

            return $this->sendSuccess('Fiscal Information Added', Auth::user());
        } catch (\Exception$exception) {
            DB::rollback();
            if (('APP_ENV') == 'local') {
                dd($exception);
            } else {
                return $this->sendError($exception->getMessage(), null);
            }
        }
    }
}
