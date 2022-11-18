<?php

namespace Database\Factories;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'phone' => $this->faker->e164PhoneNumber(),
            'about' => $this->faker->realText(500),
            'image' => $this->randomImage(100, 65),
        ];
    }

    private function randomImage(int $width = 600, int $height = 400): string
    {
        $url = sprintf(
            "https://dummyimage.com/%sx%s/000/fff&text=%s",
            $width,
            $height,
            $this->faker->word()
        );

        $path = sprintf(storage_path('app/public/%s.png'), uniqid());

        file_put_contents($path, file_get_contents($url));

        $imagePath = Storage::putFile('public', new File($path));

        unlink($path);

        return $imagePath;
    }
}
