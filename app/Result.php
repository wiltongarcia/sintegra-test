<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cnpj'];

    /**
     * Get the user that owns the result
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
