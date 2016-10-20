<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 20.10.16
 * Time: 18:48
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Card extends Model
{
    use DatePresenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['myID', 'donID'];
}