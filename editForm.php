<?php
$title = "Edit information";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_permission.php";

if (!isset($_GET["id"])) {
    header("Location:index.php");
} else {
    $id = $_GET["id"];
    $emp = $conn->getEmployeeDetail($id);
}

// get department on form
$result = $conn->getDepartments();
?>
<h1 class="text-center"><?php echo "Edit Employee Information"; ?></h1>
<form method="POST" action="updateEmployee.php">
    <input type="hidden" name="emp_id" value="<?php echo $emp["emp_id"]?>" />
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $emp["fname"] ?>">
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $emp["lname"] ?>">
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" name="salary" class="form-control" value="<?php echo $emp["salary"] ?>">
    </div>
    <div class="form-group">
        <label for="department">Department</label>
        <select name="department_id" class="form-control">
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <option <?php if ($row["department_id"] == $emp["department_id"]) echo "selected" ?> value="<?php echo $row["department_id"] ?>"><?php echo $row["department_name"]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="text-center">
        <input type="submit" name="submit" value="Update" class="btn btn-primary my-3">
    </div>

</form>
</div>
</body>

</html>