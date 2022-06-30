<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data_input = [
        'resume_link' => $_POST['resume_link'],
        'email' => $_POST['email'],
        'hero_desc' => $_POST['hero_desc'],
        'about_desc' => $_POST['about_desc'],
        'nama_panjang' => $_POST['nama_panjang'],
        'link_github' => $_POST['link_github'],
        'link_linkedin' => $_POST['link_linkedin'],
        'link_facebook' => $_POST['link_facebook'],
    ];

    if ($_FILES['about_img']['size'] !== 0) {
        $upload_file = curl_file_create($_FILES['about_img']['tmp_name'], $_FILES['about_img']['type'], $_FILES['about_img']['name']);
        $data_input += ['about_img' => $upload_file];
    }

    curl_post($data_input, '/setting.php');

    header('Refresh:0');
}

?>
<div id="dashboard-setting">
    <h2 class="mb-3">Setting</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <div class="img-profile">
                <img class="img-preview img-fluid m-3 w-25" alt="" src="<?= "/portfolio-v2/storage/" . $data_setting['about_img'] ?>">
            </div>
            <label for="about_img" class="form-label">Foto Profil</label>
            <input type="file" class="form-control" id="about_img" name="about_img" onchange="previewImage(this)">
        </div>
        <div class="mb-3">
            <label for="resume_link" class="form-label">Link Resume</label>
            <input type="text" class="form-control" id="resume_link" name="resume_link" value="<?= $data_setting['resume_link'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="link_github" class="form-label">Link Github</label>
            <input type="text" class="form-control" id="link_github" name="link_github" value="<?= $data_setting['link_github'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="link_linkedin" class="form-label">Link Linkedin</label>
            <input type="text" class="form-control" id="link_linkedin" name="link_linkedin" value="<?= $data_setting['link_linkedin'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="link_facebook" class="form-label">Link Facebook</label>
            <input type="text" class="form-control" id="link_facebook" name="link_facebook" value="<?= $data_setting['link_facebook'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $data_setting['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="hero_desc" class="form-label">Pengenalan Singkat</label>
            <textarea type="text" class="form-control" name="hero_desc" id="hero_desc" required><?= $data_setting['hero_desc'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="about_desc" class="form-label">Profil</label>
            <textarea type="text" class="form-control" name="about_desc" id="about_desc" required><?= $data_setting['about_desc'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="nama_panjang" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_panjang" id="nama_panjang" value="<?= $data_setting['nama_panjang'] ?>" required>
        </div>
        <div class="btn-content-dashboard">
            <button type="submit" class="btn btn-warning">Simpan</button>
        </div>
    </form>
</div>