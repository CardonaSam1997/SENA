<?php
namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Storage;

class RegisterCompanyTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_complete_company_profile()
{
    $user = User::factory()->create([
        'role' => 'pending',
        'completed' => false,
    ]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser->loginAs($user)
            // Paso 1: selección de rol
            ->visit(route('register.role', ['user' => $user->id]))
            ->click('#company-card') // ahora clic explícito en Empresas
            ->assertPathIs('/register/company/'.$user->id)

            // Paso 2: llenar formulario de empresa
            ->type('nit', '900123456')
            ->type('name', 'Mi Empresa S.A.S')
            ->type('address', 'Carrera 45 #67-89')
            ->select('service_type', 'tecnologia')
            ->type('web', 'https://miempresa.com')
            ->press('Registrar Empresa')
            ->pause(2000)

            // Paso 3: verificar redirección y modal de bienvenida
            ->waitForLocation('/company/tasks')
            ->waitFor('#welcomeModal')
            ->assertSeeIn('#welcomeModal', '¡Bienvenido!');
    });
}

    public function test_nit_is_required()
    {
        $user = User::factory()->create([
            'role' => 'pending',
            'completed' => false,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                // Paso 1: selección de rol
                ->visit(route('register.role', ['user' => $user->id]))
                ->click('#company-card') // ahora clic explícito en Empresas
                ->assertPathIs('/register/company/'.$user->id)

                // Paso 2: llenar formulario de empresa
                ->type('nit', '')
                ->type('name', 'Mi Empresa S.A.S')
                ->type('address', 'Carrera 45 #67-89')
                ->select('service_type', 'tecnologia')
                ->type('web', 'https://miempresa.com')
                ->press('Registrar Empresa')                                                
                ->assertSee('El NIT es obligatorio'); 

        });
    }



}