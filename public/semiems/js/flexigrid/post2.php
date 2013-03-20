
<?php
// Connect to MySQL database
include '../../php/connectDB.php';
$linkk=get_db_conn();

$page = 1; // The current page
$sortname = 'id'; // Sort column
$sortorder = 'asc'; // Sort order
$qtype = ''; // Search column
$query = ''; // Search string
// Get posted data
if (isset($_POST['page'])) {
        $page = mysql_real_escape_string($_POST['page']);
}
if (isset($_POST['sortname'])) {
        $sortname = mysql_real_escape_string($_POST['sortname']);
}
if (isset($_POST['sortorder'])) {
        $sortorder = mysql_real_escape_string($_POST['sortorder']);
}
if (isset($_POST['qtype'])) {
        $qtype = mysql_real_escape_string($_POST['qtype']);
}
if (isset($_POST['query'])) {
        $query = mysql_real_escape_string($_POST['query']);
}
if (isset($_POST['rp'])) {
        $rp = mysql_real_escape_string($_POST['rp']);
}
if (!$page) $page = 1;
if (!$rp) $rp = 10;
// Setup sort and search SQL using posted data
$sortSql = "order by $sortname $sortorder";
$searchSql = ($qtype != '' && $query != '') ? "where $qtype like '%".$query."%'" : '';
// Get total count of records
$sql = "select count(*) from json $searchSql";
$result = mysql_query($sql,$linkk);
$row = mysql_fetch_array($result);
$total = $row[0];
// Setup paging SQL
$pageStart = ($page-1)*$rp;
$limitSql = "limit $pageStart, $rp";
// Return JSON data

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();
$sql = "SELECT id,json,date FROM json $searchSql $sortSql $limitSql";
$results = mysql_query($sql,$linkk);
while ($row = mysql_fetch_assoc($results)) {
$jsond=json_decode($row['json'],true);
$data['rows'][] = array(
'id' => $row['id'],
'cell' => array(        $row['id'], 
			$jsond[data][name], 
			$jsond[data][width]."x".$jsond[data][height]."x".$jsond[data][prof],
			$jsond[data][doors],
			$jsond[data][nmods], 
			$row['date']
                )
                );
}
echo json_encode($data);
?>
