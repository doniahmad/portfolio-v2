<?php

function send_request($target_path, $dir_path)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $tech_arr = explode(',', $_POST['tech_used']);
        $tech_used = json_encode($tech_arr);

        $data_input = [
            'nama_project' => $_POST['nama_project'],
            'desc_project' => $_POST['desc_project'],
            'tech_used' => $tech_used,
            'featured_project' => '0',
            'img_project' => '',
            'link_url' => $_POST['link_url'],
            'link_github' => $_POST['link_github'],
        ];

        if (isset($_POST['featured_project']) && $_POST['featured_project'] == '1') {
            $upload_file = curl_file_create($_FILES['img_project']['tmp_name'], $_FILES['img_project']['type'], $_FILES['img_project']['name']);
            $data_input['featured_project'] = $_POST['featured_project'];

            if ($_FILES['img_project']['size'] !== 0) {
                $data_input['img_project'] = $upload_file;
            }
        }

        curl_post($data_input, $target_path);
        header('Location:' . $dir_path . '?page=project');
    }
};

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = get_project("/project.php", $id);
    $make_arr = json_decode($data['tech_used']);
    $data['tech_used'] = implode(',', $make_arr);

    send_request('/project.php?id=' . $_GET['id'], $path);
} else {
    $data = [
        'nama_project' => '',
        'desc_project' => '',
        'link_github' => '',
        'link_url' => '',
        'tech_used' => '',
        'featured_project' => 0,
        'img_project' => ''
    ];
    send_request('/project.php', $path);
}
?>
<div id="dashboard-input">
    <h2 class="mb-3">Tambah Project</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_project" class="form-label">Nama Project</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project" value="<?= $data['nama_project'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="desc_project" class="form-label">Deskripsi Project</label>
            <textarea type="text" class="form-control" id="desc_project" name="desc_project" style="height:100px ;" required><?= $data['desc_project'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="link_github" class="form-label">Link Github</label>
            <input type="text" class="form-control" id="link_github" name="link_github" value="<?= $data['link_github'] ?>">
        </div>
        <div class="mb-3">
            <label for="link_url" class="form-label">Link Web</label>
            <input type="text" class="form-control" id="link_url" name="link_url" value="<?= $data['link_url'] ?>">
        </div>
        <div class="mb-3">
            <label for="tech_used">Alat Yang Digunakan</label>
            <div id="tech_used_help" class="form-text">Gunakan tanda ',' untuk memisahkan, jika lebih dari 1 alat.</div>
            <input type="text" class="form-control" id="tech_used" aria-describedby="tech_used_help" name="tech_used" value="<?= $data['tech_used'] ?>" required>
        </div>
        <div class="mb-3">
            <input type="checkbox" style="border-color: black;" class="form-check-input ms-2 check-input" id="featured_project" name="featured_project" value="1" onchange="featuredChecked()" <?= $data['featured_project'] == 1 ? 'checked' : '' ?>>
            <label for="featured_project" class="form-check-label">Featured Project</label>
        </div>
        <div class="mb-3" id="img_project_container" style="display: none;">
            <div class="img-profile">
                <img class="img-preview img-fluid m-3 w-25" alt="" src="<?= "/portfolio-v2/storage/" . $data['img_project'] ?>">
            </div>
            <label for="img_project" class="form-label">Foto Project</label>
            <?php if ($data['img_project'] == '') : ?>
                <input type="file" class="form-control" id="img_project" name="img_project" onchange="previewImage(this)">
            <?php else : ?>
                <input type="file" class="form-control" name="img_project" onchange="previewImage(this)">
            <?php endif; ?>
        </div>
        <div class="btn-content-dashboard">
            <button type="submit" class="btn btn-warning">Simpan</button>
        </div>
    </form>
</div>