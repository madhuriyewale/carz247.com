<?php



use Illuminate\Auth\UserTrait;

use Illuminate\Auth\UserInterface;

use Illuminate\Auth\Reminders\RemindableTrait;

use Illuminate\Auth\Reminders\RemindableInterface;



class Testimonial extends Eloquent implements UserInterface, RemindableInterface {



    use UserTrait,

        RemindableTrait;



    /**

     * The database table used by the model.

     *

     * @var string

     */

    protected $table = 'testimonials';



    /**

     * The attributes excluded from the model's JSON form.

     *

     * @var array

     */

    const CREATED_AT = 'created';



    /**

     * The name of the "updated at" column.

     *

     * @var string

     */

    const UPDATED_AT = 'modified';



}

