<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Kategori produk
        DB::table('tbl_kategori_produk') -> insert([
            'kd_kategori' => 'BUNGA',
            'nama_kategori' => 'Bunga',
            'deksripsi' => 'Kategori bunga',
            'active' => '1'
        ]);
        DB::table('tbl_kategori_produk') -> insert([
            'kd_kategori' => 'PAPANBUNGA',
            'nama_kategori' => 'Papan Bunga',
            'deksripsi' => 'Kategori papan bunga',
            'active' => '1'
        ]);
        DB::table('tbl_kategori_produk') -> insert([
            'kd_kategori' => 'PARCEL',
            'nama_kategori' => 'Parcel',
            'deksripsi' => 'Kategori parcel',
            'active' => '1'
        ]);
        DB::table('tbl_kategori_produk') -> insert([
            'kd_kategori' => 'CAKE',
            'nama_kategori' => 'Cake',
            'deksripsi' => 'Kategori cake',
            'active' => '1'
        ]);
        // Sub kategori 
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PAPANBUNGAKONV1SIDE',
            'nama_kategori' => 'Papan Bunga Konvensional 1 side', 
            'kd_kategori' => 'PAPANBUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PAPANBUNGAKONV2SIDE',
            'nama_kategori' => 'Papan Bunga Konvensional 2 side', 
            'kd_kategori' => 'PAPANBUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PAPANBUNGADIGMINI',
            'nama_kategori' => 'Papan Bunga Digital Mini', 
            'kd_kategori' => 'PAPANBUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PAPANBUNGADIGBESAR',
            'nama_kategori' => 'Papan Bunga Digital Besar', 
            'kd_kategori' => 'PAPANBUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'BUNGABUKETSEGAR',
            'nama_kategori' => 'Bunga Buket Segar', 
            'kd_kategori' => 'BUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'BUNGAMEJABERDIRI',
            'nama_kategori' => 'Bunga Meja Berdiri', 
            'kd_kategori' => 'BUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'BUNGABERDIRISEGAR',
            'nama_kategori' => 'Bunga Berdiri Segar', 
            'kd_kategori' => 'BUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'BUNGABUKETART',
            'nama_kategori' => 'Bunga Buket Artificial', 
            'kd_kategori' => 'BUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'BUNGAMEJAART',
            'nama_kategori' => 'Bunga Meja Artificial', 
            'kd_kategori' => 'BUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'BUNGABERDIRIART',
            'nama_kategori' => 'Bunga Berdiri Artificial', 
            'kd_kategori' => 'BUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'BUNGABUKETKOMBINASI',
            'nama_kategori' => 'Bunga Buket Kombinasi', 
            'kd_kategori' => 'BUNGA',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'KUEULANGTAHUN',
            'nama_kategori' => 'Kue Ulang Tahun', 
            'kd_kategori' => 'CAKE',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'KUEACARA',
            'nama_kategori' => 'Kue Acara Perayaan', 
            'kd_kategori' => 'CAKE',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'KUEMANGKOK',
            'nama_kategori' => 'Kue Mangkok', 
            'kd_kategori' => 'CAKE',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'KUEKERING',
            'nama_kategori' => 'Kue Kering', 
            'kd_kategori' => 'CAKE',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELSEMBAKO',
            'nama_kategori' => 'Parcel Sembako', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELPERLENGKAPANBAYI',
            'nama_kategori' => 'Parcel Perlengkapan Bayi', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELKOMBINASI',
            'nama_kategori' => 'Parcel Kombinasi', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELBUAH',
            'nama_kategori' => 'Parcel Buah', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELWADAHPLASTIK',
            'nama_kategori' => 'Parcel Wadah Plastik', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELPECAHBELAH',
            'nama_kategori' => 'Parcel Pecah Belah', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELELEKTRONIK',
            'nama_kategori' => 'Parcel Elekronik', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELMAKANANKESEHATAN',
            'nama_kategori' => 'Parcel Makanan Kesehatan', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELMAKEUP',
            'nama_kategori' => 'Parcel Make Up', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELPERAWATANWAJAH',
            'nama_kategori' => 'Parcel Perawatan Wajah', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        DB::table('tbl_sub_kategori') -> insert([
            'kd_sub_kategori' => 'PARCELPERAWATANKESEHATAN',
            'nama_kategori' => 'Parcel Perawatan Kesehatan', 
            'kd_kategori' => 'PARCEL',
            'active' => '1'
        ]);
        // user 
        DB::table('tbl_user') -> insert([
            'username' => 'admin',
            'tipe' => 'super-admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'active' => '1'
        ]);
        DB::table('tbl_user') -> insert([
            'username' => 'ebunga-seller',
            'tipe' => 'seller',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'active' => '1'
        ]);
        DB::table('tbl_user') -> insert([
            'username' => 'ebunga-buyer',
            'tipe' => 'buyer',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'active' => '1'
        ]);
        // seller 
        DB::table('tbl_seller') -> insert([
            'username' => 'ebunga-seller',
            'full_name' => 'Ebunga Sukses Makmur Seller',
            'email' => 'admin@ebunga.co.id',
            'phone' => '082272177022',
            'country' => 'id',
            'provinsi' => '12',
            'kabupaten' => '1207',
            'kecamatan' => '120726',
            'kelurahan' => '1207262006',
            'alamat' => 'Medan tembung, jln. padang no. 12',
            'postal_code' => '-',
            'ktp' => '-',
            'npwp' => '-',
            'siup' => '-',
            'status' => '-',
            'suspend' => 'n'
        ]);
        // produk
        // DB::table('tbl_produk') -> insert([
        //     'kd_produk' => 'EBUNGA891233',
        //     'nama_produk' => 'Buket bunga & snack sedang',
        //     'deks_produk' => '-',
        //     'kategori' => 'BUNGA',
        //     'sub_kategori' => 'BOUQET',
        //     'id_branch' => 'BRANCH0001',
        //     'id_seller' => 'ebunga-seller',
        //     'harga' => '200000',
        //     'stok' => '10',
        //     'foto_utama' => 'EBUNGA891233.jpg',
        //     'active' => 'y'
        // ]);
        // DB::table('tbl_produk') -> insert([
        //     'kd_produk' => 'EBUNGA891290',
        //     'nama_produk' => 'Papan bunga biasa 2',
        //     'deks_produk' => '-',
        //     'kategori' => 'PAPANBUNGA',
        //     'sub_kategori' => 'PAPANBUNGAKONVENSIONAL',
        //     'id_branch' => 'BRANCH0001',
        //     'id_seller' => 'ebunga-seller',
        //     'harga' => '150000',
        //     'stok' => '10',
        //     'foto_utama' => 'EBUNGA891290.jpg',
        //     'active' => 'y'
        // ]);
        // DB::table('tbl_produk') -> insert([
        //     'kd_produk' => 'EBUNGA78900',
        //     'nama_produk' => 'Papan bunga biasa',
        //     'deks_produk' => '-',
        //     'kategori' => 'PAPANBUNGA',
        //     'sub_kategori' => 'PAPANBUNGAKONVENSIONAL',
        //     'id_branch' => 'BRANCH0001',
        //     'id_seller' => 'ebunga-seller',
        //     'harga' => '150000',
        //     'stok' => '10',
        //     'foto_utama' => 'EBUNGA78900.jpg',
        //     'active' => 'y'
        // ]);
        // branch
        DB::table('tbl_branch_seller') -> insert([
            'kd_branch' => 'BRANCH0001',
            'nama_branch' => 'PT NADHA BUNGA SERASI',
            'id_seller' => 'ebunga-seller',
            'alamat' => '1271181001-127118-1271-12',
            'phone' => '082272177022',
            'email' => 'ebungaseller@yahoo.com',
            'active' => '1',
            'status_branch' => 'active'
        ]);
        // coverage area 
        // DB::table('tbl_coverage_area') -> insert([
        //     'kd_coverage' => 'aqwl1239012jmn',
        //     'kd_branch' => 'BRANCH0001',
        //     'kd_area' => '1101012016'
        // ]);
        // country support 
        DB::table('tbl_country_support') -> insert([
            'kd_country' => 'id',
            'name_country' => 'Indonesia',
            'status' => 'available',
            'active' => '1'
        ]);
        DB::table('tbl_country_support') -> insert([
            'kd_country' => 'my',
            'name_country' => 'Malaysia',
            'status' => 'available',
            'active' => '1'
        ]);
    }
}
