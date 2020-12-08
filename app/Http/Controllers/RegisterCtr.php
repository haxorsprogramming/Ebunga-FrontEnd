<?php
// import namespace 
namespace App\Http\Controllers;
// import lib 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
// import model 
use App\Models\RegistrasiUserMdl;
// import mail 
use App\Mail\RegistrasiMail;

class RegisterCtr extends Controller
{
    public function registerpage()
    {
        $css_file = 'style-about.css';
        $js_file = 'ebunga-register.js';
        $page = 'Register';
        $dr = ['referral_status' => 'no', 'css_file' => $css_file, 'js_file' => $js_file, 'page' => $page];
        return view('register.register', $dr);
    }

    public function registerwithreferral($referral_id)
    {
        $dr = ['referral_status' => 'yes', 'id_referral' => $referral_id];
        return view('register.register', $dr);
    }

    public function registerproses(Request $request)
    {
        // 'email':email, 'password':password, 'fullname':fullname,'phoneNumber':phoneNumber
        $email = $request -> email;
        $password = $request -> password;
        $full_name = $request -> fullname;
        $phone_number = $request -> phoneNumber;
        $referral_code = $request -> referralCode;
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $kd_registrasi = Str::random(20);
        $token_registrasi = Str::upper(Str::random(3)."-".Str::random(3)."-".Str::random(3)."-".Str::random(5));
        DB::table('tbl_registrasi_user') -> insert([
            'kd_registrasi' => $kd_registrasi,
            'token_registrasi' => $token_registrasi,
            'full_name' => $full_name,
            'phone_number' => $phone_number,
            'email' => $email,
            'password' => $password_hash,
            'referral_code' => $referral_code,
            'status_aktivasi' => 'pending'
        ]);
        
        $dr = ['email' => $email, 'token_aktivasi' => $token_registrasi];
        $sr = ['status' => 'sukses'];
        Mail::to('alditha.forum@gmail.com') -> send(new RegistrasiMail($dr));
        return \Response::json($sr);
    }

    public function aktivasiakun($kodeaktivasi)
    {
        // $cekJumlahKode = RegistrasiUserMdl::where('token_registrasi', $kodeaktivasi) -> where('status_aktivasi', 'pending') -> count();
        // $now = now();
        // if($cekJumlahKode < 1){
        //     echo "<pre>Activation code failed</pre>";
        // }else{
        //     $dr = RegistrasiUserMdl::where('token_registrasi', $kodeaktivasi) -> first();
        //     // update status aktivasi & waktu aktivasi
        //     DB::table('tbl_registrasi_user') -> where('token_registrasi', $kodeaktivasi) -> update(['status_aktivasi' => 'done', 'waktu_aktivasi' => $now]);
        //     // create user 
        //     DB::table('tbl_user') -> insert([
        //         'username' => $dr -> email,
        //         'tipe' => 'buyer',
        //         'password' => $dr -> password,
        //         'active' => '1'
        //     ]);
        //     // create customer data 
        //     DB::table('tbl_customer') -> insert([
        //         'email' => $dr -> email,
        //         'full_name' => $dr -> full_name,
        //         'phone' => $dr -> phone_number,
        //         'active' => '1'
        //     ]);
        //     return view('register.aktivasi_akun');
        // }
        $css_file = 'style-about.css';
        $js_file = 'ebunga-aktivasi-akun.js';
        $dr = ['page' => 'Success activation', 'css_file' => $css_file, 'js_file' => $js_file];
        return view('register.aktivasi_akun', $dr);
    }

}
