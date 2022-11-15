<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country= $_GET["country"];
$city = $_GET['context'];


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$citiesStmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities Join countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<table>
  <?php if ($city!= "cities"): ?>
  <thead>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    </tr>
  </thead>
  <?php endif; ?>

  <?php if ($city == "cities"): ?>
  <thead>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
  </thead>
  <?php endif; ?>

  <tbody>
  <?php if ($city != "cities"): ?>
  <?php foreach ($results as $row): ?>
    <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['continent']; ?></td>
        <td><?= $row['independence_year']; ?></td>
        <td><?= $row['head_of_state']; ?></td>
    </tr>
<?php endforeach; ?>
<?php endif; ?>

<?php if ($city== "cities"): ?>
  <?php foreach ($citiesResults as $row): ?>
    <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['district']; ?></td>
        <td><?= $row['population']; ?></td>
    </tr>
<?php endforeach; ?>
<?php endif; ?>
  </tbody>
</table>
