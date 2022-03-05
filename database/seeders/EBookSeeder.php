<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('e_books')->insert([
            [
                'title' => 'Rich Dad Poor Dad',
                'author'=> 'Robert Kiyosaki',
                'description' => 'Rich Dad Poor Dad adalah buku tahun 1997 karya Robert Kiyosaki dan Sharon Lechter. Rich Dad, Poor Dad adalah buku yang membahas masalah finansial yang dihadapi banyak orang dikarenakan ajaran keliru orang tua mereka mengenai keuangan, yang juga dialaminya semasa kecil dan remaja.'
            ],
            [
                'title' => 'Crazy Rich Asians',
                'author'=> 'Kevin Kwan',
                'description' => 'Crazy Rich Asians is the outrageously funny debut novel about three super-rich, pedigreed Chinese families and the gossip, backbiting, and scheming that occurs when the heir to one of the most massive fortunes in Asia brings home his ABC (American-born Chinese) girlfriend to the wedding of the season.'
            ],
            [
                'title' => 'The Devil Wears Prada',
                'author' => 'Lauren Weisberger',
                'description' => 'A delightfully dishy novel about the all-time most impossible boss in the history of impossible bosses.
Andrea Sachs, a small-town girl fresh out of college, lands the job “a million girls would die for.”.'
            ],
            [
                'title' => 'The Subtle Art of Not Giving a Fuck',
                'author' => 'Mark Manson',
                'description' => 'The Subtle Art of Not Giving a Fuck: A Counterintuitive Approach to Living a Good Life (first published in 2016) is the second book by blogger and author Mark Manson.[1] In it, Manson argues that lifes struggles give it meaning, and that the mindless positivity of typical self-help books is neither practical nor helpful. It was a New York Times and Globe and Mail bestseller.'
            ],
            [
                'title' => 'Anak muda miliarder saham',
                'author' => 'Andika Sutoro Putra',
                'description' => 'Apakah Anda sedang mencari panduan step-by-step untuk menjadi full time investor yang sukses? Sudah lama berkecimpung di pasar modal namun belum juga bisa menghasilkan profit yang konsisten? Bagaimana cara membangun passive income dari investasi saham?'
            ],
            [
                'title' => 'Mantappu Jiwa',
                'author' => 'Jerome Polin Sijabat',
                'description' => '“Jadi ini buku latihan soal matematika ya, Jer?”

Bukan!

Kata orang, selama masih hidup, manusia akan terus menghadapi masalah demi masalah. Dan itulah yang akan kuceritakan dalam buku ini, yaitu bagaimana aku menghadapi setiap persoalan di dalam hidupku. Dimulai dari aku yang lahir dekat dengan hari meletusnya kerusuhan di tahun 1998, bagaimana keluargaku berusaha menyekolahkanku dengan kondisi ekonomi yang terbatas, sampai pada akhirnya aku berhasil mendapatkan beasiswa penuh S1 di Jepang.

Manusia tidak akan pernah lepas dari masalah kehidupan, betul. Tapi buku ini tidak hanya berisi cerita sedih dan keluhan ini-itu. Ini adalah catatan perjuanganku sebagai Jerome Polin Sijabat, pelajar Indonesia di Jepang yang iseng memulai petualangan di YouTube lewat channel Nihongo Mantappu.

Yuk, naik roller coaster di kehidupanku yang penuh dengan kalkulasi seperti matematika.

It may not gonna be super fun, but I promise it would worth the ride.

Minasan, let’s go, MANTAPPU JIWA!'
            ],
            [
                'title' => 'Lagi Probation : Menikmati Perjalanan Mencari Kerja',
                'author' => 'Samuel Ray',
                'description' => 'Mencari kerja adalah proses yang dihadapi semua orang dalam perjalanan kariernya. Namun, sering kali ada kebingungan dan ketidakpastian yang muncul. Mulai dari informasi yang nggak lengkap mengenai lowongan kerja, HRD yang susah dihubungi, sampai nego gaji yang alot.'
            ],
        ]);
    }
}
