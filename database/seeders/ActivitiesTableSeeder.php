<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActivitiesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('activities')->insert([
            [
                'title'         => 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia',
                'image'         => 'img\activities\blog-1.jpg',
                'category'      => 'Sosial',
                'date'          => Carbon::now()->format('d F Y'),
                'content'       => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'title'         => 'Nisi magni odit consequatur autem nulla dolorem',
                'image'         => 'img\activities\blog-2.jpg',
                'category'      => 'Keagamaan',
                'date'          => Carbon::now()->format('d F Y'),
                'content'       => 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'title'         => 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint',
                'image'         => 'img\activities\blog-3.jpg',
                'category'      => 'Olahraga',
                'date'          => Carbon::now()->format('d F Y'),
                'content'       => 'Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis. Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'title'         => 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem',
                'image'         => 'img\activities\blog-4.jpg',
                'category'      => 'Lingkungan',
                'date'          => Carbon::now()->format('d F Y'),
                'content'       => 'Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'title'         => 'Id impedit nostrum adipisci sed, maiores quos sunt quisquam nihil nam delectus qui accusamus',
                'image'         => 'img\activities\blog-5.jpeg',
                'category'      => 'Pendidikan',
                'date'          => Carbon::now()->format('d F Y'),
                'content'       => 'Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
