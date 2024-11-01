<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Manager
        $user = User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@joonik.com',
            'api_key' => 'secret',
        ]);

        $token = $user->tokens()->create([
            'name' => 'default',
            'token' =>'secret',
            'abilities' => ['*'],
        ]);

        $locations = collect([
            [
                'name' => 'Bogotá',
                'image' => 'https://plus.unsplash.com/premium_photo-1697729999190-4cd4ae78be26?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Ym9nb3RhfGVufDB8fDB8fHww'
            ],
            [
                'name' => 'Medellín',
                'image' => 'https://images.ctfassets.net/cfexf643femz/6GVjMgemv42lpFbXFEMN6F/628157e1f08efeab4317e96d91d779cb/Fotos_La_haus__19___1_.jpg'
            ],
            [
                'name' => 'Cartagena',
                'image' => 'https://ca-times.brightspotcdn.com/dims4/default/b62e116/2147483647/strip/true/crop/1515x1000+0+0/resize/1200x792!/quality/75/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2Fec%2F48%2F75fb9d684e1b9673520e911a8a3c%2Fun-destino-para-gozar-958578.JPG'
            ],
            [
                'name' => 'Cali',
                'image' => 'https://periodicoamarilloworld.com/wp-content/uploads/2023/03/turismo-cali.jpg'
            ],
            [
                'name' => 'Barranquilla',
                'image' => 'https://drips.com.co/wp-content/uploads/2024/01/lugares-para-visitar-en-Barranquilla.jpg'
            ],
            [
                'name' => 'Santa Marta',
                'image' => 'https://images.ctfassets.net/cfexf643femz/TlBxtouo2oCvAPXA0UrzP/b24a76585074bf7e7f67b64bd8c060aa/lugares-turisticos-santa-marta-colombia.jpg'
            ],
            [
                'name' => 'San Andrés',
                'image' => 'https://cdn.colombia.com/images/v2/turismo/sitios-turisticos/san-andres/Archipielago-de-San-Andres-Providencia-y-Santa-Catalina-Colombia-800.jpg'
            ],
            [
                'name' => 'Villa de Leyva',
                'image' => 'https://vivex.com.co/wp-content/uploads/2020/07/Qu%C3%A9-hacer-en-Villa-de-Leyva.jpg'
            ],
            [
                'name' => 'Popayán',
                'image' => 'https://cdn.colombia.com/images/v2/turismo/sitios-turisticos/popayan/ciudad-blanca-en-popayan-800.jpg'
            ],
            [
                'name' => 'Bucaramanga',
                'image' => 'https://santandercompetitivo.org/imagenes/vco_noticias/noti_6f169efdbad3e83f60fece917ca78e9dfe0ed2a2.jpg'
            ]
        ])->map(fn($location) => Location::create([...$location, 'user_id' => $user->getKey()]));

    }
}
