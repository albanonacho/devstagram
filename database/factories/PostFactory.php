<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(80),
            'imagen' => $this->faker->randomElement([
                '0a0c0828-54f7-4065-ba9a-c8fd0848d5a0.jpg',
                '2d8d3f6e-536c-4331-9dc5-73c2d82b1ae7.png',
                '2d579ded-31f1-44a3-8fb7-544d01fff7a9.jpg',
                '9a92a44b-b787-4d73-adf5-d14d443c18c5.png',
                '10f5bc44-7ce2-406d-9b52-0c184e3cba50.png',
                '34c18be2-4306-4ae8-80e5-17db3dbe6112.png',
                '37f9c31f-d310-4522-ad3d-c24905f395cb.png',
                '089b884b-a975-4aa8-8fca-ff8f94fb7df4.png',
                '122d9287-0664-4b92-90be-bc75dbae6d38.png',
                '46503997-7ed4-4ddd-aaed-57ec7287dc4c.png',
                'a10c8247-bd9a-4502-ad1f-c105f9606f85.png',
                'afff8fe0-eed2-449c-84cd-5a00eaa4a591.png',
                'b760be84-1a26-40d9-a94e-dae1cd39cb4b.png',
                'bdc5eb8b-8c11-4d9b-ae28-8a0fd1a0a82f.jpg',
                'dd6a6a3a-2ca9-405d-9d69-5a571a57263f.png',
            ]),
            'user_id' => $this->faker->randomElement([1,2,3,4])
        ];
    }
}
