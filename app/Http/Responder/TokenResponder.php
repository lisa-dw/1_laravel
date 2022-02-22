<?php

declare(strict_types=1);

namespace App\Http\Responder;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TokenResponder
{
    public function __invoke($token, int $ttl):JsonResponse
    {
        // 토큰이 없으면,
        // JsonResponse에,
        // 에러로 Unauthorized을 띄우고,
        // status로 HTTP_UNAUTHORIZED에 해당하는 int를 요청해라.(콘솔에서 확인하는 status임)
        if(!$token){
            return new JsonResponse([
                'error' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }

        // 토큰이 있으면,
        // JsonResponse에,
        //[] 안에 있는 것들로 지정하고,
        // status로 HTTP_OK에 해당하는 int를 요청해라.
        return new JsonResponse([
            'access_token'  => $token,
            'token_type' => 'bearer',
            'expires_in' => $ttl
        ], Response::HTTP_OK);
    }
}
