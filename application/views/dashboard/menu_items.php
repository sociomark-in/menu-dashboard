<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title><?= $page['title'] ?></title>
</head>

<body>
    <?php $this->load->view('components/dashboard/_nav') ?>
    <main>
        <section class="py-4">
            <div class="container">
                <?php $this->load->view('components/dashboard/_page_title', $data = ["breadcrumb" => ['Home' => base_url('trl-admin'), 'Menus' => 'current']]) ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="accordion mb-3" id="accordionExample">
                            <?php for ($i = 0; $i < count($items); $i++) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="false" aria-controls="collapse<?= $i ?>">
                                            <?= $items[$i]->item_title ?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $i ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php
                                            echo "<pre>";
                                            print_r((array)$items[$i]);
                                            echo "</pre>";
                                            ?>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $items[$i]->menu_id ?>">
                                                Edit item Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Add New Item</h2>
                        <?= form_open(base_url('api-auth-login')) ?>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Item Title</label>
                            <input type="text" class="form-control" name="item[title]" placeholder="" id="inputUsername">
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Item Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" name="item[price]" placeholder="" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Item Description</label>
                            <textarea class="form-control" name="item[description]" id="" cols="30" rows="3" placeholder=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php for ($i = 0; $i < count($items); $i++) : ?>
            <div class="modal modal-lg fade" id="exampleModal<?= $items[$i]->menu_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?= form_open(base_url('')) ?>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editing <?= $items[$i]->item_title ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Title</label>
                                <input type="text" class="form-control" name="item[title]" value="<?= $items[$i]->item_title ?>" placeholder="<?= $items[$i]->item_title ?>" id="inputUsername">
                            </div>
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="item[price]" value="<?= $items[$i]->item_price ?>" placeholder="<?= $items[$i]->item_price ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Item Description</label>
                                <textarea class="form-control" name="item[description]" id="" cols="30" rows="3" value="<?= $items[$i]->item_description ?>" placeholder="<?= $items[$i]->item_description ?>"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endfor ?>
    </main>
    <?php $this->load->view('components/_common_js') ?>
</body>

</html>