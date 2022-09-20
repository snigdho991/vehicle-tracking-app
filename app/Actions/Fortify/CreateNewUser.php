<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Location;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name'   => ['required', 'string', 'max:255'],
            'email'  => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'stu_id' => ['required', 'string', 'max:255'],
            'dept'   => ['required', 'string', 'max:255'],
            'session' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        /*$user = User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'stu_id'   => $input['stu_id'],
            'dept'     => $input['dept'],
            'session'  => $input['session'],
            'password' => Hash::make($input['password']),
            'role'     => 'Student',
        ]);*/

        $user = new User();
        $user->name     = $input['name'];
        $user->email    = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->role     = 'Student';
        $user->stu_id   = $input['stu_id'];
        $user->dept     = $input['dept'];
        $user->session  = $input['session'];

        $user->save();

        $user->assignRole('Student');

        /*$location = Location::create([
            'user_id'  => $user->id,
        ]);*/

        return $user;
    }
}
