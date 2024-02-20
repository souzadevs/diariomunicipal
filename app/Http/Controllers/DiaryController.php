<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Diary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;
use Yajra\DataTables\DataTables;

class DiaryController extends Controller
{
    //

    public function viewStore()
    {
        return view('admin.diaries.store');
    }

    public function store(Request $request, Diary $diary = null)
    {
        
        $edition = $request->input('edition');
        $content = $request->input('content');
        $published_at = $request->input('published_at');
        // TODO embrulhar o fluxo abaixo em um service para ser criar o teste de integração

        if (!$diary) {
            $diary = new Diary();
        }

        $diary->edition = $edition;
        $diary->content = $content;
        $diary->published_at = Carbon::createFromFormat('d/m/Y', $published_at)->format('Y-m-d');
        $diary->downloads = 0;
        $diary->path_pdf = '';
        $diary->user_id = Auth::user()->id;

        if ($diary->save()) {
            return redirect()->route('management.diaries.view-list')->with([
                'diary_saved' => true
            ]);
        } else {
            return ResponseHelper::error('Falha ao salvar diário, tente novamente.');
        }

    }

    public function download(Request $request, Diary $diary)
    {
        // TODO embrulhar o fluxo abaixo em um service para ser criar o teste de integração
        // ini_set('max_execution_time', 300);

        $mPdf = new Mpdf([
            // 'setAutoBottomMargin' => 'stretch',
            'mode' => 'utf-8',
            // 'format' => 'A4'.($orientation == 'L' ? '-L' : ''),
            // 'orientation' => $orientation,
            'margin_left' => 20,
            'margin_right' => 20,
            'margin_top' => 30,
            'margin_bottom' => 4,
            'margin_header' => 10,
            // 'margin_footer' => 0,
        ]);

        $documentView = view('docs.diaries.print', [
            'content' => $diary->content
        ]);


        $mPdf->SetHTMLHeader('<img src="'.base_path().'/public/assets/images/diary_footer.png"/>', 'O');
        $mPdf->SetHTMLFooter('<img src="'.base_path().'/public/assets/images/diary_footer.png"/>');
        $mPdf->WriteHTML(trim($documentView->render()));
        
        $mPdf->Output('DiarioOficial.pdf', 'D');
    }

    public function viewList(Request $request)
    {
        return view('admin.diaries.list');
    }

    public function list(Request $request)
    {
        // TODO embrulhar o fluxo abaixo em um service para ser criar o teste de integração
        // TODO desenvolver filtros

        // $startAt = $request->input('periodo_inicial');
        // $endAt = $request->input('periodo_final');

        return DataTables::of(Diary::all())
            ->addColumn('edition', function($diary) {
                return $diary->edition;
            })
            ->addColumn('user', function($diary) {
                return $diary->user->getFullName();
            })
            ->addColumn('published_at', function($diary) {
                return Carbon::parse($diary->published_at)->format('d/m/Y');
            })
            ->addColumn('downloads', function($diary) {
                return $diary->downloads;
            })
            ->addColumn('actions', function($diary) {
                return $diary->id;
            })
            ->removeColumn('content')
            ->toJson();

    }

    public function search(Request $request)
    {
        // TODO embrulhar o fluxo abaixo em um service para ser criar o teste de integração

    }

    public function delete(Request $request, Diary $diary)
    {
        // TODO embrulhar o fluxo abaixo em um service para ser criar o teste de integração
        if ($diary->delete()) {
            return ResponseHelper::success("Diário removido com sucesso!");
        } else {
            return ResponseHelper::error("Não foi possível excluir o diário, contate o administrador do sistema.");
        }
    }
}
