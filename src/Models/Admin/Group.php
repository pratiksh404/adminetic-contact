<?php

namespace Adminetic\Contact\Models\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Adminetic\Contact\Models\Admin\Contact;
use Spatie\Activitylog\Traits\LogsActivity;

class Group extends Model
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
        Cache::has('groups') ? Cache::forget('groups') : '';
    }

    // Logs
    protected static $logName = 'group';

    // Relation
    public function contacts()
    {
        return $this->belongsToMany(Contact::class)->withTimestamps();
    }
}
