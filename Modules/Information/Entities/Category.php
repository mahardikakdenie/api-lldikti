<?php

namespace Modules\Information\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Information\Database\factories\CategoryFactory::new();
    }

    public function informations()
    {
        return $this->hasMany(Information::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeEntities($query, $entities)
    {
        if ($entities != null || $entities != '') {
            $entities = str_replace(' ', '', $entities);
            $entities = explode(',', $entities);

            try {
                return $query = $query->with($entities);
            } catch (\Throwable $th) {
                return Json::exception(null, validator()->errors());
            }
        }
    }

    public function scopeIsPublish($query, $isPublish)
    {
        if ($isPublish === '1' || $isPublish === 'true') {
            $query->where('status', 1);
        }
        if ($isPublish === '0' || $isPublish === 'false') {
            $query->where('status', 1);
        }

        return $query;
    }
}
