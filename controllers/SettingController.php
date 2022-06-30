<?php

require_once "../config.php";

class SettingController
{

    public function get_setting()
    {
        global $mysqli;
        $query = "SELECT * FROM setting";
        $result = $mysqli->query($query);
        $data = mysqli_fetch_object($result);

        echo json_encode($data);
    }

    public function update_setting()
    {
        global $mysqli;
        $path_storage = "../storage/";
        $type_gambar = '';
        $old_img = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT about_img FROM setting LIMIT 1"));
        $path_img = "../storage/" . $old_img["about_img"];

        if (isset($_POST["nama_panjang"], $_POST["hero_desc"], $_POST["about_desc"], $_POST["email"], $_POST["resume_link"], $_POST["link_github"], $_POST["link_linkedin"], $_POST["link_facebook"])) {

            $data_array = [
                'nama_panjang' => $_POST["nama_panjang"],
                'hero_desc' => $_POST["hero_desc"],
                'about_desc' => $_POST["about_desc"],
                'email' => $_POST["email"],
                'resume_link' => $_POST["resume_link"],
                'link_github' => $_POST["link_github"],
                'link_linkedin' => $_POST["link_linkedin"],
                'link_facebook' => $_POST["link_facebook"],
            ];

            if (isset($_FILES['about_img'])) {
                switch ($_FILES['about_img']['type']) {
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

                $data_array += ['about_img' => $unique_img_name];

                if (file_exists($path_img)) {
                    unlink($path_img);
                }
            }


            foreach (array_keys($data_array) as $key) {
                $values[] = "`$key`=" . "'" . mysqli_real_escape_string($mysqli, $data_array[$key]) . "'";
            }

            $values = implode(",", $values);

            $result = mysqli_query(
                $mysqli,
                "UPDATE setting SET $values"
            );

            if ($result) {
                if (isset($_FILES['about_img'])) {
                    move_uploaded_file($_FILES['about_img']['tmp_name'], $path_storage . $unique_img_name);
                }
                $response = array(
                    'status' => true,
                    'message' => 'Data Berhasil Diubah'
                );
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Data Gagal Diubah',
                    'error' => mysqli_error($mysqli)
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
}
