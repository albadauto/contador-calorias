<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlmocoRequest;
use App\Http\Requests\CcafeRequest;
use App\Http\Requests\CcafetardeRequest;
use App\Http\Requests\CjantarRequest;
use App\Models\Calmoco;
use App\Models\Ccafe;
use App\Models\Ccafetarde;
use App\Models\Cjantar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::today('America/Sao_Paulo')->format('Y-m-d');
        $final = [
            'almoco' => Calmoco::whereDate('created_at', $today)->get(),
            'cafe' => Ccafe::whereDate('created_at', $today)->get(),
            'cafetarde' => Ccafetarde::whereDate('created_at', $today)->get(),
            'jantar' => Cjantar::whereDate('created_at', $today)->get()
        ];
        return view('home.index', ['result' => $final, 'kcalTotal' => $this->calcularKcal($final)]);
    }

    private function calcularKcal($arr): int
    {
        $totalKcal = 0;

        if ($arr) {
            if (count($arr['almoco']) > 0) {
                foreach ($arr['almoco'] as $item) {
                    $totalKcal += $item->alkcal;
                }
            }

            if (count($arr['jantar']) > 0) {
                foreach ($arr['jantar'] as $item) {
                    $totalKcal += $item->jantkcal;
                }
            }

            if (count($arr['cafetarde']) > 0) {
                foreach ($arr['cafetarde'] as $item) {
                    $totalKcal += $item->caftkcal;
                }
            }

            if (count($arr['cafe']) > 0) {
                foreach ($arr['cafe'] as $item) {
                    $totalKcal += $item->cafkcal;
                }
            }
        }

        return $totalKcal;
    }

    public function InserirCafe(CcafeRequest $request)
    {
        $data = ['cafkcal' => $request->kcal, 'cafalimento' => $request->alimento, 'cafqtd' => $request->gramas];
        Ccafe::create($data);
        return redirect()->back()->with('success', 'Inserido café com sucesso!');
    }

    public function InserirAlmoco(AlmocoRequest $request)
    {
        $dataToInsert = ['alalimento' => $request->alimento, 'alkcal' => $request->kcal, 'alqtd' => $request->gramas];
        Calmoco::create($dataToInsert);
        return redirect()->back()->with('success', 'Inserido almoço com sucesso');
    }

    public function InserirCafeTarde(CcafetardeRequest $request)
    {
        $dataToInsert = ['caftalimento' => $request->alimento, 'caftkcal' => $request->kcal, 'caftqtd' => $request->gramas];
        Ccafetarde::create($dataToInsert);
        return redirect()->back()->with('success', 'Inserido café da tarde com sucesso');
    }

    public function InserirJanta(CjantarRequest $request)
    {
        $dataToInsert = ['jantalimento' => $request->alimento, 'jantkcal' => $request->kcal, 'jantqtd' => $request->gramas];
        Cjantar::create($dataToInsert);
        return redirect()->back()->with('success', 'Inserido jantar com sucesso');
    }

    public function DeletarKcal($tabela, $id){
        if($tabela == 'almoco')
            Calmoco::where('id', $id)->delete();
        if($tabela == 'jantar')
            Cjantar::where('id', $id)->delete();
        if($tabela == 'cafetarde')
            Ccafetarde::where('id', $id)->delete();
        if($tabela == 'cafe')
            Ccafe::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Deletado com sucesso');
    }

}
