<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\Models\User;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{          
   
 public function test_company_redirige_a_crear_tarea()
    {
        $user = User::factory()->create([            
            'role' => 'company',
            'password' => bcrypt('123'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {

            $browser->visit(route('login'))
                    ->type('email', $user->email)
                    ->type('password', '123')
                    ->press('Ingresar')
                    ->assertRouteIs('company.tasks.create');
        });
    }


 public function test_admin_redirige_a_main()
    {
        $user = User::factory()->create([
            'role' => 'admin',
            'password' => bcrypt('123'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {

            $browser->visit(route('login'))
                    ->type('email', $user->email)
                    ->type('password', '123')
                    ->press('Ingresar')
                    ->assertRouteIs('admin.main');
        });
    }



public function test_login_invalido_muestra_error()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(route('login'))
                    ->type('email', 'fake@mail.com')
                    ->type('password', 'incorrecto')
                    ->press('Ingresar')
                    ->assertPathIs('/login')
                    ->assertSee('Credenciales inválidas');
        });
    }

 public function test_professional_redirige_a_notificaciones()
    {
        $user = User::factory()->create([
            'role' => 'professional',
            'password' => bcrypt('123'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {

            $browser->visit(route('login'))
                    ->type('email', $user->email)
                    ->type('password', '123')
                    ->press('Ingresar')
                    ->assertRouteIs('notifications.index');
        });
    }

    public function test_pending_redirige_a_seleccion_de_rol()
    {
        $user = User::factory()->create([
            'role' => 'pending',
            'password' => bcrypt('123'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {

            $browser->visit(route('login'))
                    ->type('email', $user->email)
                    ->type('password', '123')
                    ->press('Ingresar')
->assertRouteIs('register.role', ['user' => $user->id]);
        });
    }


    


}