<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $str = "0123456789"; 
        $aplt = str_split($str); 
        return [
            'nim',
            'nama' => $this->faker->name,
            'jurusan',
            'email',
            'kelas_id',
        ];
    }
}
