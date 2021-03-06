<?php
namespace TmlpStats;

use Eloquence\Database\Traits\CamelCaseModel;
use Illuminate\Database\Eloquent\Model;
use TmlpStats\Traits\CachedRelationships;

class Course extends Model
{
    use CamelCaseModel, CachedRelationships;

    protected $fillable = [
        'center_id',
        'start_date',
        'type',
        'location',
    ];

    protected $dates = [
        'start_date',
    ];

    /**
     * Special handler for firstOrCreate and firstOrNew
     *
     * When set, is_international is used to differentiate between international and local registrations into a
     * given course. As of now (Feb 2016), INTL is only used by the London center.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public static function firstOr(array $attributes)
    {
        if (!isset($attributes['is_international'])) {
            return static::where($attributes)->first();
        }

        // Special handing for INTL vs local course stats
        $isInternational = $attributes['is_international'];
        $centerId = $attributes['center_id'];

        unset($attributes['is_international']);
        unset($attributes['center_id']);

        $query = Course::byCenter(Center::find($centerId));
        foreach ($attributes as $field => $value) {
            $query->where($field, $value);
        }

        $comparator = $isInternational ? '=' : '<>';
        $query->where('location', $comparator, 'INTL');

        $course = $query->first();

        return $course;
    }

    public static function firstOrNew(array $attributes)
    {
        $course = static::firstOr($attributes);

        if ($course) {
            return $course;
        }

        return new static($attributes);
    }

    public static function firstOrCreate(array $attributes)
    {
        $course = static::firstOr($attributes);

        if ($course) {
            return $course;
        }

        return static::create($attributes);
    }

    public function scopeType($query, $type)
    {
        return $query->whereType($type);
    }

    public function scopeCap($query)
    {
        return $query->whereType('CAP');
    }

    public function scopeCpc($query)
    {
        return $query->whereType('CPC');
    }

    public function scopeLocation($query, $location)
    {
        return $query->whereLocation($location);
    }

    public function scopeByCenter($query, Center $center)
    {
        return $query->whereCenterId($center->id);
    }

    public function center()
    {
        return $this->belongsTo('TmlpStats\Center');
    }

    public function courseData()
    {
        return $this->hasMany('TmlpStats\CourseData');
    }
}
