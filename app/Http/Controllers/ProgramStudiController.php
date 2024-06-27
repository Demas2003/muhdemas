<?php

namespace App\Http\Controllers;
//import Model "Post

use App\Models\Fakultas;
use App\Models\Post;
use App\Models\Program_studi;
use Illuminate\Http\RedirectResponse;
//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
   public function index(): View
   {
       //get posts
       $posts = Program_studi::with('fakultas')->latest()->paginate(5);

       //render view with posts
       return view('posts.index', compact('posts'));
   }
   
   public function create(): View
   {
    $fak = Fakultas::all();
       return view('posts.create',compact('fak'));
   }
    
   public function store(Request $request): RedirectResponse 
   {
    $this->validate($request,[
        'kode_prodi'     => 'required|min:5',
        'nama_prodi'     => 'required',
        'fakultas_id'  => 'required'
    ]);
    Program_studi::create([
        'kode_prodi'      => $request->kode_prodi,
        'nama_prodi'      => $request->nama_prodi,
        'fakultas_id'   => $request->fakultas_id
    ]);

    return redirect()->route('posts.index')->with(['succes' => 'Data Berhasil Disimpan! horee!']);
   }

   public function edit($id): View
   {
       $post = Program_studi::findOrFail($id);
       return view('posts.edit', compact('post'));
   }

   public function update(Request $request, $id): RedirectResponse
   {
       $this->validate($request, [
           'kode_prodi'    => 'required|min:5',
           'nama_prodi'    => 'required',
           'kode_fakultas' => 'required'
       ]);

       $post = Program_studi::findOrFail($id);
       $post->update([
           'kode_prodi'    => $request->kode_prodi,
           'nama_prodi'    => $request->nama_prodi,
           'kode_fakultas' => $request->kode_fakultas
       ]);

       return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diupdate!']);
   }

   public function destroy($id): RedirectResponse
   {
       $post = Program_studi::findOrFail($id);
       $post->delete();

       return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
   }
}
