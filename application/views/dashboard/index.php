<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title><?= $page['title'] ?></title>
</head>

<body>
    <?php $this->load->view('components/dashboard/_nav') ?>
    <?php print_r($this->session->user)?>
    <?php $this->load->view('components/_common_js') ?>
</body>

</html>