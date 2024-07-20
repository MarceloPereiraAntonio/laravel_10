<?php

namespace App\Models;

use App\Enums\ForumStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $guarded = [];
    use HasFactory, HasUlids;

    // protected $casts = [
    //     'status' => ForumStatusEnum::class
    // ];

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (ForumStatusEnum $status) => $status->name,
        );
    }

}
