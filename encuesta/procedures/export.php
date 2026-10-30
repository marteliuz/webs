<?php
require("../config/config.php");


$select = "SELECT t1.fecha, t2.descripcion as cliente, t1.question1, t1.question2, t1.question3, t1.question4, t1.question5, t1.question6
            FROM dbencuesta.tbencuesta as t1, dbencuesta.tbclientes as t2 
            WHERE t1.id_cliente = t2.idtbclientes";

$export = mysql_query ( $select ) or die ( "Sql error : " . mysql_error( ) );
$fields = mysql_num_fields ( $export );

$header = "";
$data = "";

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}

while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Records Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=encuestas.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";



?>