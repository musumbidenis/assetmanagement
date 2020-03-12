<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Asset Usage Report</h2>
<table>
  <thead>
    <tr>
      <th>User</th>
      <th>Asset</th>
      <th>SessionStart</th>
      <th>SessionStop</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sessions as $session)
      <tr>
        <td>{{$session->userId}}</td>
        <td>{{$session->serialNumber}}</td>
        <td>{{$session->sessionStart}}</td>
        <td>{{$session->sessionStop}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>