<?php
/**
 * LApolinario
 *
 * @category  LApolinario
 * @package   Ava
 * @version   1.0.0
 * @author    Luiz Felipe Apolinário <luizfelipeapo@gmail.com>
 */

declare(strict_types=1);

namespace LApolinario\Ava\Auth\Database;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use LApolinario\Ava\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Classroom.
 *
 * @property int $id
 *
 * @method where($parent_id, $id)
 */
class Classroom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');
        $this->setConnection($connection);
        $this->setTable(config('admin.database.classroom_entity_table'));
        parent::__construct($attributes);
    }

    /**
     * A User has and belongs to many registration class.
     *
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {
        $pivotTable = config('admin.database.student_entity_table');
        $relatedModel = config('admin.database.students_model');
        return $this->belongsToMany($relatedModel, $pivotTable, 'id', 'students');
    }
}
