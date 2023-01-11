<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Staudenmeir\LaravelMergedRelations\Eloquent\HasMergedRelationships;
use Staudenmeir\LaravelMergedRelations\Eloquent\Relations\MergedRelation;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasMergedRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @return BelongsToMany
     */
    public function friendsTo(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
                    ->withPivot('accepted')
                    ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function friendsFrom(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
                    ->withPivot('accepted')
                    ->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function pendingFriendsTo(): BelongsToMany
    {
        return $this->friendsTo()->withPivot('accepted', false);
    }

    /**
     * @return BelongsToMany
     */
    public function pendingFriendsFrom(): BelongsToMany
    {
        return $this->friendsFrom()->withPivot('accepted', false);
    }

    /**
     * @return BelongsToMany
     */
    public function acceptedFriendsTo(): BelongsToMany
    {
        return $this->friendsTo()->withPivot('accepted', true);
    }

    /**
     * @return BelongsToMany
     */
    public function acceptedFriendsFrom(): BelongsToMany
    {
        return $this->friendsFrom()->withPivot('accepted', true);
    }

    /**
     * @return MergedRelation
     */
    public function friends(): MergedRelation
    {
        return $this->mergedRelationWithModel(User::class, 'friends_view');
    }

}
