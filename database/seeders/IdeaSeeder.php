<?php

namespace Database\Seeders;

use App\Models\Idea;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    public function run(): void
    {

        Idea::create([
            'titulo' => 'Aplicación para organizar citas veterinarias',
            'descripcion' => 'Sistema para registrar y organizar citas de mascotas.',
            'estado' => 'registrada',
            'autor' => 'Jose',
            'categoria_id' => 1
        ]);

        Idea::create([
            'titulo' => 'Sistema de gestión de inventario para pymes',
            'descripcion' => 'Plataforma en la nube para control de stock en pequeños negocios.',
            'estado' => 'aprobada',
            'autor' => 'Ana',
            'categoria_id' => 1
        ]);

        Idea::create([
            'titulo' => 'Bot de Telegram para recordatorios de tareas',
            'descripcion' => 'Asistente virtual automatizado para estudiantes de la FCA.',
            'estado' => 'rechazada',
            'autor' => 'Luis',
            'observacion' => 'Falta definir la viabilidad y alcance técnico del proyecto.',
            'categoria_id' => 1
        ]);

        Idea::create([
            'titulo' => 'Plataforma para cursos en linea',
            'descripcion' => 'Sistema para ofrecer cursos y materiales educativos.',
            'estado' => 'en revisión',
            'autor' => 'Pedro',
            'categoria_id' => 2
        ]);

        Idea::create([
            'titulo' => 'App de flashcards interactivas para idiomas',
            'descripcion' => 'Aplicación móvil para memorizar vocabulario rápidamente.',
            'estado' => 'aprobada',
            'autor' => 'Maria',
            'categoria_id' => 2
        ]);

        Idea::create([
            'titulo' => 'Portal de salud mental para estudiantes',
            'descripcion' => 'Sitio web con recursos y contactos de apoyo psicológico.',
            'estado' => 'registrada',
            'autor' => 'Carlos',
            'categoria_id' => 3
        ]);

        Idea::create([
            'titulo' => 'App de seguimiento de nutrición y macros',
            'descripcion' => 'Registro diario de alimentos y cálculo calórico.',
            'estado' => 'en revisión',
            'autor' => 'Sofia',
            'categoria_id' => 3
        ]);

        Idea::create([
            'titulo' => 'Mapa interactivo de puntos de reciclaje',
            'descripcion' => 'Aplicación para localizar los centros de acopio más cercanos.',
            'estado' => 'aprobada',
            'autor' => 'Elena',
            'categoria_id' => 4
        ]);

        Idea::create([
            'titulo' => 'App para compartir coche a la universidad',
            'descripcion' => 'Plataforma de carpooling exclusivo para universitarios.',
            'estado' => 'rechazada',
            'autor' => 'Fernando',
            'observacion' => 'Existen riesgos potenciales de seguridad para los usuarios.',
            'categoria_id' => 4
        ]);

        Idea::create([
            'titulo' => 'Torneo de fútbol interuniversitario en la FCA',
            'descripcion' => 'Organización de un torneo deportivo para integrar a la comunidad.',
            'estado' => 'registrada',
            'autor' => 'Gabriela',
            'categoria_id' => 5
        ]);

        Idea::create([
            'titulo' => 'App para reservar canchas deportivas en el campus',
            'descripcion' => 'Sistema automatizado para gestionar los horarios de las instalaciones.',
            'estado' => 'aprobada',
            'autor' => 'Diego',
            'categoria_id' => 5
        ]);
    }
}