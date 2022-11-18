<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Etudiant;


use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' =>$this->faker->realText(80),
            'texte'=>$this->faker->text(),
            'titre_en'=>$this->faker->realText(80),
            'texte_en'=>$this->faker->text(),
            'etudiants_id'=>Etudiant::all()->random()->id, 
            'etudiants_users_id'=> User::all()->random()->id 
        ];
    }
}
