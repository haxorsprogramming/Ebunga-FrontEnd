<?php
/**
 * @license MIT, http://opensource.org/licenses/MIT
 * @copyright Ebunga (ebunga.co.id), 2020
 * @package laravel
 * @subpackage Controller
 */

/**
 * Import namespace & library
 */
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
/**
 * Import model
 */
use App\Models\ProvinsiMdl;
use App\Models\KabupatenMdl;
use App\Models\KecamatanMdl;
use App\Models\KelurahanMdl;

/**
 * Import another controller
 */

class DaerahCtr extends Controller
{

    public function getProvinsiAll()
    {
        /**
         * Get data provinsi with model
         */
        $provinsi = ProvinsiMdl::all();
        /**
         * Add data provinsi to variabel
         */
        $dr = ['provinsi' => $provinsi];
        /**
         * Return response json format
         */
        return \Response::json($dr);
    }

    public function getProvinsiPost(Request $request)
    {
        $slug = $request -> searchTerm;
        $provinsi = ProvinsiMdl::where('nama', 'like', '%'.$slug.'%') -> get();
        $data = array();
        foreach($provinsi as $provinsi){
            $data[] = array("id" => $provinsi['id_prov'], "text" => $provinsi['nama']);
        }
        echo json_encode($data);
    }

    public function getKabupaten($id_provinsi)
    {
        $kabupaten = KabupatenMdl::where('id_prov', $id_provinsi) -> get();
        $dr = ['kabupaten' => $kabupaten];
        return \Response::json($dr);
    }

    public function getKecamatan($id_kabupaten)
    {
        $kecamatan = KecamatanMdl::where('id_kab', $id_kabupaten) -> get();
        $dr = ['kecamatan' => $kecamatan];
        return \Response::json($dr);
    }

    public function getKelurahan($id_kecamatan)
    {
        $kelurahan = KelurahanMdl::where('id_kec', $id_kecamatan) -> get();
        $dr = ['kelurahan' => $kelurahan];
        return \Response::json($dr);
    }
    
}
