<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $progress_comment
 * @property int|null $is_pass
 * @property int|null $user_id
 * @property int|null $brief_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Competency> $competency
 * @property-read int|null $competency_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereBriefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereIsPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereProgressComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Assessment whereUserId($value)
 */
	class Assessment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $expected_deliverables
 * @property string|null $assessment_method
 * @property string|null $context
 * @property string|null $image_path
 * @property int|null $cohort_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assessment> $assessment
 * @property-read int|null $assessment_count
 * @property-read \App\Models\Cohort|null $cohort
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Competency> $competency
 * @property-read int|null $competency_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tags> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereAssessmentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereCohortId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereExpectedDeliverables($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brief whereUpdatedAt($value)
 */
	class Brief extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property int|null $student_number
 * @property int|null $duration
 * @property string|null $country
 * @property string|null $image_path
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $cohort_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Brief> $brief
 * @property-read int|null $brief_count
 * @property-read \App\Models\CohortCategory|null $cohort_category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skill
 * @property-read int|null $skill_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereCohortCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereStudentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cohort whereUpdatedAt($value)
 */
	class Cohort extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cohort> $cohort
 * @property-read int|null $cohort_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CohortCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CohortCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CohortCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CohortCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CohortCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CohortCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CohortCategory whereUpdatedAt($value)
 */
	class CohortCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property int|null $brief_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assessment> $assessment
 * @property-read int|null $assessment_count
 * @property-read \App\Models\Brief|null $brief
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency whereBriefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Competency whereUpdatedAt($value)
 */
	class Competency extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cohort> $cohort
 * @property-read int|null $cohort_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Skill whereUpdatedAt($value)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student query()
 */
	class Student extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Brief> $brief
 * @property-read int|null $brief_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereUpdatedAt($value)
 */
	class Tags extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trainer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trainer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trainer query()
 */
	class Trainer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $address
 * @property int|null $phone_number
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assessment> $assessment
 * @property-read int|null $assessment_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cohort> $cohort
 * @property-read int|null $cohort_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Student|null $student
 * @property-read \App\Models\Trainer|null $teacher
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

