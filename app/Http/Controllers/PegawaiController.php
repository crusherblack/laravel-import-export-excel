<?php

namespace App\Http\Controllers;

use App\Pegawai;
use File; //mmmm kita coba dulu saya lupa

//jangan lupa import dulu packagenya
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class PegawaiController extends Controller
{

    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai', compact('pegawai'));
    }

    //function untuk import saya kasih nama upload
    public function upload(Request $request){

        //validasi aja agar file yg bisa masuk itu tipe filenya excel
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file'); //ambil filenya dari yg kita kirim tadi
        $namaFile = rand().$file->getClientOriginalName(); //generate random nama jika kala kedepan kita upload file dengan nama yang sama
        $file->move('excel',$namaFile); //pindahkan file ke public directory dengan nama folder excel | kalian bisa ganti nama foldernya

        (new FastExcel)->import(public_path('excel/'.$namaFile), function ($line) { //kita modifikasi sedikit2 ya
            return Pegawai::updateOrCreate(['name' => $line['name']],  [ 
                'name' => $line['name'],
                'job' => $line['job'],
                'gender' => $line['gender']
            ]);
        }); //oke tambahkan ini ya lupa tadi

        File::delete(public_path('excel/'.$namaFile)); //untuk menghapus file jika berhasil upload biar gak menuh2in storage kita

        return redirect()->back()->with('info','berhasil import');
    }

    public function export(){
        $pegawai = Pegawai::all();
        //export ke public folder
        //return (new FastExcel($pegawai))->export('file.xlsx');

        //langsung download
        return (new FastExcel($pegawai))->download('file.xlsx');
    }

   
}
