<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected function successfulLoginRoute()
    {
        return route('home');
    }

    protected function loginGetRoute()
    {
        return route('login');
    }

    protected function loginPostRoute()
    {
        return route('login');
    }

    protected function logoutRoute()
    {
        return route('logout');
    }

    protected function successfulLogoutRoute()
    {
        return '/';
    }

    

    public function testUserCanViewEditProfile()
    {
        $response = $this->get($this->EditProfileRoute());

        $response->assertSuccessful();
        $response->assertViewIs('Edit Profile');
    }

    
    public function testUserCanLoginWithCorrectCredentials()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

    

    public function testUserCannotLoginWithIncorrectPassword()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('i-love-laravel'),
        ]);

        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    public function testUserCanLogout()
    {
        $this->be(factory(User::class)->create());

        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    public function testUserCannotLogoutWhenNotAuthenticated()
    {
        $response = $this->post($this->logoutRoute());

        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    
}
