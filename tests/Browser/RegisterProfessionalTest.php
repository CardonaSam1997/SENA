<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Storage;

class RegisterProfessionalTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_complete_professional_profile()
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'role' => 'pending',
            'completed' => false,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                // Paso 1: selección de rol
                ->visit(route('register.role', ['user' => $user->id]))
                ->click('.role-card:first-child') // el primer card es Profesional
                ->assertPathIs('/register/professional/'.$user->id)

                // Paso 2: llenar formulario de profesional
                ->type('document', '123456789')
                ->type('name', 'Juan')
                ->type('last_name', 'Pérez')
                ->type('address', 'Calle 123')
                ->type('birth_date', '1990-01-01')
                ->type('age', '33')
                ->type('experience', '5')
                ->type('academic_education', 'Ingeniería de Sistemas')
                ->select('gender', 'M')
                ->select('service_type', 'software')
                ->type('description', 'Soy desarrollador con experiencia en Laravel y PHP')
                ->attach('curriculum', base_path('tests/Browser/files/dummy.pdf'))
                ->press('Registrarme')
                ->pause(2000)                
                ->waitForLocation('/notificaciones')
                ->waitFor('#welcomeModal')
                ->assertSeeIn('#welcomeModal', '¡Bienvenido!');
        });
    }


    public function test_document_is_required() {
        $user = User::factory()->create(['role' => 'pending', 'completed' => false]); 
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->loginAs($user) 
            ->visit(route('register.professional.form', ['user' => $user->id])) 
            ->type('name', 'Juan') 
            ->type('last_name', 'Pérez') 
            ->type('address', 'Calle 123') 
            ->type('birth_date', '1990-01-01') 
            ->type('age', '33') 
            ->type('experience', '5') 
            ->type('academic_education', 'Ingeniería de Sistemas') 
            ->select('gender', 'M') 
            ->select('service_type', 'software') 
            ->type('description', 'Soy desarrollador con experiencia en Laravel y PHP') 
            ->attach('curriculum', base_path('tests/Browser/files/dummy.pdf')) 
            ->press('Registrarme') 
            ->assertSee('El número de documento es obligatorio'); 
        }); 
    }

    public function test_name_is_required() {
        $user = User::factory()->create(['role' => 'pending', 'completed' => false]); 
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->loginAs($user) 
            ->visit(route('register.professional.form', ['user' => $user->id])) 
            ->type('document', '123456789')
            ->type('last_name', 'Pérez') 
            ->type('address', 'Calle 123') 
            ->type('birth_date', '1990-01-01') 
            ->type('age', '33') 
            ->type('experience', '5') 
            ->type('academic_education', 'Ingeniería de Sistemas') 
            ->select('gender', 'M') 
            ->select('service_type', 'software') 
            ->type('description', 'Soy desarrollador con experiencia en Laravel y PHP') 
            ->attach('curriculum', base_path('tests/Browser/files/dummy.pdf')) 
            ->press('Registrarme') 
            ->assertSee('El nombre es obligatorio'); }); }

    public function test_last_name_is_required() {
        $user = User::factory()->create(['role' => 'pending', 'completed' => false]); 
        $this->browse(function (Browser $browser) use ($user) { 
            $browser->loginAs($user) 
            ->visit(route('register.professional.form', ['user' => $user->id])) 
            ->type('document', '123456789')
            ->type('name', 'Juan') 
            ->type('address', 'Calle 123') 
            ->type('birth_date', '1990-01-01') 
            ->type('age', '33') 
            ->type('experience', '5') 
            ->type('academic_education', 'Ingeniería de Sistemas') 
            ->select('gender', 'M') 
            ->select('service_type', 'software') 
            ->type('description', 'Soy desarrollador con experiencia en Laravel y PHP') 
            ->attach('curriculum', base_path('tests/Browser/files/dummy.pdf')) 
            ->press('Registrarme') 
            ->assertSee('El apellido es obligatorio'); 
        });
    }

   
}