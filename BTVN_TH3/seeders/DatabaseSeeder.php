<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            LibrariesTableSeeder::class,
            BooksTableSeeder::class,
            RentersTableSeeder::class,
            LaptopsTableSeeder::class,
            ITCentersTableSeeder::class,
            HardwareDevicesTableSeeder::class,
            CinemasTableSeeder::class,
            MoviesTableSeeder::class,
            MedicinesTableSeeder::class,
            SalesTableSeeder::class,
            ClassesTableSeeder::class,
            StudentsTableSeeder::class,
            ComputersTableSeeder::class,
            IssuesTableSeeder::class,
        ]);
    }
}
