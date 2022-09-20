use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extend Model {
    use HasFactory;
    protected $fillable = [
        'nome',
        'email',
        'tipo',
        'mensagem',
    ];
}