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

<h2>Assets Recorded</h2>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Serial Number</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($assets as $asset)
      <tr>
        <td>{{ $asset->assetName }}</td>
        <td>{{ $asset->serialNumber}}</td>
        <td>{{ $asset->description}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>