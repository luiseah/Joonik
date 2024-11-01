<?php

namespace App\Models;

use App\Models\Builders\LocationBuilder;
use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @method static LocationBuilder|Location applyFilters(\Illuminate\Http\Request $request)
 * @method static \Database\Factories\LocationFactory factory($count = null, $state = [])
 * @method static LocationBuilder|Location newModelQuery()
 * @method static LocationBuilder|Location newQuery()
 * @method static LocationBuilder|Location orderBys(\Illuminate\Http\Request $request)
 * @method static LocationBuilder|Location pagination($limit = 15)
 * @method static LocationBuilder|Location query()
 * @method static LocationBuilder|Location s($input)
 * @mixin \Eloquent
 */
class Location extends Model
{
    /**  @use HasFactory<LocationFactory> */
    use HasFactory;

    /**
     * The Eloquent query builder class to use for the model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Builder<*>>
     */
    protected static string $builder = LocationBuilder::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id',
    ];

    /**
     * Get the user that owns the Location.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Location>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
