<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ResetPassword;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotPassword;
use App\Jobs\SendMailNotification;
use App\Models\User;
use App\Models\PasswordReset;


class AuthController extends Controller
{   
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request) {
        $credentials = $request->validated();
        
        if (! $token = auth('api')->attempt($credentials)) {
            $data = [
                'error' => true,
                'message' => 'Unauthorized'
            ];
            return response()->json($data, 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {   
        auth('api')->logout();

        $data = [
            'success' => true,
            'message' => 'Successfully logged out'
        ];

        return response()->json($data, 200);
    }

    /**
     * Refresh a token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function forgotPassword(ForgotPassword $request) {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->firstOrFail();
        $token = Hash::make(Str::random(10));
        $password_reset = new PasswordReset;

        if (PasswordReset::where('email', $data['email'])->exists())
            $password_reset = PasswordReset::where('email', $data['email'])->firstOrFail();

        $password_reset->token = $token;
        $password_reset->email = $data['email'];

        $password_reset->save();

        SendMailNotification::dispatchAfterResponse($user, ['token' => $token]);

        return response()->json(['success' => true], 200); 
    }

    public function resetPassword(ResetPassword $request) {
        $data = $request->validated();
        $status = Password::reset($data, $this->updatePasword($user, $password));

        if ($status !== Password::PASSWORD_RESET) {
            $data = [
                'error' => true,
                'message' => "Could not reset password"
            ];

            return response()->json($data, 500);
        }

        return response()->json(['success' => true], 200);
    }

    protected function updatePasword($user, $password) {
        $user->forceFill([
            'password' => Hash::make($password)
        ])->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
    }
}
