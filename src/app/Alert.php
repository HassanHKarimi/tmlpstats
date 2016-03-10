<?php

namespace TmlpStats;

use Carbon\Carbon;
use Eloquence\Database\Traits\CamelCaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TmlpStats\Traits\CachedRelationships;

class Alert extends Model
{
    use CamelCaseModel, CachedRelationships, SoftDeletes;

    protected $fillable = [
        'level',
        'message',
        'active',
        'valid_at',
        'expires_at',
        'created_by_user_id',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $dates = [
        'valid_at',
        'expires_at',
    ];

    public function isDismissable()
    {
        return false;
    }

    public function scopeByCenter($query, Center $center)
    {
        return $query->whereIn('id', function ($query) use ($center) {
            $query->select('alert_id')
                  ->from('alert_center')
                  ->where('center_id', $center->id);
        });
    }

    public function scopeActive($query)
    {
        $now = Carbon::now()->toDateTimeString();

        return $query->whereActive(true)
                     ->where('valid_at', '<=', $now)
                     ->where(function ($query) use ($now) {
                         $query->whereNull('expires_at')->orWhere('expires_at', '>=', $now);
                     });
    }

    public function centers()
    {
        return $this->belongsToMany('TmlpStats\Center');
    }

    public function createdByUser()
    {
        return $this->belongsTo('TmlpStats\User', 'created_by_user_id');
    }
}
