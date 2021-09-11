<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopingList;
use App\Models\Post;
use App\Http\Requests\UpadateUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PorudzbineController extends Controller
{
    public function viewPorudzbine()
    {
        return view('porudzbine');
    }
    public function getPorudzbine()
    {
        return ShopingList::all();
    }
    public function prikaziPorudzbinu($id)
    {
        $porudzbina=ShopingList::findOrFail($id);
        return view('porudzbina',compact('porudzbina'));
    }

    public function deletePorudzbine($id)
    {
        $porudzbina = ShopingList::findOrFail($id);

        $porudzbina->delete();
        return 'ok';
    }

    public function dodajPorudzbinu()
    {
        return view('dodajPorudzbinu');
    }

    public function createPorudzbine(Request $request)
    {
        $data = $request->validate([
            'ime'=>'required',
            'cena'=>'required',
        ]);

        $proizvod = new ShopingList;
        $proizvod->ime = $data['ime'];
        $proizvod->cena = $data['cena'];
        $proizvod->user_id = 1;

        $proizvod->save();
        return $proizvod;
    }

    public function promeniPorudzbinu($id)
    {
        $porudzbina=ShopingList::findOrFail($id);
        return view('promeniPoruzbinu',compact('porudzbina'));
    }

    public function updatePorudzbine($id, Request $request)
    {
        $porudzbina = ShopingList::findOrFail($id);

        $data = $request->validate([
            'ime'=>'required',
            'cena'=>'required',
        ]);

        $porudzbina->ime = $data['ime'];
        $porudzbina->cena = $data['cena'];
        $porudzbina->save();
        return $porudzbina;
    }
    
}
