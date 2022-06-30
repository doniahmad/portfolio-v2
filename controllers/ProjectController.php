<?php

require_once "../config.php";

class ProjectController
{

    public function get_projects()
    {
        global $mysqli;
        $query = "SELECT * FROM project";
        $result = mysqli_query($mysqli, $query);
        $data = array();
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        $response = $data;

        echo json_encode($response);
    }

    public function get_project($id)
    {
        global $mysqli;
        $query = "SELECT * FROM project WHERE id='$id'";
        $result = mysqli_query($mysqli, $query);

        $response = mysqli_fetch_assoc($result);

        echo json_encode($response);
    }

    public function insert_project()
    {
        global $mysqli;
        $path_storage = "../storage/";

        if ($_POST['featured_project'] == '0') {

            if (isset($_POST['nama_project'], $_POST['desc_project'], $_POST['tech_used'])) {
                $data_input = [
                    'nama_project' => $_POST['nama_project'],
                    'desc_project' => $_POST['desc_project'],
                    'tech_used' => $_POST['tech_used'],
                ];

                if (isset($_POST['link_github'])) {
                    $data_input += [
                        'link_github' => $_POST['link_github']
                    ];
                }
                if (isset($_POST['link_url'])) {
                    $data_input += [
                        'link_url' => $_POST['link_url']
                    ];
                }

                foreach (array_keys($data_input) as $key) {
                    $fields[] = "`$key`";
                    $values[] = "'" . mysqli_real_escape_string($mysqli, $data_input[$key]) . "'";
                }

                $fields = implode(",", $fields);
                $values = implode(",", $values);

                $query = "INSERT INTO project ($fields) VALUES ($values)";

                $result = mysqli_query($mysqli, $query);

                if ($result) {
                    $response = array(
                        'status' => true,
                        'message' => 'Data Berhasil Disimpan'
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'message' => mysqli_error($mysqli),
                    );
                }
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Data Tidak Lengkap',
                );
            }
        } else {

            if (isset($_FILES['img_project'], $_POST['nama_project'], $_POST['desc_project'], $_POST['tech_used'])) {
                switch ($_FILES['img_project']['type']) {
                    case 'image/jpeg':
                        $type_gambar = ".jpg";
                        break;
                    case 'image/png':
                        $type_gambar = ".png";
                        break;
                    case 'image/svg':
                        $type_gambar = ".svg";
                        break;
                    default:
                        header("Image error!");
                        break;
                }

                $rand_number = rand(100, 100000) . "" . time();
                $unique_img_name = $rand_number . '' . $type_gambar;

                $data_input = [
                    'nama_project' => $_POST['nama_project'],
                    'desc_project' => $_POST['desc_project'],
                    'tech_used' => $_POST['tech_used'],
                    'featured_project' => 1,
                    'img_project' => $unique_img_name
                ];

                if (isset($_POST['link_github'])) {
                    $data_input += [
                        'link_github' => $_POST['link_github']
                    ];
                }
                if (isset($_POST['link_url'])) {
                    $data_input += [
                        'link_url' => $_POST['link_url']
                    ];
                }

                foreach (array_keys($data_input) as $key) {
                    $fields[] = "`$key`";
                    $values[] = "'" . mysqli_real_escape_string($mysqli, $data_input[$key]) . "'";
                }

                $fields = implode(",", $fields);
                $values = implode(",", $values);

                $query = "INSERT INTO project ($fields) VALUES ($values)";

                $result = mysqli_query($mysqli, $query);

                if ($result) {
                    move_uploaded_file($_FILES['img_project']['tmp_name'], $path_storage . $unique_img_name);
                    $response = array(
                        'status' => true,
                        'message' => 'Data Berhasil Disimpan'
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'message' => mysqli_error($mysqli),
                    );
                }
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Data Tidak Lengkap',
                );
            }
        }

        echo json_encode($response);
    }

    public function update_project($id)
    {
        global $mysqli;
        $path_storage = "../storage/";
        $old_img = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT img_project FROM project WHERE id=$id"));

        if ($_POST['featured_project'] == '0') {

            if (isset($_POST['nama_project'], $_POST['desc_project'], $_POST['tech_used'])) {
                $data_input = [
                    'nama_project' => $_POST['nama_project'],
                    'desc_project' => $_POST['desc_project'],
                    'tech_used' => $_POST['tech_used'],
                    'featured_project' => 0,
                ];

                if (isset($_POST['link_github'])) {
                    $data_input += [
                        'link_github' => $_POST['link_github']
                    ];
                }
                if (isset($_POST['link_url'])) {
                    $data_input += [
                        'link_url' => $_POST['link_url']
                    ];
                }

                foreach (array_keys($data_input) as $key) {
                    $values[] = "`$key`=" . "'" . mysqli_real_escape_string($mysqli, $data_input[$key]) . "'";
                }

                $values = implode(",", $values);

                $query = "UPDATE project SET $values where id='$id'";

                $result = mysqli_query($mysqli, $query);

                if ($result) {
                    if (file_exists($path_storage . $old_img['img_project'])) {
                        unlink($path_storage . $old_img['img_project']);
                    }
                    $response = array(
                        'status' => true,
                        'message' => 'Data Berhasil Disimpan'
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'message' => mysqli_error($mysqli),
                    );
                }
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Data Tidak Lengkap',
                );
            }
        } else {

            if (isset($_POST['nama_project'], $_POST['desc_project'], $_POST['tech_used'])) {

                $data_input = [
                    'nama_project' => $_POST['nama_project'],
                    'desc_project' => $_POST['desc_project'],
                    'tech_used' => $_POST['tech_used'],
                    'featured_project' => 1
                ];

                if (isset($_FILES['img_project'])) {
                    switch ($_FILES['img_project']['type']) {
                        case 'image/jpeg':
                            $type_gambar = ".jpg";
                            break;
                        case 'image/png':
                            $type_gambar = ".png";
                            break;
                        case 'image/svg':
                            $type_gambar = ".svg";
                            break;
                        default:
                            header("Image error!");
                            break;
                    }

                    $rand_number = rand(100, 100000) . "" . time();
                    $unique_img_name = $rand_number . '' . $type_gambar;
                    $data_input += [
                        'img_project' => $unique_img_name
                    ];
                }

                if (isset($_POST['link_github'])) {
                    $data_input += [
                        'link_github' => $_POST['link_github']
                    ];
                }
                if (isset($_POST['link_url'])) {
                    $data_input += [
                        'link_url' => $_POST['link_url']
                    ];
                }

                foreach (array_keys($data_input) as $key) {
                    $values[] = "`$key`=" . "'" . mysqli_real_escape_string($mysqli, $data_input[$key]) . "'";
                }

                $values = implode(",", $values);

                $query = "UPDATE project SET $values WHERE id='$id'";

                $result = mysqli_query($mysqli, $query);

                if ($result) {
                    if (isset($_FILES['img_project'])) {
                        if (file_exists($path_storage . $old_img['img_project'])) {
                            unlink($path_storage . $old_img['img_project']);
                        }
                        move_uploaded_file($_FILES['img_project']['tmp_name'], $path_storage . $unique_img_name);
                    }
                    $response = array(
                        'status' => true,
                        'message' => 'Data Berhasil Disimpan'
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'message' => mysqli_error($mysqli),
                    );
                }
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Data Tidak Lengkap',
                );
            }
        }

        echo json_encode($response);
    }

    function delete_project($id)
    {
        global $mysqli;
        $path_storage = "../storage/";
        $delete_query = "DELETE FROM project WHERE id=" . $id;
        $old_img = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT img_project FROM project WHERE id=$id"));
        if (mysqli_query($mysqli, $delete_query)) {
            if (file_exists($path_storage . $old_img['img_project'])) {
                unlink($path_storage . $old_img['img_project']);
            }
            $response = array(
                'status' => true,
                'message' => 'Data Berhasil Dihapus'
            );
        } else {
            $response = array(
                'status' => true,
                'message' => 'Data Gagal Dihapus'
            );
        }
        echo json_encode($response);
    }
}
