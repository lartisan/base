<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'abilities';

	/**
	 * The attributes that are not mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

    /**
     * make the name snake case
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = str_replace( ' ', '_', strtolower($value) );
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function roles() {
		return $this->belongsToMany(Role::class, 'role_abilities', 'ability_id', 'role_id');
	}
}
