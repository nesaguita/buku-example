<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Exports\BukuExport;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Tahun Terbit',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Buku',
            'group_by_field' => 'tahun_terbit',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);
        $buku = Buku::all();
        return view('dashboard', compact('buku', 'chart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        $data = $request->all();
        Buku::create($data);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request)
    {
        $buku  = Buku::find($request->id);
        $buku->update($request->all());
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $buku = Buku::find($request->id);
        $buku->delete();
        return redirect()->route('dashboard');
    }

    public function export()
    {
        return Excel::download(new BukuExport, 'buku.xlsx');
    }
}
