<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    

    public function definition()
    {
        return [
            //Référence : https://github.com/fzaninotto/Faker
            'nom' => $this->faker->name, 
            'adresse' => $this->faker->address, 
            'phone' => $this->faker->tollFreePhoneNumber, 
            'email' => $this->faker->email, 
            'dateDeNaissance' => $this->faker->date($format = 'Y-m-d', $max = '2005-01-01', $min= '1962-01-01'),
            'villeId' => Ville::all()->random()->id 
        ];
    }
}
