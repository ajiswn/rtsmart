<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtikelTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('artikels')->insert([
            [
                'judul'         => 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia',
                'gambar'        => 'gambar-artikel\blog-1.jpg',
                'kategori'      => 'Sosial',
                'tanggal'       => Carbon::now()->format('d F Y'),
                'konten'        => 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'judul'         => 'Nisi magni odit consequatur autem nulla dolorem',
                'gambar'        => 'gambar-artikel\blog-2.jpg',
                'kategori'      => 'Keagamaan',
                'tanggal'       => Carbon::now()->format('d F Y'),
                'konten'        => 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'judul'         => 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint',
                'gambar'        => 'gambar-artikel\blog-3.jpg',
                'kategori'      => 'Olahraga',
                'tanggal'       => Carbon::now()->format('d F Y'),
                'konten'        => 'Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis. Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'judul'         => 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem',
                'gambar'        => 'gambar-artikel\blog-4.jpg',
                'kategori'      => 'Lingkungan',
                'tanggal'       => Carbon::now()->format('d F Y'),
                'konten'        => 'Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'judul'         => 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem',
                'gambar'        => 'gambar-artikel\blog-4.jpg',
                'kategori'      => 'Pendidikan',
                'tanggal'       => Carbon::now()->format('d F Y'),
                'konten'        => 'Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
