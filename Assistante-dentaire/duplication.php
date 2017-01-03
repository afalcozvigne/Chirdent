<?


// DR ---------------------------------------------------------------

     $DBserveur='sql5';
     $DBuser='chirdenttest';
     $DBpassword='dups1502';
     $dbase='chirdenttest';
     $table_membre='membres';





echo "Transfert vers membres";


$link = mysql_connect ("$DBserveur","$DBuser","$DBpassword");
mysql_SELECT_db($dbase);



$sql = "SELECT * FROM membres,dr WHERE id_membre=id_dr";
     $result = mysql_query ($sql);
     $num =  mysql_num_rows($result);

     while ($row = mysql_fetch_array($result))
     {

$id_membre =  $row['id_membre'];
$date_creation  =  $row['date_creation'];
$dern_connexion  = ($row['dern_connexion']);

if  ($dern_connexion == "0000-00-00 00:00:00") { $date_retenue = $date_creation; }
else {$date_retenue = $dern_connexion;};
echo 'ID= '.$id_membre.' - Creation: '.$date_creation.' - Dern Connexion: '.$dern_connexion.' - Date retenue '.$date_retenue.'<br />' ;


$req="UPDATE dr SET date_reactivation ='$date_retenue' WHERE id_dr='$id_membre'";

echo "$req=\"UPDATE dr SET date_reactivation ='$date_retenue' WHERE id_dr='$id_membre'\";  ";


 $res2=mysql_query($req);



       }
       











?>