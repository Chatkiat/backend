<?php 

    require_once "db.php";
    require_once "util.php";

    $db = new Database();
    $util = new Util();

    if (isset($_POST['add'])) {
        $fname = $util->testInput($_POST['fname']);
        $lname = $util->testInput($_POST['lname']);
        $email = $util->testInput($_POST['email']);
        $phone = $util->testInput($_POST['phone']);

        if ($db->insert($fname, $lname, $email, $phone)) {
            echo $util->showMessage("success", "User inserted successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    if (isset($_GET['read'])) {
        $users = $db->read();
        $output = '';
        if ($users) { 
            foreach($users as $row) {
                $output .= '<tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['first_name'] . '</td>
                            <td>' . $row['last_name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['phone'] . '</td>
                            <td>
                                <a href="#" id="'. $row['id'] .'" class="btn btn-success btn-sm rounded-pull py-0 editlink" data-bs-toggle="modal" data-bs-target="#editUserModal"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" id="'. $row['id'] .'" class="btn btn-danger btn-sm rounded-pull py-0 deletelink"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                </tr>';
            }
            echo $output;
        } else {
            echo '<tr>
                <td colspan="6">No users found in the Database</td>
            </tr>';
        }
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['id'];
        $user = $db->readOne($id);
        echo json_encode($user);
    }

    if (isset($_POST['update'])) {
        $id = $util->testInput($_POST['id']);
        $fname = $util->testInput($_POST['fname']);
        $lname = $util->testInput($_POST['lname']);
        $email = $util->testInput($_POST['email']);
        $phone = $util->testInput($_POST['phone']);

        if ($db->update($id, $fname, $lname, $email, $phone)) {
            echo $util->showMessage("success", "User updated successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['id'];
        if ($db->delete($id)) {
            echo $util->showMessage("info", "User deleted successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    //camera

    if (isset($_POST['add_camera'])) {
        $statuscm = $util->testInput($_POST['status_cm']);
        $locationcm = $util->testInput($_POST['location_cm']);

        if ($db->insert_camera($statuscm, $locationcm)) {
            echo $util->showMessage("success", "Camera inserted successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    if (isset($_GET['read_camera'])) {
        $tbcamera = $db->read_camera();
        $output = '';
        if ($tbcamera) { 
            foreach($tbcamera as $row) {
                $output .= '<tr>
                            <td>' . $row['id_camera'] . '</td>
                            <td>' . $row['status_cm'] . '</td>
<td>' . $row['location_cm'] . '</td>
<td>' . $row['post_date'] . '</td>

<td>
    <a href="#" id="'. $row['id_camera'] .'" class="btn btn-success btn-sm rounded-pull py-0 editlink"
        data-bs-toggle="modal" data-bs-target="#editCameraModal"><i class="fa-regular fa-floppy-disk"></i></a>
    <a href="#" id="'. $row['id_camera'] .'" class="btn btn-danger btn-sm rounded-pull py-0 deletelink"><i
            class="fa-solid fa-trash-can"></i></a>
</td>
</tr>';
}
echo $output;
} else {
echo '<tr>
    <td colspan="6">No camera found in the Database</td>
</tr>';
}
}

if (isset($_GET['edit_camera'])) {
$id = $_GET['id'];
$camera = $db->readOne_camera($id);
echo json_encode($camera);
}

if (isset($_POST['update_camera'])) {
$id = $util->testInput($_POST['id']);
$status_cm = $util->testInput($_POST['status_cm']);
$location_cm = $util->testInput($_POST['location_cm']);

if ($db->update_camera($id, $status_cm, $location_cm)) {
echo $util->showMessage("success", "User updated successfully!");
} else {
echo $util->showMessage("danger", "Something went wrong!");
}
}

if (isset($_GET['delete_camera'])) {
$id = $_GET['id'];
if ($db->delete_camera($id)) {
echo $util->showMessage("info", "User deleted successfully!");
} else {
echo $util->showMessage("danger", "Something went wrong!");
}
}

?>