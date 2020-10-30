<?php
/**
 * FONCTION DELETE
 *
 * @param $table nom de la table
 * @param null $where chaine de caractère avec les conditions
 * @return string renvoie un string
 */
function delete($table, $where=null)
{
    $sql ="DELETE FROM".$table;

    if(where != null)
    {
        $sql .= " WHERE ".$where;
    }
    return $sql;
}


/**
 * FUNCTION DELETE EN MIEUX AVEC LE SPRINTF()
 *
 */
function _delete($table, $where = null, array $value=[]){
    $sql = "delete from `".$table."`";

    if($where != null)
    {
        /* sprintf() est une fonction qui retourne une chaîne formaté */
        $sql .= sprintf(" where".$where, ...$value);
    }
    return $sql;
}
?>


