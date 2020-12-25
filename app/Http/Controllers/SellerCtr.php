<?php

// import namespace
namespace App\Http\Controllers;
// import lib
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
// import model
use App\Models\BranchSellerMdl;
use App\Models\ProvinsiMdl;
use App\Models\KabupatenMdl;
use App\Models\KecamatanMdl;
use App\Models\KelurahanMdl;

class SellerCtr extends Controller
{

    public function sellerdashboard()
    {
        
        return view('account.seller.dashboard');
    }

    public function sellerbranch(Request $request)
    {
        $userLogin = $request -> session() -> get('userLogin');
        $branch = BranchSellerMdl::where('id_seller', $userLogin) -> get();
        $countrySupport = DB::table('tbl_country_support') -> get();
        $dr = ['dataBranch' => $branch, 'countrySupport' => $countrySupport];
        return view('account.seller.branch.branch', $dr);
    }

    public function applynewbranch(Request $request)
    {
        $kdBranch = Str::upper(Str::random(10));
        $nameBranch = $request -> nameBranch;

        $emailBranch = $request -> emailBranch;
        $phoneBranch = $request -> phoneBranch;
        $country = $request -> country;
        $provinsi = $request -> provinsi;
        $kabupaten = $request -> kabupaten;
        $kecamatan = $request -> kecamatan;
        $kelurahan = $request -> kelurahan;
        $userLogin = $request -> session() -> get('userLogin');
        $now = now();
        // cek apakah nama branch sudah ada 
        $cekNamaBranch = DB::table('tbl_branch_seller') -> where('nama_branch', $nameBranch) -> count();
        if($cekNamaBranch < 1){
            $dr = ['status' => 'success'];
            DB::table('tbl_branch_seller') -> insert([
                'kd_branch' => $kdBranch,
                'nama_branch' => $nameBranch,
                'id_seller' => $userLogin,
                'alamat' => $kelurahan."-".$kecamatan."-".$kabupaten."-".$provinsi,
                'phone' => $phoneBranch,
                'email' => $emailBranch,
                'status_branch' => 'disable',
                'active' => '1'
            ]);
        }else{
            $dr = ['status' => 'name_duplicate'];     
        }
        return \Response::json($dr);
    }

    public function detailbranch($idBranch)
    {
        $userLogin = session('userLogin');
        $dataBranch = BranchSellerMdl::where('kd_branch', $idBranch) -> first();
        // cari alamat branch 
        $alamat = $dataBranch -> alamat;
        $exAlamat = explode("-", $alamat);
        $idKel = $exAlamat[0];
        $idKec = $exAlamat[1];
        $idKab = $exAlamat[2];
        // cari nama kelurahan 
        $dataKel = KelurahanMdl::where('id_kel', $idKel) -> first();
        $namaKel = $dataKel -> nama;
        //cari nama kecamatan 
        $dataKec = KecamatanMdl::where('id_kec', $idKec) -> first();
        $namaKec = $dataKec -> nama;
        $cssBtn = 'border:0px solid white;color:#fff;';
        $dr = ['idBranch' => $idBranch, 'userLogin' => $userLogin, 'dataBranch' => $dataBranch, 'cssBtn' => $cssBtn, 'namaKel' => $namaKel, 'namaKec' => $namaKec];
        return view('account.seller.branch.branch_detail', $dr);
    }

    
    

    public function getdatakelurahanformarker($idKel)
    {
        $dataKel = KelurahanMdl::where('id_kel', $idKel) -> first();
        $namaKel = $dataKel -> nama;
        $idKec = $dataKel -> id_kec;
        $dataKec = KecamatanMdl::where('id_kec', $idKec) -> first();
        $namaKec = $dataKec -> nama;
        $dr = ['namaKel' => $namaKel, 'namaKec' => $namaKec];
        return \Response::json($dr);
    }

    public function savecoveragearea(Request $request)
    {
        // {'idKel':idKel, 'idBranch':idBranch}
        $idKel = $request -> idKel;
        $idBranch = $request -> idBranch;
        $kdCoverage = Str::random(10);
        DB::table('tbl_coverage_area') -> insert([
            'kd_coverage' => $kdCoverage,
            'kd_branch' => $idBranch,
            'kd_area' => $idKel
        ]);
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

}
