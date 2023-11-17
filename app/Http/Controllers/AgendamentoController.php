<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgendamentoResource;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AgendamentoResource::collection(Agendamento::all());
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('agendamento.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* ADICIONAR MENSAGENS PERSONALIZADAS */
        $request->validate([
            'titulo' => 'required|string',
            'tipo_evento' => [
                'required',
                Rule::in(['agendamento', 'feriado', 'outro']),
            ],
            'allDay' => 'nullable|string',
            'data' => 'required|date',
            'horario' => 'required',
            'description' => 'nullable|string',
        ]);

        /* CRIANDO AS DATAS */
        date_default_timezone_set('America/Sao_Paulo');
        $data = new \DateTime("$request->data $request->horario");
        $now = new \DateTime();

        if ($data < $now) {
            return back()->withErrors(['error' => 'Você selecionou uma data que já passou!']);
        }

        /* CONTINUA CRIANDO AS DATAS */
        $start = $data->format('Y-m-d H:i');
        $data = new \DateTime("$start");
        $data_nova = $data->add(new \DateInterval('PT15M'));
        $end = $data_nova->format('Y-m-d H:i');

        /* SALVA NO BANCO DE DADOS */
        $agendamento = new Agendamento();
        $agendamento->title = $request->titulo;
        $agendamento->start = $start;
        $agendamento->end = $end;
        $agendamento->allDay = $request->allDay ?? false;
        $agendamento->extendedProps = json_encode(['type' => $request->tipo_evento]);
        $agendamento->description = $request->description ?? null;

        $agendamento->save();

        return redirect()->route('agendamento.home')->with('success', 'Criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agendamento = Agendamento::where('id', $id)->first();

        /* CASO O EVENTO NÃO EXISTA */
        if (!$agendamento instanceof Agendamento) {
            return redirect()->route('agendamento.home')->withErrors(['error' => 'Evento não encontrado!']);
        }

        /* PERCORRENDO OS TIPOS DE EVENTOS */
        $modulesEventType = ['feriado', 'agendamento', 'outro'];
        $extendedProps = json_decode($agendamento->extendedProps);
        $viewOption = '';
        foreach ($modulesEventType as $hash => $value) {
            $viewOption .= view('agendamento.option', [
                'label' => ucfirst($value),
                'value' => $value,
                'check' => $value == $extendedProps->type ? 'selected' : '',
            ]);
        }

        /* RETORNO DA VIEW */
        return view('agendamento.edit', [
            'id' => $agendamento->id,
            'title' => $agendamento->title,
            'data' => date('Y-m-d', strtotime($agendamento->start)),
            'horario' => date('H:i', strtotime($agendamento->start)),
            'isAllDay' => $agendamento->allDay ? 'checked' : '',
            'description' => $agendamento->description,
            'options' => $viewOption,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        $request->validate([
            'titulo' => 'required|string',
            'tipo_evento' => [
                'required',
                Rule::in(['agendamento', 'feriado', 'outro']),
            ],
            'allDay' => 'nullable|string',
            'data' => 'required|date',
            'horario' => 'required',
            'description' => 'nullable|string',
        ]);

        /* CRIANDO AS DATAS */
        date_default_timezone_set('America/Sao_Paulo');
        $data = new \DateTime("$request->data $request->horario");
        $now = new \DateTime();

        if ($data < $now) {
            return back()->withErrors(['error' => 'Você selecionou uma data que já passou!']);
        }

        /* CONTINUA CRIANDO AS DATAS */
        $start = $data->format('Y-m-d H:i');
        $data = new \DateTime("$start");
        $data_nova = $data->add(new \DateInterval('PT15M'));
        $end = $data_nova->format('Y-m-d H:i');

        $updated = $agendamento->update([
            'title' => $request->titulo,
            'start' => $start,
            'end' => $end,
            'allDay' => $request->allDay ?? false,
            'extendedProps' => json_encode(['type' => $request->tipo_evento]),
            'description' => $request->description ?? null,
        ]);

        if ($updated) {
            return redirect()->route('agendamento.edit', $agendamento)->with('success', 'Alterado com sucesso!');
        }

        return back()->withErrors(['error' => 'Erro ao alterar agendamento!']);
    }

    public function delete(string $id)
    {
        return view('agendamento.delete', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamento $agendamento)
    {
        $deleted = $agendamento->delete();

        if ($deleted) {
            return redirect()->route('agendamento.home', $agendamento)->with('success', 'Deletado com sucesso!');
        }

        return back()->withErrors(['error' => 'Erro ao deletar agendamento!']);
    }
}
