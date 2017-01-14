<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(AdminUserTableSeeder::class);
        $this->call(ArticleCategoriesTableSeeder::class);
        $this->call(LabelCategoriesTableSeeder::class);
        $this->call(ForumSectionTableSeeder::class);
        $this->call(ForumSubSectionTableSeeder::class);
        $this->call(IndexTableSeeder::class);
        $this->call(DiseaseStageSeeder::class);
        $this->call(GenicMutationTableSeeder::class);
        $this->call(MetastaticLesionTableSeeder::class);
        $this->call(PathologicTypeTableSeeder::class);
        $this->call(TestMethodTableSeeder::class);
    }
}
