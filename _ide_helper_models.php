<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Status
 *
 * @property int $twitter_id
 * @property string $submit_status
 * @property int|null $selling_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereSellingEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereSubmitStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereTwitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereUpdatedAt($value)
 */
	class Status extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $twitter_id
 * @property string $twitter_name
 * @property string|null $name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTwitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTwitterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Work
 *
 * @property int $twitter_id
 * @property int $work_no
 * @property string $work_path
 * @property string $work_title
 * @property string $comment
 * @property int $character_code
 * @property int $year_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereCharacterCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereTwitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereWorkNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereWorkPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereWorkTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Work whereYearCode($value)
 */
	class Work extends \Eloquent {}
}

