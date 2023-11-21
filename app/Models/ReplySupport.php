<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;

class ReplySupport extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $table = 'reply_support';
    protected $fillable = ['description', 'support_id', 'user_id'];
    protected $touches=['support'];

    /**
     * Get the support that owns the ReplySupport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function support()
    {
        return $this->belongsTo(Support::class);
    }

    /**
     * Get the user that owns the ReplySupport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
