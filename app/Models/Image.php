<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image',
        'resolution',
        'plan_type',
        'storage',
        'expires_at',
        'image_name',
        'vendor',
        'negative_prompt',
        'image_style',
        'image_lighting',
        'image_medium',
        'image_mood',
        'image_artist',
        'sd_prompt_strength',
        'sd_steps',
        'sd_diffusion_samples',
        'sd_clip_guidance',
    ];
}
