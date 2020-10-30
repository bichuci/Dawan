-Selection
    => SELECT * FROM nomtable
    => SELECT `column`, `column`, `column` FROM nomtable

    => SELECT * FROM nomtable WHERE `column` = `value`;
    => SELECT * FROM nomtable WHERE `column` = `value` AND `column` = `value`;
    => SELECT * FROM nomtable WHERE `column` = `value` OR `column` = `value`;

    => SELECT * FROM nomtable ORDER BY `column` ASC ;
    => SELECT * FROM nomtable ORDER BY `column` DESC ;

    => SELECT * FROM nomtable ORDER BY `column` DESC ;


    -- LES JOINTURES --
    => SELECT * FROM nomtable1 JOIN nomtable2 ON nomtable1.column = nomtable2.column;
    => SELECT * FROM nomtable1 LEFT JOIN nomtable2 ON nomtable1.column = nomtable2.column;
    => SELECT * FROM nomtable1 RIGHT JOIN nomtable2 ON nomtable1.column = nomtable2.column;

    => SELECT * FROM nomtable LIMIT start line, nombre;
    
    
-Ajout
    => INSERT INTO nomtable (`column`, `column`) VALUE ('value', 'value');
-Multiple
    => INSERT INTO nomtable (`column`, `column`) VALUES ('value1', 'value1'), ('value2', 'value2'), ("value3", "value3");


-Modification
    => UPDATE nomtable SET `column` = 'value', `column` = 'value';
-Suppression