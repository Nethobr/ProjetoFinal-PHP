<?php
function valida_msg ($msg)
{
    switch ($msg)
    {
        //padrões
        case 'idinvalido': $reutn = "<h3>ID inválido!</h3>"; break;
        case 'embranco': $reutn = "<h3>Campo em branco!</h3>"; break;

        //cadastro filme
        case 'cadembranco': $reutn = "<h3>Formulário de cadastro em branco!</h3>"; break;
        case 'cadastrado': $reutn = "<h3>Cadastrado com sucesso!</h3>"; break;
        case 'errocadastro': $reutn = "<h3>Erro ao cadastrar!</h3>"; break;

        //deletar filme
        case 'foidebase': $reutn = "<h3>Filme deletado com sucesso!</h3>"; break;
        case 'errodeletar': $reutn = "<h3>Erro ao deletar!</h3>"; break;

        //editar filme
        case 'editadobro': $reutn = "<h3>Filme editado com sucesso!</h3>"; break;
        case 'deuruimman': $reutn = "<h3>Erro ao editar!</h3>"; break;

        default:
            $reutn = '';
    }

    return $reutn;
}
?>