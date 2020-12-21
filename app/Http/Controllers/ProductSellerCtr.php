<?php

// import namespace
namespace App\Http\Controllers;
// import lib
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
// import model
use App\Models\BranchSellerMdl;
use App\Models\ProdukMdl;
use App\Models\KategoriMdl;
use App\Models\VarianProductMdl;

class ProductSellerCtr extends Controller
{
    public function productlist(Request $request)
    {
        $userLogin = $request -> session() -> get('userLogin');
        $kategoriProduct = KategoriMdl::all();
        $dataBranch = BranchSellerMdl::where('id_seller', $userLogin) -> where('status_branch', 'active') -> get();
        $dataProduct = ProdukMdl::where('id_seller', $userLogin) -> get();
        $divInvalid = 'form-text text-warning';
        $dn = 'display:none;';
        $dr = ['dataProduct' => $dataProduct, 'kategoriProduct' => $kategoriProduct, 'dataBranch' => $dataBranch, 'divError' => $divInvalid, 'dn' => $dn];
        return view('account.seller.product.product_list', $dr);
    }

    public function addproductproses(Request $request)
    {
        // 'var1':var1, 'var2':var2, 'var3':var3, 'var4':var4
        $userLogin = $request -> session() -> get('userLogin');
        $kdProduk = "EBUNGA".rand(1000,10000);
        $name = $request -> name;
        $deks = $request -> deks;
        $kategori = $request -> kategori;
        $subKategori = $request -> subKategori;
        $branch = $request -> branch;
        $price = $request -> price;
        $stock = $request -> stock;
        $picUtama = $request -> picUtama;
        $picVar1 = $request -> var1;
        $picVar2 = $request -> var2;
        $picVar3 = $request -> var3;
        $picVar4 = $request -> var4;
        // clear currency format 
        $priceFinal = str_replace(".","",$price);
        $namaPic = $kdProduk.".jpg";
        
        $cekNamaBunga = ProdukMdl::where('nama_produk', $name) -> count();

        if($cekNamaBunga < 1){
            DB::table('tbl_produk') -> insert ([
                'kd_produk' => $kdProduk,
                'nama_produk' => $name,
                'slug' => Str::kebab($name),
                'deks_produk' => $deks,
                'kategori' => $kategori,
                'sub_kategori' => $subKategori,
                'id_branch' => $branch,
                'id_seller' => $userLogin,
                'harga' => $priceFinal,
                'stok' => $stock,
                'foto_utama' => $namaPic,
                'active' => '1'
            ]); 
            
            // Foto utama 
            $image_array_1 = explode(";", $picUtama);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            file_put_contents('ladun/ebunga_asset/image/product/'.$namaPic, $data);
            // Variant 1
            if($picVar1 == null){

            }else{
                $imgVaArr1 = explode(";", $picVar1);
                $imgData1 = explode(",", $imgVaArr1[1]);
                $data_var1 = base64_decode($imgData1[1]);
                $namaVariantPic1 = $kdProduk."_VAR1.jpg";
                file_put_contents('ladun/ebunga_asset/image/product/variant/'.$namaVariantPic1, $data_var1);
                DB::table('tbl_variant_product') -> insert([
                    'kd_variant' => Str::upper(Str::random(3)."-".Str::random(3)."-".Str::random(3)."-".Str::random(5)),
                    'kd_product' => $kdProduk,
                    'nama_variant' => '1',
                    'deks_variant' => 'Variant produk 1',
                    'active' => '1'
                ]);
            }
            // Variant 2 
            if($picVar2 == null){

            }else{
                $imgVaArr2 = explode(";", $picVar2);
                $imgData2 = explode(",", $imgVaArr2[1]);
                $data_var2 = base64_decode($imgData2[1]);
                $namaVariantPic2 = $kdProduk."_VAR2.jpg";
                file_put_contents('ladun/ebunga_asset/image/product/variant/'.$namaVariantPic2, $data_var2);
                DB::table('tbl_variant_product') -> insert([
                    'kd_variant' => Str::upper(Str::random(3)."-".Str::random(3)."-".Str::random(3)."-".Str::random(5)),
                    'kd_product' => $kdProduk,
                    'nama_variant' => '2',
                    'deks_variant' => 'Variant produk 2',
                    'active' => '1'
                ]);
            }
            // Variant 3 
            if($picVar3 == null){

            }else{
                $imgVaArr3 = explode(";", $picVar3);
                $imgData3 = explode(",", $imgVaArr3[1]);
                $data_var3 = base64_decode($imgData3[1]);
                $namaVariantPic3 = $kdProduk."_VAR3.jpg";
                file_put_contents('ladun/ebunga_asset/image/product/variant/'.$namaVariantPic3, $data_var3);
                DB::table('tbl_variant_product') -> insert([
                    'kd_variant' => Str::upper(Str::random(3)."-".Str::random(3)."-".Str::random(3)."-".Str::random(5)),
                    'kd_product' => $kdProduk,
                    'nama_variant' => '3',
                    'deks_variant' => 'Variant produk 3',
                    'active' => '1'
                ]);
            }
            // Variant 4
            if($picVar4 == null){

            }else{
                $imgVaArr4 = explode(";", $picVar4);
                $imgData4 = explode(",", $imgVaArr4[1]);
                $data_var4 = base64_decode($imgData4[1]);
                $namaVariantPic4 = $kdProduk."_VAR4.jpg";
                file_put_contents('ladun/ebunga_asset/image/product/variant/'.$namaVariantPic4, $data_var4);
                DB::table('tbl_variant_product') -> insert([
                    'kd_variant' => Str::upper(Str::random(3)."-".Str::random(3)."-".Str::random(3)."-".Str::random(5)),
                    'kd_product' => $kdProduk,
                    'nama_variant' => '4',
                    'deks_variant' => 'Variant produk 4',
                    'active' => '1'
                ]);
            }

            $dr = ['status' => 'success'];
        }else{
            $dr = ['status' => 'error_name_product'];
        }
    //    $dr = ['status' => $picVar1];
        return \Response::json($dr);
    }
}
