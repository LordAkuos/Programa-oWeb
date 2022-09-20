<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contato;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContatosController extends Controller
{
    public function index2(Request $request) {

        //opcao1 (get)
        // $contato = [
        //     'email'=>$request->query('emailContato'),
        //     'tipo'=>$request->query('tipoContato'),
        //     'mensagem'=>$request->query('mensagemContato')
        // ];

        // return view('site.contatos', $contato);

        //opcao2 (post)
        // $contato = [
        //     'email'=>$request->input('emailContato'),
        //     'tipo'=>$request->input('tipoContato'),
        //     'mensagem'=>$request->input('mensagemContato')
        // ];

        // return view('site.contatos', $contato);

        //opcao3 (post)
        // $contato = [
        //     'email'=>$request->input('emailContato'),
        //     'tipo'=>$request->input('tipoContato'),
        //     'mensagem'=>$request->input('mensagemContato')
        // ];

        // return view('site.contatos', $contato);

        //opcao4 (post)
        $email = $request->input('emailContato');
        $tipo = $request->input('tipoContato');
        $mensagem = $request->input('mensagemContato');

        return view('site.contatos', compact('email','tipo','mensagem'));
    }

    public function index() {
        $contato = Contato::all();

        return view('site.contatos', ['contato' => $contato]);
    }

    public function store(Request $request) {
        $contato = new Contato;

        $contato->nome = $request->nomeContato;;
        $contato->email = $request->emailContato;
        $contato->tipo = $request->tipoContato;
        $contato->mensagem = $request->mensagemContato;



        try {
            $contato->save();

            return redirect()->action([ContatosController::class, 'index'])
                                    ->with('msg','Mensagem enviada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->action([ContatosController::class, 'index'])
                                    ->with('msg','Falha no envio da mensagem!');
        }
    }
}
