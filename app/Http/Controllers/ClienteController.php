<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('buscar');

        $clientes = Cliente::when($busqueda, function ($query, $busqueda) {
            return $query->where('nombre', 'like', "%$busqueda%")
                         ->orWhere('apellido', 'like', "%$busqueda%")
                         ->orWhere('cedula', 'like', "%$busqueda%");
        })->orderBy('nombre')->paginate(10)->withQueryString();

        return view('clientes.index', compact('clientes', 'busqueda'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:20|unique:clientes,cedula',
            'telefono' => 'required|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente registrado correctamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:20|unique:clientes,cedula,' . $cliente->id,
            'telefono' => 'required|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado.');
    }

    public function exportarExcel()
    {
        $clientes = Cliente::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Cédula');
        $sheet->setCellValue('D1', 'Teléfono');
        $sheet->setCellValue('E1', 'Dirección');
        $sheet->setCellValue('F1', 'Email');

        $fila = 2;
        foreach ($clientes as $cliente) {
            $sheet->setCellValue("A{$fila}", $cliente->nombre);
            $sheet->setCellValue("B{$fila}", $cliente->apellido);
            $sheet->setCellValue("C{$fila}", $cliente->cedula);
            $sheet->setCellValue("D{$fila}", $cliente->telefono);
            $sheet->setCellValue("E{$fila}", $cliente->direccion ?? 'No especificado');
            $sheet->setCellValue("F{$fila}", $cliente->email ?? 'No especificado');
            $fila++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'clientes.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function buscar(Request $request)
    {
        $term = $request->input('term');

        $clientes = Cliente::where('nombre', 'LIKE', "%{$term}%")
            ->orWhere('apellido', 'LIKE', "%{$term}%")
            ->get();

        $results = $clientes->map(function ($cliente) {
            return [
                'id' => $cliente->id,
                'text' => $cliente->nombre . ' ' . $cliente->apellido,
            ];
        });

        return response()->json($results);
    }
}
