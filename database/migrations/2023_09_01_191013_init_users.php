<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Output\ConsoleOutput;
use Tymon\JWTAuth\Exceptions\JWTException;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $output = new ConsoleOutput();

        try {
            // Create a new user (if not already created)
            $services = new User([
                'name' => 'Service User',
                'email' => 'services@raaajrathod.com',
                'password' => Hash::make('aJE?lebza?b7zZR!3mZUK?g!0YnCzl?D1QL1zmNX'),
            ]);
            $services->save();

            $credentials = [
                'email' => 'services@raaajrathod.com',
                'password' => 'aJE?lebza?b7zZR!3mZUK?g!0YnCzl?D1QL1zmNX', // Note: Do not hash the password here
            ];

            if (!$token = auth('api')->attempt($credentials)) {
                $output->writeln(['<info>Cannot Create JWT Token</info>']);
            }
            $output->writeln(['<info>Service Access Token: ', $token . '</info>']);

        } catch (JWTException $e) {
            // Handle any exceptions that occur during token generation
            $output->writeln(['<info>Error While creating token</info>']);
        }



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
