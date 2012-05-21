<?php
include('adodb5/adodb.inc.php');
 

$db = ADONewConnection('ado_access'); 
$access = realpath('./access/duodaa1.mdb'); 
$myDSN = 'PROVIDER=Microsoft.Jet.OLEDB.4.0;'.'DATA SOURCE='. $access . ';'."Jet OLEDB:Database Password=123456;"; 

$db->Connect($myDSN); 
$recordSet = $db->Execute('select * from users'); 
print '记录条数:';
print $recordSet->RecordCount();
print '<br />';
if (!$recordSet) 
print $db->ErrorMsg(); 
else 
while (!$recordSet->EOF) { 
print $recordSet->fields[1].' '.$recordSet->fields[2].'<BR>'; 
$recordSet->MoveNext(); 
} 
