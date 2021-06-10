<?php

namespace Adminetic\Contact\Models\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Adminetic\Contact\Models\Admin\Group;
use Spatie\Activitylog\Traits\LogsActivity;

class Contact extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('contacts') ? Cache::forget('contacts') : '';
    }

    // Logs
    protected static $logName = 'contact';

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeInActive($query)
    {
        return $query->where('active', 0);
    }
    public function scopeFavorite($query)
    {
        return $query->where('favorite', 1);
    }
    public function scopeNonFavorite($query)
    {
        return $query->where('favorite', 0);
    }

    // Relations
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
}
