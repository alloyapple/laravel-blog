<?php

namespace Blog;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
	use Notifiable;
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function delete() {
		return $this->posts()->delete() && parent::delete();
	}

	public function restore() {
		return $this->posts()->restore() && parent::restore();
	}

	public function posts() {
		return $this->hasMany(Post::class, 'user_id');
	}

	public function comments() {
		return $this->hasMany(Comment::class, 'user_id');
	}

	public function isModerator() {
		return $this->is_moderator || $this->is_admin;
	}

}
