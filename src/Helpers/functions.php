<?php
/**
 * Hash da senha
 */
function hashPassword($str)
{
    return sha1(md5($str));
}


/**
 * Verifica se o usuário está logado
 */
function logged()
{
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true)
    {
        return false;
    }

    return true;
}

function redirect($vai, $prefixo = '') {
    if (!headers_sent()) {
        header("Location: ".$prefixo.$vai);
    }

    echo"<script language= 'JavaScript'>location.href='".$prefixo.$vai."'</script>";
    echo"<meta http-equiv='refresh' content='1; url=".$prefixo.$vai."'>";
    exit;
}


function getError($titulo, $mensagem)
{
    return '<div class="alert alert-danger" role="alert"><b>'.$titulo.'</b><br>'.$mensagem.'</div>';
}

function getErrors($erros)
{
    $retorno = '<div class="alert alert-danger" role="alert">';
    foreach($erros as $err)
    {

        $retorno .= '<b>'.$err['titulo'].'</b><br>'.$err['mensagem'].'<br>';
    }
    $retorno .= '</div>';

    return $retorno;
}

?>