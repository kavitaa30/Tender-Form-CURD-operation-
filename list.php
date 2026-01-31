<?php
include "config/db.php";

// Fetch all tenders ordered by latest first
$result = mysqli_query($conn, "SELECT * FROM tenders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tender List</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #333;
            color: #fff;
        }
        a {
            text-decoration: none;
            padding: 5px 8px;
            color: white;
            border-radius: 4px;
        }
        .edit { background: blue; }
        .delete { background: red; }
        .add {
            display: inline-block;
            margin: 15px;
            padding: 8px 12px;
            background: green;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<a href="tender_form.php" class="add">+ Add New Tender</a>

<table>
    <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Full Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Address</th>
        <th>State</th>
        <th>Goods Type</th>
        <th>Action</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['type'] ?></td>
                <td><?= $row['fullName'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['state'] ?></td>
                <td><?= $row['goodsType'] ?></td>
                <td>
                    <a href="tender_form.php?id=<?= $row['id'] ?>" class="edit">Update</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="9">No records found</td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
