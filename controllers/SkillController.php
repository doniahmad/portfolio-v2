<?php

require_once "../config.php";

class SkillController
{

    public function get_skills()
    {
        global $mysqli;
        $query = "SELECT * FROM skill";
        $result = $mysqli->query($query);
        $data = [];
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function insert_skill()
    {
        global $mysqli;

        if (isset($_POST['nama_skill'])) {
            $result = mysqli_query(
                $mysqli,
                "INSERT INTO skill (nama_skill) VALUES ('$_POST[nama_skill]')"
            );
            if ($result) {
                $response = array(
                    'status' => true,
                    'message' => 'Data Berhasil Ditambahkan'
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
                'message' => 'Data Tidak Lengkap'
            );
        }

        echo json_encode($response);
    }

    public function update_skill($id)
    {
        global $mysqli;

        if (isset($_POST['nama_skill'])) {
            $result = mysqli_query(
                $mysqli,
                "UPDATE skill SET nama_skill='$_POST[nama_skill]' WHERE id='$id'"
            );
            if ($result) {
                $response = array(
                    'status' => true,
                    'message' => 'Data Berhasil Diubah'
                );
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Data Gagal Diubah',
                );
            }
        } else {
            $response = array(
                'status' => false,
                'message' => 'Data Tidak Lengkap'
            );
        }

        echo json_encode($response);
    }

    public function delete_skill($id)
    {
        global $mysqli;
        $delete_query = "DELETE FROM skill WHERE id=" . $id;
        if (mysqli_query($mysqli, $delete_query)) {
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
