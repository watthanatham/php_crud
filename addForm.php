<?php

$title = "AddFormpage";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_permission.php";

// get department on form
$result = $conn->getDepartments();

// submit button
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $salary = $_POST["salary"];
    $department_id = $_POST["department_id"];

    $status = $conn->insertEmployee($fname, $lname, $salary, $department_id);
    if ($status) {
        $message = "Success";
        require_once "layout/success_message.php";
    } else {
        $message = "Error";
        require_once "layout/error_message.php";
    }
}

?>
<h1 class="text-center"><?php echo "Add Employee Information"; ?></h1>
<form method="POST" action="addForm.php">
    <div class="form-group mb-3">
        <div class="text-center">
            <label style="display:block;" for="fname" class="mb-3">First Name</label>
            <input style="width: auto; display:inline" type="text" name="fname" class="form-control">
        </div>
    </div>
    <div class="form-group mb-3">
        <div class="text-center">
            <label style="display:block;" for="lname" class="mb-3">Last Name</label>
            <input style="width: auto; display:inline" type="text" name="lname" class="form-control">
        </div>
    </div>
    <div class="form-group mb-3">
        <div class="text-center">
            <label style="display:block;" for="salary" class="mb-3">Salary</label>
            <input style="width: auto; display:inline" type="text" name="salary" class="form-control">
        </div>

    </div>
    <div class="form-group mb-3">
        <div class="text-center">
            <label for="department" class="mb-3" style="display:block;">Department</label>
            <select style="width: auto; display:inline" name="department_id" class="form-control">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row["department_id"] ?>"><?php echo $row["department_name"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="text-center">
        <input type="submit" name="submit" value="Save" class="btn btn-primary my-3">
    </div>

</form>
</div>
</body>

</html>