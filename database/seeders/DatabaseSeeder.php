<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(commentSeeder::class);
        $this->call(userSeeder::class);
        $this->call(theLoaiSeeder::class);
        $this->call(loaiTinSeeder::class);
        $this->call(tinTucSeeder::class);
    }
}

class userSeeder extends Seeder{
    public function run(){
        DB::table('users')->insert([
            ['name'=>'Tu', 'email'=>'levantu.nd1997@gmail.com', 'level'=>1, 'password'=>md5('123456')],
            ['name'=>'VuVu', 'email'=>'vuvu@gmail.com', 'level'=>1, 'password'=>md5('123456')],
            ['name'=>'VuTu', 'email'=>'vutu@gmail.com', 'level'=>1, 'password'=>md5('123456')]
        ]);
    }
}
class theLoaiSeeder extends Seeder{
    public function run(){
        DB::table('theloai')->insert([
            ['name'=>'Tin Mới', 'name_unsigned'=>'tin-moi'],
            ['name'=>'Tin Trong Nước', 'name_unsigned'=>'tin-trong-nuoc'],
            ['name'=>'Tin Thể Thao', 'name_unsigned'=>'tin-the-thao'],
            ['name'=>'Tin Công Nghệ', 'name_unsigned'=>'tin-cong-nghe'],
            ['name'=>'Tin Tài Chính', 'name_unsigned'=>'tin-tai-chinh']
        ]);
    }
}

class loaiTinSeeder extends Seeder{
    public function run(){
        DB::table('loaitin')->insert([
            ['name'=>'Tin 24h', 'id_theloai'=>1, 'name_unsigned'=>'tin-24h'],
            ['name'=>'Chào Ngày Mới', 'id_theloai'=>1, 'name_unsigned'=>'chao-ngay-moi'],
            ['name'=>'V-leauge', 'id_theloai'=>3, 'name_unsigned'=>'v-leauge'],
            ['name'=>'Woldcup', 'id_theloai'=>3, 'name_unsigned'=>'woldcup'],
            ['name'=>'Copa America', 'id_theloai'=>3, 'name_unsigned'=>'copa-america']
        ]);
    }
}
class tinTucSeeder extends Seeder{
    public function run(){
        DB::table('tintuc')->insert([
            ['title'=>'Trận đấu Giữa Barcalona vs Real Marid', 'title_unsigned'=>'tran-dau-giua-barcalona-vs-real-marid', 'description'=>'Hàm down trong Migrations có tác dụng thực thi đoạn lệnh rollback', 'content'=>'Nếu tạo thành công nó sẽ báo dạng như sau: Created migration: xxxxxxxxxxxx: Lúc này bạn có thể kiểm tra lại bằng cách truy cập', 'image'=>'image.png', 'features'=>1, 'views'=>150, 'id_loaitin'=>5],
            ['title'=>'Nam Định vs Hà Nội FC', 'title_unsigned'=>'nam-dinh-vs-ha-noi-fc', 'description'=>'Hàm down trong Migrations có tác dụng thực thi đoạn lệnh rollback', 'content'=>'Nếu tạo thành công nó sẽ báo dạng như sau: Created migration: xxxxxxxxxxxx: Lúc này bạn có thể kiểm tra lại bằng cách truy cập', 'image'=>'image.png', 'features'=>1, 'views'=>150, 'id_loaitin'=>3],
        ]);
    }
}
class commentSeeder extends Seeder{
    public function run(){
        DB::table('comment')->insert([
            ['id_user'=>1, 'id_tintuc'=>2, 'content'=>'Hay quá trời ơi']
        ]);
    }
}
