<?php

namespace App\Main\Services;

use App\Main\Repositories\AdminRepository;
use App\Main\Repositories\OtpRepository;
use App\Main\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;
use const App\Main\Helpers\RESPONSE_STATUS_SUCCESS;
use const App\Main\Helpers\HTTP_CODE_SUCCESS;
use App\Main\Helpers\Response;




class AuthService
{
    protected AdminRepository $adminRepository;
    protected OtpRepository $otpRepository;
    protected UserRepository $userRepository;

    protected $response;

    public function __construct(
        AdminRepository $adminRepository,
        OtpRepository   $otpRepository,
        UserRepository  $userRepository
    ) {
        $this->adminRepository = $adminRepository;
        $this->otpRepository = $otpRepository;
        $this->userRepository = $userRepository;
    }

    public function login($userName, $password)
    {

        $user = $this->adminRepository->findOne('email', $userName);

        if (empty($user)) {
            return $this->response->responseJsonFail('User does not exist');
        }
        if (!Hash::check($password, $user->password)) {
            return $this->response->responseJsonFail('Password incorrect');
        }

        $token = $user->createToken('authToken')->plainTextToken;


        return response(
            [
                // ...

                'status' => RESPONSE_STATUS_SUCCESS,
                'data' => [
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user,

                ],

            ],
            HTTP_CODE_SUCCESS
        );
    }

    public function logout()
    {
        if (\auth()->check()) {

            auth()->user()->tokens()->delete();
            return $this->response->responseJsonSuccess('Logout success');
        } else {
            return $this->response->responseJsonFail('User does not exist');
        }
    }

    public function loginUser($email, $password)
    {

        $user = $this->userRepository->findOne('email', $email);


        if (empty($user)) {
            return $this->response->responseJsonFail('User does not exist');
        }
        if (!Hash::check($password, $user->password)) {
            return $this->response->responseJsonFail('Password incorrect');
        }

        $token = $user->createToken('authToken')->plainTextToken;
        $user = $user
            ->where('email', '=', $email)
            ->first();


        return response(
            [
                // ...

                'status' => RESPONSE_STATUS_SUCCESS,
                'data' => [
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user,

                ],

            ],
            HTTP_CODE_SUCCESS
        );
    }


    public function sendOtp($email)
    {

        $otp = $this->generateOtp();
        $data = [
            'email' => $email,
            'otp' => $otp,
            'is_used' => false
        ];
        $this->otpRepository->delete('email', $email);
        $this->otpRepository->create($data);

        Mail::raw((string)$otp, function ($message) use ($email) {
            $message->to($email)->subject('Verify OTP');
        });
        return $this->response->responseJsonSuccess('Send email success', HTTP_CODE_SUCCESS);
    }

    public function me($user)
    {
        return $this->response->responseJsonSuccess($user, 'Get detail user success');
    }

    public function verify($email, $_otp)
    {
        $otp = $this->otpRepository->findOneLast('email', $email);
        if (empty($otp)) {
            return $this->response->responseJsonFail('Email does not exist');
        }
        if ($otp->is_used) {
            return $this->response->responseJsonFail('OTP has been used');
        }
        if ($otp->created_at->addMinutes(5) < now()) {
            return $this->response->responseJsonFail('OTP has expired');
        }

        if ($otp->otp != $_otp) {
            return $this->response->responseJsonFail('OTP is incorrect');
        }
        $otp->is_used = true;
        $otp->save();
        return '';
    }

    public function verifyEmail($email)
    {
        $user = $this->userRepository->findOne('email', $email);
        if (empty($user)) {
            return $this->response->responseJsonFail('Email does not exist');
        }
        $user->status = 1;
        $user->save();
        return $this->response->responseJsonSuccess('Verify email success');
    }

    public function changePass($email, $newPass, $pass = null)
    {

        $user = $this->userRepository->findOne('email', $email);

        if (empty($user)) {
            return $this->response->responseJsonFail('User does not exist');
        }
        if (!isEmpty($pass) && !Hash::check($pass, $user->password)) {
            return $this->response->responseJsonFail('Current password is not correct');
        }
        $user->password = Hash::make($newPass);
        $user->save();
        return $this->response->responseJsonSuccess('Change password success');
    }

    private function generateOtp()
    {
        return rand(100000, 999999);
    }
}
