<?php

namespace App\Models;

use App\Enums\ForumStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Forum extends Model
{
    protected $guarded = [];
    use HasFactory, HasUuids;

    // protected $casts = [
    //     'status' => ForumStatusEnum::class
    // ];

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (ForumStatusEnum $status) => $status->name,
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(ReplyForum::class);
    }

}
