<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = [
            [
                'name' => 'Curso de Laravel 11 - Completo e Gratuito',
                'description' => 'Descrição do curso de Laravel 11',
            ],
            [
                'name' => 'Curso Testando uma API Restful com Pest PHP',
                'description' => 'Descrição do curso de Pest PHP',
            ],
            [
                'name' => 'Curso de Laravel API com ACL (controle de acessos - permissões)',
                'description' => 'Descrição do curso de Laravel API com ACL',
            ],
            [
                'name' => 'Curso de Serverless',
                'description' => 'Descrição do curso de Serverless',
            ],
            [
                'name' => 'Curso de Terraform',
                'description' => 'Descrição do curso de Terraform',
            ],
            [
                'name' => 'Curso de NestJS: criando uma API Restful',
                'description' => 'Descrição do curso de NestJS',
            ],
            [
                'name' => 'Curso AWS EC2 - Escalabilidade e Alta Disponibilidade',
                'description' => 'Descrição do curso de AWS EC2',
            ],
            [
                'name' => 'Curso de TypeScript: Testes com Jest e Curso TypeScript no Back-end (API NodeJS + TypeORM + PostgreSQL)',
                'description' => 'Descrição do curso de TypeScript',
            ],
        ];

        Course::insert($cursos);
    }
}
