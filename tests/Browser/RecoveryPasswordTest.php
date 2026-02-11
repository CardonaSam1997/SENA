<?php
namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;

class RecoveryPasswordTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_request_password_reset_link(){
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('OldPassword123'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('password.request'))
                ->type('email', $user->email)
                ->press('Enviar enlace de recuperación')
                ->pause(1000)->screenshot('password_reset_link_sent')
                ->assertSee('Te enviamos un enlace para recuperar tu contraseña');
        });
    }


   public function test_user_can_reset_password()
{
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('OldPassword123'),
    ]);

    $token = \Illuminate\Support\Facades\Password::createToken($user);

    $this->browse(function (Browser $browser) use ($user, $token) {
        $browser->visit(route('password.reset', ['token' => $token]))
            ->type('email', $user->email)
            ->type('password', 'NewPassword123')
            ->type('password_confirmation', 'NewPassword123')
            ->screenshot('password_reset_form_filled')
            ->press('Restablecer contraseña')
            ->screenshot('password_reset_form_submitted')
            ->pause(1000)
            // Paso 1: verificar que el mensaje aparece en la vista de reset
            ->assertSee('La contraseña ha sido actualizada')
            // Paso 2: esperar la redirección automática al login
            ->pause(3000)
            ->assertPathIs('/login');
    });
}


}