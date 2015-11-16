<?php

namespace vRemind;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use vRemind\Role;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use Messagable;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'title', 'signature', 'country', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany('vRemind\Role', 'user_roles');
    }
    /**
     * Does the user have a particular role?
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        return in_array($name, array_fetch($this->roles->toArray(), 'name'));
    }
    /**
      * Find out if User is an employee, based on if has any roles
      *
      * @return boolean
      */
    public function isEmployee()
    {
        $roles = $this->roles->toArray();
        return !empty($roles);
    }
    /**
     * Assign a role to the user
     *
     * @param $role
     * @return mixed
     */
    public function assignRole($title)
    {
        $assigned_roles = array();
        $roles = array_fetch(Role::all()->toArray(), 'name');

        switch ($title) {
            case 'super_admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_customer');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_customer');
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'create_customer');
            case 'concierge':
                $assigned_roles[] = $this->getIdInArray($roles, 'add_points');
                $assigned_roles[] = $this->getIdInArray($roles, 'redeem_points');
                break;
            default:
                throw new \Exception("The employee status entered does not exist");
        }

        $this->roles()->attach($assigned_roles);
    }
    /**
     * Remove a role from a user
     *
     * @param $role
     * @return mixed
     */
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }
    /**
      * Get key in array with corresponding value
      *
      * @return int
      */
    private function getIdInArray($array, $term)
    {
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key;
            }
        }

     throw new UnexpectedValueException;
    }

    /**
     * @return mixed
     */
    public function classes()
    {
        return $this->belongsToMany('Classes', 'class_users');
    }

    /**
     * Does the user have a particular class?
     *
     * @param $class_code
     * @return bool
     */
    public function inClass($class_code)
    {
        return in_array($class_code, array_fetch($this->classes->toArray(), 'class_code'));
    }
}
