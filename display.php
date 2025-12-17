<?php include 'config.php';
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$data = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php 
        $sn =0;
          foreach($data as $row):
              $sn++;

        ?>
        <tr>
          <td><?php echo $sn;?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['email'];?></td>
          <td>
            <a href="delete.php?id=<?php echo $row['id']; ?>" style='text-decoration:none;'><button style='background:red; color:white;'>del</button>
           <a href="update.php?id=<?php echo $row['id']; ?>" style='text-decoration:none;'> <button>edit</button></a>
          </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>