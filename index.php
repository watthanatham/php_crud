<?php

$title = "Homepage";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_permission.php";
$result = $conn->getEmployees();
?>

<h1 class="text-center"><?php echo "Employeee information"; ?></h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Salary</th>
            <th scope="col">Department</th>
            <th scope="col">Activity</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td scope="row"><?php echo $row["fname"]; ?></td>
                <td><?php echo $row["lname"]; ?></td>
                <td><?php echo number_format($row["salary"]); ?></td>
                <td><?php echo $row["department_name"]; ?></td>
                <td>
                    <a href="editForm.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Do you want delete employee information ?')" href="delete.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</body>

</html>