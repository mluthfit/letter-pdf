<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;
use Illuminate\Support\Facades\Validator;

class LetterController extends Controller
{
    public function index() {
        $letters = Letter::latest()->get();
        return response()->json([
            'success' => true,
            'message' => "Data berhasil didapatkan!",
            'data' => $letters,
        ], 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'daerah_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'nama_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'jabatan_pengirim' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'alasan_izin' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $letter = Letter::create($request->all());
        if ($letter) {
            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil ditambahkan!',
                'data' => $letter,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Surat tidak berhasil ditambahkan!',
        ], 409);
    }

    public function show($id) {
        $letter = Letter::find($id);
        if ($letter) {
            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil didapatkan!',
                'data' => $letter,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Surat tidak ditemukan!'
        ], 404);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'daerah_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'nama_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'jabatan_pengirim' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'alasan_izin' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $letter = Letter::find($id);
        if ($letter) {
            $letter->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil diubah!',
                'data' => $letter,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Surat tidak berhasil diubah!',
        ], 409);
    }

    public function destroy($id) {
        $letter = Letter::find($id);

        if ($letter) {
            $letter->delete();
            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil dihapus!'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Surat tidak ditemukan!'
        ], 404);
    }
}