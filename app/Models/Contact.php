<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact',
        'name',
        'type_id',
        'user_id'
    ];

    public function scopeFilterByNameOrContact($query, string $search)
    {
        return $query->where('contact', 'LIKE', "%$search%")->orWhere('name','LIKE',"%$search%");
    }

    public function type(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->contactType->name ?? null
        );
    }

    public function contactType(): BelongsTo
    {
        return $this->belongsTo(ContactType::class, 'type_id');
    }
}
