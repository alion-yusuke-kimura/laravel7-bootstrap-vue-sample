<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class TActionLog extends Model
{
    // 更新日時記録を無効化
    const UPDATE_AT = null;

    // Jsonに「name」を含める
    protected $appends = ['name'];

    protected $fillable = [
        'user_id',
        'route',
        'url',
        'method',
        'status',
        'data',
        'remote_addr',
        'user_agent',
    ];

    // Jsonに出力する項目
    protected $visible = [
        'user_id',
        'route',
        'url',
        'method',
        'status',
        'data',
        'remote_addr',
        'user_agent',
        'created_at',
        'name',
    ];

    /**
     * ユーザの名前を取得
     * リレーションができなかった場合は、空文字を返却
     */
    public function getNameAttribute()
    {
        $user = $this->user;
        if ($user)
        {
            return $user->name;
        }
        else
        {
            return '';
        }
    }

    /**
     * カラムを暗号化
     * 要求内容は暗号化して保存
     */
    public function getDataAttribute($value)
    {
        if ($value)
        {
            $this->attributes['data'] = Crypt::encrypt(serialize($value));
        }
    }

    public function user()
    {
        return $this->belongsTo('App\Models\MUser', 'user_id', 'id');
    }
}
