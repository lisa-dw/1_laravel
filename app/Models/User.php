<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'userid',
        'phone',
        'address',
        'subAddress',
        'zip',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // 하단의 두 JWT 메서드는 사용자를 특정하는 유일한 값이 반환된다.

    // # jwt 미들웨어(Middleware)의 인터페이스를 구현한 부분.
    // 엘로퀀트 모델에서는 기본 키 등이 반환됨.
    public function getJWTIdentifier(): int
    {
        return $this->getKey();
    }

    // # jwt의 토큰을 습득하기 위한 메서드.
    //JWT에서 이용하는 클레임 정보로, 추가할 클레임 정보가 있다면 배열로 지정한다.
    public function getJWTCustomClaims(): array
    {
        return [];
    }


}
