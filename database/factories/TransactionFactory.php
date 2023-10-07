<?php

namespace Database\Factories;

use App\Models\Pawn;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer = User::where('role', 'customer')->get()->random()->national_id;
        $creator = User::all()->random()->national_id;
        $pawn = Pawn::all()->random()->id;

        return [
            'customer_id' => $customer,
            'created_by' => $creator,
            'amount' => fake()->randomFloat(2, 0, 1000000),
            'type' => fake()->randomElement(['onlineInstallment', 'offlineInstallment', 'ownerTransaction', 'employeeWithdraw']),
            'status' => fake()->randomElement(['inprogress', 'completed', 'rejected']),
            'description' => fake()->sentence(),
            'pawn_id' => $pawn,
            'term' => fake()->numberBetween()
        ];
    }
}